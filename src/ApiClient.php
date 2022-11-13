<?php

namespace Nicekiwi\Census;

use Exception;
use Illuminate\Support\Facades\Http;
use Nicekiwi\Census\Enums\Format;
use Nicekiwi\Census\Enums\Platform;
use Nicekiwi\Census\Exceptions\CollectionEmptyException;
use Nicekiwi\Census\Exceptions\CollectionNotFoundException;
use Nicekiwi\Census\Exceptions\ServiceIdRequiredException;

class ApiClient
{
    protected string $baseUrl;
    protected string $version = 'v2';
    protected string $collectionSuffix = '_list';
    protected Format $format = Format::JSON;

    /**
     * @param Platform $platform
     * @param Format $format
     * @throws ServiceIdRequiredException
     */
    public function __construct(Platform $platform, Format $format = Format::JSON)
    {
        $serviceId = config('census.service_id');

        if (!$serviceId) {
            throw new ServiceIdRequiredException();
        }

        $this->format = $format;

        $this->baseUrl = sprintf(
            'https://%s/s:%s/get/%s:%s',
            config('census.api_endpoint'),
            $serviceId,
            $platform->value,
            $this->version
        );
    }

    /**
     * @throws Exception
     */
    public function request(string $collection, array $params, bool $validate = true)
    {
        $url = $this->baseUrl . '/' . $collection . $this->collectionSuffix;

        if (array_key_exists('format', $params) && $this->format->value !== $params['format']) {
            $this->format = Format::from($params['format']);
        }

        if (!array_key_exists('format', $params)) {
            $params['format'] = $this->format->value;
        }

        $response = Http::get($url, $params);

        if ($this->format === Format::JSON) {
            return $this->validateJsonResponse($response->json() ?? [], $validate ? $collection : null);
        }

        return $this->validateXmlResponse($response->body(), $validate ? $collection : null);
    }

    /**
     * @throws Exception
     */
    private function validateJsonResponse(array $json, string|null $collection): mixed
    {
        if (empty($json)) {
            throw new Exception('Response is empty');
        }

        if ($collection) {
            if (!array_key_exists($collection . $this->collectionSuffix, $json)) {
                throw new CollectionNotFoundException($collection);
            }

            if (empty($json[$collection . $this->collectionSuffix])) {
                throw new CollectionEmptyException($collection);
            }
        }

        return $collection ? $json[$collection . $this->collectionSuffix] : $json;
    }

    /**
     * @throws Exception
     */
    private function validateXmlResponse(string $body, string|null $collection): ?\SimpleXMLElement
    {
        $xml = simplexml_load_string($body, null, LIBXML_NOCDATA);

        if (empty($body) || !$xml) {
            throw new Exception('Response is empty');
        }

        if ($collection) {
            if ($xml->getName() !== $collection . $this->collectionSuffix) {
                throw new CollectionNotFoundException($collection);
            }

            if ($xml->children()->count() === 0) {
                throw new CollectionEmptyException($collection);
            }
        }

        return $collection ? $xml->children() : $xml;
    }
}
