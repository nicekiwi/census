<?php

namespace Nicekiwi\Census;

use JsonException;
use WebSocket\Client;
use WebSocket\BadOpcodeException;
use Nicekiwi\Census\Enums\Platform;
use Nicekiwi\Census\Exceptions\ServiceIdRequiredException;
use Nicekiwi\Census\Interfaces\ResponseCallback;

class StreamClient
{
    protected Client $stream;

    protected bool $listen = false;

    protected string $url;

    protected int $timeout;

    protected ResponseCallback $callback;

    /**
     * Stream constructor.
     * @param Platform $platform
     * @param ResponseCallback $callback
     * @param int $timeout
     * @throws ServiceIdRequiredException
     */
    public function __construct(Platform $platform, ResponseCallback $callback, int $timeout = 60)
    {
        $serviceId = config('census.service_id');
        $endpoint = config('census.stream_endpoint');

        if (!$serviceId) {
            throw new ServiceIdRequiredException();
        }

        $this->url = sprintf(
            'wss://%s/streaming?environment=%s&service-id=s:%s',
            $endpoint,
            $platform->value,
            $serviceId
        );

        $this->timeout = $timeout;

        $this->callback = $callback;
    }

    /**
     * @return void
     */
    public function openConnection(): void
    {
        $this->stream = new Client($this->url, [
            'timeout' => $this->timeout
        ]);

        $this->callback->onConnectionOpened();
    }

    /**
     * @param bool $fromException
     * @return void
     */
    public function closeConnection(bool $fromException): void
    {
        $this->listen = false;
        $this->stream->close();

        $this->callback->onConnectionClosed($fromException);
    }

    /**
     * @param array $events
     * @param array $worlds
     * @param array $characters
     * @param bool $logicalAndCharactersWithWorlds
     * @return string
     * @throws JsonException
     */
    public function subscribePayload(
        array $events,
        array $worlds = ['all'],
        array $characters = ['all'],
        bool $logicalAndCharactersWithWorlds = true
    ): string
    {
        return json_encode([
            'service' => 'event',
            'action' => 'subscribe',
            'eventNames' => $events,
            'worlds' => $worlds,
            'characters' => $characters,
            'logicalAndCharactersWithWorlds' => $logicalAndCharactersWithWorlds
        ], JSON_THROW_ON_ERROR);
    }

    /**
     * @param string $payload
     */
    public function subscribe(string $payload): void
    {
        $this->sendMessage($payload);

        while ($this->listen) {
            $this->callback->onMessageReceived($this->stream->receive());
        }
    }

    /**
     * @param string $payload
     * @return void
     */
    public function sendMessage(string $payload): void
    {
        $this->listen = true;

        try {
            $this->stream->send($payload);
        } catch (BadOpcodeException $e) {
            $this->callback->onExceptionThrown($e);
            $this->closeConnection(true);
        }
    }

    /**
     * @return bool
     */
    public function getListen(): bool
    {
        return $this->listen;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
