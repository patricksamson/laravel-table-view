<?php

namespace Lykegenes\TableView\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class TableViewServiceProvider.
 */
class TableViewServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../resources/config/tableview.php' => config_path('tableview.php'),
        ]);

        $this->mergeConfigFrom(__DIR__.'/../../resources/config/tableview.php', 'tableview');

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'tableview');

        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'laravel-table-view');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        // Register Commands here.
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
