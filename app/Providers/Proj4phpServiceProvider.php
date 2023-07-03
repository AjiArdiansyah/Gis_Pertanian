<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use proj4php\Proj4php;

class Proj4phpServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('proj4php', function ($app) {
            return new Proj4php();
        });
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
