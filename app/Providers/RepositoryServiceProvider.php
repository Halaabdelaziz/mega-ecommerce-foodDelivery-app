<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'App\Http\Interfaces\CategoriesInterface',' App\Http\Repositories\CategoriesRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\RestaurantInterface',' App\Http\Repositories\RestaurantsRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\ProductInterface',' App\Http\Repositories\ProductsRepository'
        );
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
