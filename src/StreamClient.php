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
     * @param $callback
     * @param array $events
     * @param array $worlds
     * @param array $characters
     */
    public function subscribe($callback, array $events, array $worlds = ['all'], array $characters = ['all']): void
    {
        $this->listen = true;

        try {
            $this->stream->send(json_encode([
                'service' => 'event',
                'action' => 'subscribe',
                'eventNames' => $events,
                'worlds' => $worlds,
                'characters' => $characters,
            ], JSON_THROW_ON_ERROR));
        } catch (BadOpcodeException | JsonException $e) {
            $callback(null, $e);
            $this->close();
        }

        while ($this->listen) {
            try {
                $callback($this->stream->receive());
            } catch (ConnectionException | TimeoutException | JsonException $e) {
                $callback(null, $e);
                $this->close();
            }
        }
    }
}
