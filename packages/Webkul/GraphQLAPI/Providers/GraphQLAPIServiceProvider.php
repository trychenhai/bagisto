<?php

namespace Webkul\GraphQLAPI\Providers;

use Illuminate\Support\ServiceProvider;
use Webkul\GraphQLAPI\Console\Commands\Install;

class GraphQLAPIServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'bagisto_graphql');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'bagisto_graphql');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands();
    }

    /**
     * Register the console commands of this package
     *
     * @return void
     */
    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Install::class
            ]);
        }
    }
}
