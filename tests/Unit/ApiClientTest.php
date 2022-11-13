<?php

namespace Nicekiwi\Census\Tests\Unit;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Nicekiwi\Census\ApiClient;
use Nicekiwi\Census\Enums\Format;
use Nicekiwi\Census\Enums\Platform;
use Nicekiwi\Census\Exceptions\CollectionEmptyException;
use Nicekiwi\Census\Exceptions\CollectionNotFoundException;
use Nicekiwi\Census\Exceptions\ServiceIdRequiredException;
use Nicekiwi\Census\Tests\TestCase;

class ApiClientTest extends TestCase {

    protected string $endpoint;

    public function setUp(): void
    {
        parent::setUp();

        Http::preventStrayRequests();

        Config::set('census.api_endpoint', 'census.daybreakgames.com');
    }

    public function mockResponse(array|string $body)
    {
        Http::fake([
            'https://census.daybreakgames.com/*' => Http::response($body),
        ]);
    }

    /**
     * @throws \Exception
     */
    public function test_it_can_make_json_request()
    {
        Config::set('census.service_id', 'test');

        $this->mockResponse([
            'test_list' => [
                [
                    'id' => '1'
                ]
            ],
            'returned' => 1
        ]);

        $client = new ApiClient(Platform::PC);
        $response = $client->request('test', []);

        $this->assertSame($response, [
            [
                'id' => '1',
            ]
        ]);
    }

    public function test_it_throws_exception_if_service_id_missing()
    {
        $this->expectException(ServiceIdRequiredException::class);

        $client = new ApiClient(Platform::PC);
    }

    /**
     * @throws \Exception
     */
    public function test_it_throws_exception_if_json_collection_not_found()
    {
        $this->expectException(CollectionNotFoundException::class);

        Config::set('census.service_id', 'test');

        $this->mockResponse([
            'returned' => 0
        ]);

        $client = new ApiClient(Platform::PC);
        $client->request('test', []);
    }

    /**
     * @throws \Exception
     */
    public function test_it_throws_exception_if_json_collection_empty()
    {
        $this->expectException(CollectionEmptyException::class);

        Config::set('census.service_id', 'test');

        $this->mockResponse([
            'test_list' => [],
            'returned' => 0
        ]);

        $client = new ApiClient(Platform::PC);
        $client->request('test', []);
    }

    /**
     * @throws \Exception
     */
    public function test_it_can_make_xml_request()
    {
        Config::set('census.service_id', 'test');

        $this->mockResponse("<?xml version='1.0' encoding='UTF-8'?><test_list limit='0' returned='1'><test id='1'></test></test_list>");

        $client = new ApiClient(Platform::PC, Format::XML);
        $response = $client->request('test', []);

        $this->assertSame((string) $response[0]['id'], '1');
    }

    /**
     * @throws \Exception
     */
    public function test_it_throws_exception_if_xml_collection_not_found()
    {
        $this->expectException(CollectionNotFoundException::class);

        Config::set('census.service_id', 'test');

        $this->mockResponse("<?xml version='1.0' encoding='UTF-8'?><not_found limit='0' returned='0'></not_found>");

        $client = new ApiClient(Platform::PC, Format::XML);
        $client->request('test', []);
    }

    /**
     * @throws \Exception
     */
    public function test_it_throws_exception_if_xml_collection_empty()
    {
        $this->expectException(CollectionEmptyException::class);

        Config::set('census.service_id', 'test');

        $this->mockResponse("<?xml version='1.0' encoding='UTF-8'?><test_list limit='0' returned='0'></test_list>");

        $client = new ApiClient(Platform::PC, Format::XML);
        $client->request('test', []);
    }
}
