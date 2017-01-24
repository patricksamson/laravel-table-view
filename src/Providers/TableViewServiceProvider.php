<?php
namespace Lykegenes\TableView\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class TableViewServiceProvider
 * @package Lykegenes\TableView\Providers
 */
class TableViewServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../resources/config/tableview.php' => config_path('tableview.php')
        ]);

        $this->mergeConfigFrom(__DIR__ . '/../../resources/config/tableview.php', 'tableview');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'tableview');
        //$this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'tableview');
    }


    /**
     * Register the service provider.
     *
     * @return void
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
