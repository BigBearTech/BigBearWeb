<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\Form;
use App\Classes\Media;
use App\Classes\Search;
use App\Classes\Settings;
use App\Classes\Theme;
use App\Classes\Xml;

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
        $this->app->singleton('Form', function ($app) {
            return new Form();
        });
        $this->app->singleton('Media', function ($app) {
            return new Media();
        });
        $this->app->singleton('Search', function ($app) {
            return new Search();
        });
        $this->app->singleton('Settings', function ($app) {
            return new Settings();
        });
        $this->app->singleton('Theme', function ($app) {
            return new Theme();
        });
        $this->app->singleton('Xml', function ($app) {
            return new Xml();
        });
    }
}
