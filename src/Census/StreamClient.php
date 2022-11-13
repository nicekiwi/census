<?php

namespace Nicekiwi\Census;

use JsonException;
use Nicekiwi\Census\Enums\Platform;
use Nicekiwi\Census\Exceptions\ServiceIdRequiredException;
use WebSocket\BadOpcodeException;
use WebSocket\Client;
use WebSocket\ConnectionException;
use WebSocket\TimeoutException;

class StreamClient
{
    /**
     * @var Client
     */
    protected Client $stream;
    /**
     * @var bool
     */
    protected bool $listen = false;

    /**
     * Stream constructor.
     * @param Platform $platform
     * @param int $timeout
     * @throws ServiceIdRequiredException
     */
    public function __construct(Platform $platform, int $timeout = 60)
    {
        $serviceId = config('services.census.service_id');
        $endpoint = config('services.census.event_endpoint');

        if (!$serviceId) {
            throw new ServiceIdRequiredException();
        }

        $url = sprintf(
            'wss://%s/streaming?environment=%s&service-id=s:%s',
            $endpoint,
            $platform->value,
            $serviceId
        );

        $this->stream = new Client($url, [
            'timeout' => $timeout
        ]);
    }

    public function close(): void
    {
        $this->listen = false;
        $this->stream->close();
    }

    /**
     * @param array $events
     * @param array $worlds
     * @param $callback
     */
    public function subscribe(array $events, array $worlds, $callback): void
    {
        $this->listen = true;

        try {
            $this->stream->send(json_encode([
                'service' => 'event',
                'action' => 'subscribe',
                'worlds' => empty($worlds) ? ['all'] : $worlds,
                'eventNames' => $events
            ], JSON_THROW_ON_ERROR));
        } catch (BadOpcodeException | JsonException $e) {
            $callback(null, $e);
            $this->close();
        }

        while ($this->listen) {
            try {
                $response = $this->stream->receive();
                $cleanResponse = $this->cleanResponse($response);

                if ($cleanResponse) {
                    $callback($cleanResponse, null);
                }
            } catch (ConnectionException | TimeoutException | JsonException $e) {
                $callback(null, $e);
                $this->close();
            }
        }
    }

    /**
     * @param string $payload
     * @return mixed|null
     * @throws JsonException
     */
    private function cleanResponse(string $payload): mixed
    {
        $data = json_decode($payload, true, 512, JSON_THROW_ON_ERROR);

        if (array_key_exists('type', $data) &&
            array_key_exists('payload', $data) &&
            $data['type'] === 'serviceMessage' &&
            $data['payload'] !== null
        ) {
            return $data['payload'];
        }

        return null;
    }
}
