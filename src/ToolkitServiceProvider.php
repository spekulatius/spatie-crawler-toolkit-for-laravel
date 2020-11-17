<?php

namespace Spekulatius\SpatieCrawlerToolkit;

use Illuminate\Support\ServiceProvider;

class ToolkitServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Load the configuration
        $this->mergeConfigFrom(__DIR__.'/../config/crawler.php', 'crawler');
    }

    /**
     * Publishes the config
     *
     * @return void
     */
    public function publishConfig()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/crawler.php' => config_path('crawler.php'),
            ], 'crawler-toolkit-config');
        }
    }
}
