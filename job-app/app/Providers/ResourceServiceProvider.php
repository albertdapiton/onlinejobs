<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ResourceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach([
                    'Auth',
                ] as $service) {
            $this->app->singleton(
                "{$service}Service",
                "App\Services\\".$service."Service"
            );
        }
    }
}
