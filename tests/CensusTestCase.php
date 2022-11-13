<?php

declare(strict_types=1);

namespace Nicekiwi\Census\Tests;

use Nicekiwi\Census\Providers\CensusServiceProvider;
use Orchestra\Testbench\TestCase;

class CensusTestCase extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            CensusServiceProvider::class,
        ];
    }
}
