<?php

namespace Laravox\Documentor;

use Illuminate\Support\ServiceProvider;

class DocumentorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            $this->packageConfigPath(),
            $this->key()
        );
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                $this->packageConfigPath() => $this->appConfigPath(),
            ], 'config');
        }
    }

    /**
     * Path where the config file is placed inside the package
     * 
     * @return string 
     */
    private function packageConfigPath(): string
    {
        return __DIR__ . '/config/config.php';
    }

    /**
     * Path where the config file will be placed in the app
     * 
     */
    private function appConfigPath(): string
    {
        return config_path(
            $this->key() . '.php'
        );
    }

    /**
     * keyname of the config file
     * 
     */
    public function key()
    {
        return 'documentor';
    }
}
