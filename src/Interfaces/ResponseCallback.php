<?php

namespace Nicekiwi\Census\Interfaces;

use WebSocket\BadOpcodeException;
use WebSocket\ConnectionException;
use WebSocket\TimeoutException;

interface ResponseCallback
{
    public function onConnectionOpened();

    public function onMessageReceived(string $message);

    public function onConnectionClosed(bool $fromException = false);

    public function onExceptionThrown(BadOpcodeException | TimeoutException | ConnectionException $exception);
}
