<?php

namespace Programadoramauri\Marvelapi;

use Illuminate\Support\ServiceProvider;

class MarvelapiServiceProvider extends ServiceProvider
{

    protected $defer = false;
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/routes.php';
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function provides()
    {
        return array();
    }
}
