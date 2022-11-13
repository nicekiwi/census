<?php

namespace Nicekiwi\Census;

use Exception;
use Illuminate\Http\Client\Response;
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
    public function __construct(Platform $platform = Platform::PC, Format $format = Format::JSON)
    {
        $serviceId = config('services.census.service_id');

        if (!$serviceId) {
            throw new ServiceIdRequiredException();
        }

        $this->format = $format;

        $this->baseUrl = sprintf(
            'https://%s/s:%s/get/%s:%s',
            config('services.census.api_endpoint'),
            $serviceId,
            $platform->value,
            $this->version
        );
    }

    /**
     * @throws Exception
     */
    public function request(string $collection, array $params, bool $validateCollection = true)
    {
        $url = $this->baseUrl . '/' . $collection;
        $path = $validateCollection ? $collection . $this->collectionSuffix : null;

        if (array_key_exists('format', $params) && $this->format->value !== $params['format']) {
            $this->format = Format::from($params['format']);
        }

        if (!array_key_exists('format', $params)) {
            $params['format'] = $this->format->value;
        }

        $response = Http::get($url, $params);

        if ($this->format === Format::JSON) {
            return $this->validateJsonResponse($response, $path);
        }

        return $this->validateXmlResponse($response, $path);
    }

    /**
     * @throws Exception
     */
    private function validateJsonResponse(Response $response, string|null $collection): mixed
    {
        $json = $response->json() ?? [];

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
    private function validateXmlResponse(Response $response, string|null $collection): array|\SimpleXMLElement
    {
        $body = $response->body();
        $xml = simplexml_load_string($body);

        if (empty($body) || !$xml) {
            throw new Exception('Response is empty');
        }

        if ($collection) {
            $xmlCollection = $xml->xpath($collection . $this->collectionSuffix);

            if (!$xmlCollection) {
                throw new CollectionNotFoundException($collection);
            }

            if (!is_array($xmlCollection) || empty($xmlCollection)) {
                throw new CollectionEmptyException($collection);
            }
        }

        return $collection ? $xml->xpath($collection . $this->collectionSuffix) : $xml;
    }
}
