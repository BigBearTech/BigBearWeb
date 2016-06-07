<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\Theme;

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
    }
}
