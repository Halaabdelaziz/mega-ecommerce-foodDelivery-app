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
        $this->app->bind(
            'App\Http\Interfaces\RestaruntInterface',
            'App\Http\Repositories\RestaruntRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\CategoryInterface',
            'App\Http\Repositories\CategoryRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\ProductInterface',
            'App\Http\Repositories\ProductRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\CartInterface',
            'App\Http\Repositories\CartRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\OrderInterface',
            'App\Http\Repositories\OrderRepository'
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
