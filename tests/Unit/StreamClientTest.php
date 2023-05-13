<?php /** @noinspection PhpUnhandledExceptionInspection */

use Illuminate\Support\Facades\Config;
use Nicekiwi\Census\Enums\Platform;
use Nicekiwi\Census\Exceptions\ServiceIdRequiredException;
use Nicekiwi\Census\Interfaces\ResponseCallback;
use Nicekiwi\Census\StreamClient;
use WebSocket\Client as WebSocketClient;

beforeEach(function () {
    Config::set('census.stream_endpoint', 'push.planetside2.com');
});

it('throws ServiceIdRequiredException', function () {
    new StreamClient(Platform::PC, $this->mock(ResponseCallback::class));
})->throws(ServiceIdRequiredException::class);

it('can create instance', function () {
    Config::set('census.service_id', 'test');

    $mockClient = Mockery::mock(WebSocketClient::class);
    $mockCallback = Mockery::mock(ResponseCallback::class);

    app()->instance(WebSocketClient::class, $mockClient);

    $client = new StreamClient(Platform::PC, $mockCallback);

    test()->assertInstanceOf(StreamClient::class, $client);
    test()->assertSame($client->getUrl(), 'wss://push.planetside2.com/streaming?environment=ps2&service-id=s:test');
    test()->assertSame($client->getListen(), false);
});
