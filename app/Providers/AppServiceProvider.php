<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //las siguientes tres lineas fueron agregadas para el deploy
        /* si estamos en entorno de produccion, entonces ejecuta las siguientes lineas */
        if ($this->app->environment() == 'production') {
            $this->app->bind('path.public', function() {
                return base_path().'/../public_html';
            });
        }
        /*$this->app->bind('path.public', function() {
            return base_path().'/../public_html';
        });*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
