<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\RestaurantController;
use App\Http\Controllers\admin\ProductController;

Route::get('/', function () {
    return view('layouts.master');
});

// Categories' routes
Route::prefix('category')->group(function () {
    Route::get('/index',[CategoryController::class,'index'])->name('getCategories');
    Route::get('/create',[CategoryController::class,'create']);
    Route::post('/create',[CategoryController::class,'store']);
    Route::get('/{id}/edit',[CategoryController::class,'edit']);
    Route::patch('/{id}/edit',[CategoryController::class,'update']);
    Route::delete('/{id}',[CategoryController::class,'destroy']);
});
// restaurants' routes

Route::prefix('restaurant')->group(function () {
    Route::get('/index',[RestaurantController::class,'index'])->name('getRestaurants');
    Route::get('/create',[RestaurantController::class,'create']);
    Route::post('/create',[RestaurantController::class,'store']);
    Route::get('/{id}/edit',[RestaurantController::class,'edit']);
    Route::patch('/{id}/edit',[RestaurantController::class,'update']);
    Route::delete('/{id}',[RestaurantController::class,'destroy']);
});

// products' routes
Route::prefix('product')->group(function () {
    Route::get('/index',[ProductController::class,'index'])->name('getProducts');
    Route::get('/create',[ProductController::class,'create']);
    Route::post('/create',[ProductController::class,'store']);
    Route::get('/{id}/edit',[ProductController::class,'edit']);
    Route::patch('/{id}/edit',[ProductController::class,'update']);
    Route::delete('/{id}',[ProductController::class,'destroy']);
});
