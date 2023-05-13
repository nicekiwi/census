<?php /** @noinspection PhpUnhandledExceptionInspection */

use Illuminate\Support\Facades\Config;
use Nicekiwi\Census\ApiClient;
use Nicekiwi\Census\Enums\Format;
use Nicekiwi\Census\Enums\Platform;
use Nicekiwi\Census\Exceptions\CollectionEmptyException;
use Nicekiwi\Census\Exceptions\CollectionNotFoundException;
use Nicekiwi\Census\Exceptions\ServiceIdRequiredException;

beforeEach(function () {
    Config::set('census.api_endpoint', 'census.daybreakgames.com');
});

it('can make json request', function ()
{
    Config::set('census.service_id', 'test');

    mockApiResponse([
        'test_list' => [
            [
                'id' => '1'
            ]
        ],
        'returned' => 1
    ]);

    $client = new ApiClient(Platform::PC);
    $response = $client->request('test', []);

    test()->assertSame($response, [
        [
            'id' => '1',
        ]
    ]);
});

it('throws exception if service id missing', function () {
    new ApiClient(Platform::PC);
})->throws(ServiceIdRequiredException::class);

it('throws exception if json collection not found', function () {
    Config::set('census.service_id', 'test');

    mockApiResponse([ 'returned' => 0 ]);

    $client = new ApiClient(Platform::PC);
    $client->request('test', []);
})->throws(CollectionNotFoundException::class);

it('throws exception if json collection empty', function () {
    Config::set('census.service_id', 'test');

    mockApiResponse([
        'test_list' => [],
        'returned' => 0
    ]);

    $client = new ApiClient(Platform::PC);
    $client->request('test', []);
})->throws(CollectionEmptyException::class);

it( 'can make xml request', function () {
    Config::set('census.service_id', 'test');

    mockApiResponse("<?xml version='1.0' encoding='UTF-8'?><test_list limit='0' returned='1'><test id='1'></test></test_list>");

    $client = new ApiClient(Platform::PC, Format::XML);
    $response = $client->request('test', []);

    test()->assertSame((string) $response[0]['id'], '1');
});

it('throws exception if xml collection not found', function () {
    Config::set('census.service_id', 'test');

    mockApiResponse("<?xml version='1.0' encoding='UTF-8'?><not_found limit='0' returned='0'></not_found>");

    $client = new ApiClient(Platform::PC, Format::XML);
    $client->request('test', []);
})->throws(CollectionNotFoundException::class);

it('throws exception if xml collection empty', function () {
    Config::set('census.service_id', 'test');

    mockApiResponse("<?xml version='1.0' encoding='UTF-8'?><test_list limit='0' returned='0'></test_list>");

    $client = new ApiClient(Platform::PC, Format::XML);
    $client->request('test', []);
})->throws(CollectionEmptyException::class);
