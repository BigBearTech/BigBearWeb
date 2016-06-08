<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\Theme;
use App\Classes\Media;

class ClassesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Theme', function ($app) {
            return new Theme();
        });
        $this->app->singleton('Media', function ($app) {
            return new Media();
        });
    }
}
