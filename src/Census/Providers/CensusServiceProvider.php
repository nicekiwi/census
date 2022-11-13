<?php

declare(strict_types=1);

namespace Nicekiwi\Census\Providers;

use Illuminate\Support\ServiceProvider;

final class CensusServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/census.php' => config_path('census.php'),
        ]);
    }
}
