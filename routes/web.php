<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\LangController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\admin\RestaurantController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('lang/home', [LangController::class,'index']);
Route::get('lang/change', [LangController::class,'change'])->name('changeLang');
Route::get('/resetPasswordpage/{token}',[ForgetPasswordController::class,'changePasswordPage']);
Route::post('/resetPassword',[ForgetPasswordController::class,'resetPassword']);

Route::group(['middleware' =>['auth', 'verified']],function (){
    Route::get('/layout', function () {
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
        Route::get('/{id}/edit',[ProductController::class,'edit'])->name('editProduct');
        Route::patch('/{id}/edit',[ProductController::class,'update']);
        Route::delete('/{id}',[ProductController::class,'destroy']);
    });


});
Route::get('/logout',[AuthenticatedSessionController::class,'destroy']);

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
    return view('Auth.login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
