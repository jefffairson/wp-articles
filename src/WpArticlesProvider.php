<?php

namespace Jefffairson\WPArticles;

use Illuminate\Support\ServiceProvider;

class WpArticlesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__ . '/config' =>
            realpath(app_path() . '/../config'),
        ], 'wparticles-config');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
