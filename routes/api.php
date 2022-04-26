<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaruntController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/forgetpassword',[AuthController::class,'forgetPassword']);

Route::get('/lang', [LanguageController::class,'switchLang']);
//forget password 
Route::post('/sendemail',[ForgetPasswordController::class,'getEmail']);


Route::group(['middleware' => ['auth:sanctum',]],function(){
    Route::get('/logout',[AuthController::class,'logout']);

    //Restraunts 
    Route::group(['prefix'=> 'restarunt'],function(){
        Route::get('list',[RestaruntController::class,'index']);
        Route::get('details/{id}',[RestaruntController::class,'restaruntDetails']);
    });

//Products
Route::group(['prefix'=> 'product'],function(){
    Route::get('list',[ProductController::class,'index']);
    Route::get('details/{id}',[ProductController::class,'productDetails']);
});
//Cart
Route::group(['prefix'=> 'cart'],function(){
    Route::post('add',[CartController::class,'addToCart']);
    Route::post('/delete',[CartController::class,'delete']);
    Route::post('/update',[CartController::class,'update']);
    Route::get('/usercart',[CartController::class,'userCart']);
    
});
//order
  
Route::group(['prefix'=> 'order'],function(){
    Route::get('/details',[OrderController::class,'orderDetails']);
    Route::post('/checkout',[OrderController::class,'checkout']);
    Route::get('/userorders',[OrderController::class,'userOrders']);
    
});




});