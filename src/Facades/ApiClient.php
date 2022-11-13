<?php

namespace Nicekiwi\Census\Facades;

use Illuminate\Support\Facades\Facade;

class ApiClient extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'api-client';
    }
}
