<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products',[ProductController::class,'getProducts']);

Route::get('product/{id}',[ProductController::class,'getProduct']);

Route::get('getCachedProduct',[ProductController::class,'getCachedProduct']);

Route::put('product',[ProductController::class,'addProduct']);

Route::delete('product/{id}',[ProductController::class,'deleteProduct']);
