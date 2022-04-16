<?php

use App\Http\Controllers\Auth\AuthController;
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
Route::group(['middleware' => ['auth:sanctum']],function(){
Route::get('/logout',[AuthController::class,'logout']);
  
//Restraunts 
Route::group(['prefix'=> 'restarunt'],function(){
    Route::get('list',[RestaruntController::class,'index']);
    Route::get('details/{id}',[RestaruntController::class,'restaruntDetails']);
});

//Products
Route::group(['prefix'=> 'product'],function(){
    Route::get('list',[RestaruntController::class,'index']);
    Route::get('details/{id}',[RestaruntController::class,'productDetails']);
});


});