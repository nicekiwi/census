<?php

declare(strict_types=1);

namespace Nicekiwi\Census\Providers;

use Illuminate\Support\ServiceProvider;
use Nicekiwi\Census\Facades\ApiClient;
use Nicekiwi\Census\Facades\StreamClient;

final class CensusServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/census.php' => config_path('census.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('api-client', function($app) {
            return new ApiClient();
        });

        $this->app->bind('stream-client', function($app) {
            return new StreamClient();
        });
    }
}
