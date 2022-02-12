<?php

namespace Laravox\Documentor\Providers;

use Illuminate\Support\ServiceProvider;

class DocumentorServiceProvider extends ServiceProvider
{
    private $packageConfigPath = __DIR__ . '/../config/documentor.php';
    private $configKey = 'documentor';

    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                $this->packageConfigPath() => $this->configPath(),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            $this->packageConfigPath(),
            $this->configKey()
        );
    }

    private function packageConfigPath(): string
    {
        return $this->packageConfigPath;
    }

    private function configPath(): string
    {
        return config_path(
            $this->configKey() . ".php"
        );
    }

    private function configKey(): string
    {
        return $this->configKey;
    }
}
