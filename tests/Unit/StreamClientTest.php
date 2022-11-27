<?php

namespace Nicekiwi\Census\Tests\Unit;

use Illuminate\Support\Facades\Config;
use Nicekiwi\Census\Tests\TestCase;

class StreamClientTest extends TestCase
{
    protected string $url;

    public function setUp(): void
    {
        parent::setUp();

        Config::set('census.stream_endpoint', 'push.planetside2.com');
    }
}
