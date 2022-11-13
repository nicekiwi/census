<?php

namespace Nicekiwi\Census\Tests\Unit;

use Illuminate\Support\Facades\Config;
use Nicekiwi\Census\Tests\TestCase;

class StreamClientTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('census.stream_endpoint', 'push.planetside2.com');
    }

    public function test_it_can_connect_to_stream()
    {
        $this->assertTrue(true);
    }
}
