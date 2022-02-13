<?php

namespace Laravox\Documentor;

use Illuminate\Support\ServiceProvider;

class DocumentorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/config.php',
            'documentor'
        );
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/config/config.php' => config_path('documentor.php'),
            ], 'config');
        }
    }
}
