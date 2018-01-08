<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\App\Repositories\UsuariosRepository::class, \App\Repositories\UsuariosRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PacotesRepository::class, \App\Repositories\PacotesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PedidosRepository::class, \App\Repositories\PedidosRepositoryEloquent::class);
    }
}
