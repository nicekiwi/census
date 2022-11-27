<?php

namespace Nicekiwi\Census;

use JsonException;
use Nicekiwi\Census\Enums\Platform;
use Nicekiwi\Census\Exceptions\ServiceIdRequiredException;
use WebSocket\Client;
use WebSocket\BadOpcodeException;
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
        $serviceId = config('census.service_id');
        $endpoint = config('census.event_endpoint');

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

    /**
     * @return void
     */
    public function close(): void
    {
        $this->listen = false;
        $this->stream->close();
    }

    /**
     * @throws JsonException
     */
    public function subscribePayload(array $events, array $worlds = ['all'], array $characters = ['all']): string
    {
        return json_encode([
            'service' => 'event',
            'action' => 'subscribe',
            'eventNames' => $events,
            'worlds' => $worlds,
            'characters' => $characters,
        ], JSON_THROW_ON_ERROR);
    }

    /**
     * @param string $payload
     * @param $callback
     */
    public function subscribe(string $payload, $callback): void
    {
        $this->listen = true;

        try {
            $this->stream->send($payload);
        } catch (BadOpcodeException $e) {
            $callback(null, $e);
            $this->close();
        }

        while ($this->listen) {
            try {
                $callback($this->stream->receive());
            } catch (ConnectionException | TimeoutException $e) {
                $callback(null, $e);
                $this->close();
            }
        }
    }
}
