<?php


namespace Sofiakb\Lumen\ApiKey\Providers;


use Illuminate\Support\ServiceProvider;
use Sofiakb\Lumen\ApiKey\Console\Commands\ApiKeyActivateCommand;
use Sofiakb\Lumen\ApiKey\Console\Commands\ApiKeyDeactivateCommand;
use Sofiakb\Lumen\ApiKey\Console\Commands\ApiKeyGenerateCommand;
use Sofiakb\Lumen\ApiKey\Console\Commands\ApiKeyListCommand;
use Sofiakb\Lumen\ApiKey\Console\Commands\ApiKeyRetrieveCommand;
use Sofiakb\Lumen\ApiKey\Console\Commands\ApiKeyTableCommand;

class ApiKeyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Nothing to boot
    }

    public function register()
    {
        $this->app->singleton(
            'command.apikey.generate',
            function ($app) {
                return new ApiKeyGenerateCommand();
            }
        );

        $this->app->singleton(
            'command.apikey.activate',
            function ($app) {
                return new ApiKeyActivateCommand();
            }
        );

        $this->app->singleton(
            'command.apikey.deactivate',
            function ($app) {
                return new ApiKeyDeactivateCommand();
            }
        );

        $this->app->singleton(
            'command.apikey.retrieve',
            function ($app) {
                return new ApiKeyRetrieveCommand();
            }
        );

        $this->app->singleton(
            'command.apikey.table',
            function ($app) {
                return new ApiKeyTableCommand();
            }
        );

        $this->app->singleton(
            'command.apikey.list',
            function ($app) {
                return new ApiKeyListCommand();
            }
        );

        $this->commands(
            'command.apikey.generate',
            'command.apikey.activate',
            'command.apikey.deactivate',
            'command.apikey.retrieve',
            'command.apikey.table',
            'command.apikey.list',
        );
    }
}