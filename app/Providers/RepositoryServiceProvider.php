<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\CategoriesRepository;
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
            'App\Http\Interfaces\admin\CategoriesInterface','App\Http\Repositories\admin\CategoriesRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\admin\RestaurantInterface',' App\Http\Repositories\admin\RestaurantsRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\admin\ProductInterface',' App\Http\Repositories\admin\ProductsRepository'
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
