<?php

namespace Adg\Importer;

use Illuminate\Support\ServiceProvider;
use  Adg\Importer\Commands\Base;

class ImporterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfig();
    }

    public function boot()
    {
        $this->bootMigrations();
        $this->bootCommands();
        $this->publishConfig();
        $this->publishMigrations();
    }

    protected function bootMigrations()
    {
        $path = $this->getMigrationsPath();
        $this->loadMigrationsFrom($path);
    }

    protected function bootCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Base::class
            ]);
        }
    }

    private function mergeConfig()
    {
        $path = $this->getConfigPath();
        $this->mergeConfigFrom($path, 'importer');
    }

    private function publishConfig()
    {
        $path = $this->getConfigPath();
        $this->publishes([$path => config_path('importer.php')], 'config');
    }

    private function publishMigrations()
    {
        $path = $this->getMigrationsPath();
        $this->publishes([$path => database_path('migrations')], 'migrations');
    }

    private function getConfigPath()
    {
        return __DIR__ . '/Resources/config/importer.php';
    }

    private function getMigrationsPath()
    {
        return __DIR__ . '/Database/migrations/';
    }
}