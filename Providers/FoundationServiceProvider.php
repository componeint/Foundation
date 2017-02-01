<?php

namespace App\Components\Foundation\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class FoundationServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\App\Components\DBLog\Providers\DBLogServiceProvider::class);
        $this->app->register(\App\Components\Pagination\Providers\PaginationServiceProvider::class);
        $this->app->register(\App\Components\QueryBasic\Providers\QueryBasicServiceProvider::class);

        // component
        // $this->app->register(\Consigliere\Components\ServiceProvider::class);

        // Load the Facade aliases
        // $loader = AliasLoader::getInstance();
        // $loader->alias('Component', \Consigliere\Components\Facades\Component::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('foundation.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'foundation'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/foundation');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/foundation';
        }, \Config::get('view.paths')), [$sourcePath]), 'foundation');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/foundation');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'foundation');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'foundation');
        }
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
