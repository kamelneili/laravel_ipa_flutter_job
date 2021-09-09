<?php

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

Route::get('categories', 'App\Http\Controllers\CategoryController@index');
Route::get('offres/categories/{id}', 'App\Http\Controllers\CategoryController@offres');

Route::get('offres/{key}', 'App\Http\Controllers\OffreController@search');

Route::post('login', 'App\Http\Controllers\ApiAuthController@login');
    //Route::get('user', 'App\Http\Controllers\UserController@current');
    Route::get('offres', 'App\Http\Controllers\OffreController@index');
Route::get('offres/{key}', 'App\Http\Controllers\OffreController@search');
Route::get('offres/categories/{id}', 'App\Http\Controllers\CategoryController@offres');

Route::post('register', 'App\Http\Controllers\UserController@register');
Route::middleware('auth:api')->group(function () {
 Route::post('update', 'App\Http\Controllers\UserController@update');
    Route::get('user', 'App\Http\Controllers\UserController@current');
    Route::post('logout', 'App\Http\Controllers\ApiAuthController@logout');
    Route::post('cart', 'App\Http\Controllers\CartController@addOffreToCart');
    Route::get('cart', 'App\Http\Controllers\CartController@index');
    Route::post('order', 'App\Http\Controllers\OrderController@addOrder');
    Route::get('order', 'App\Http\Controllers\OrderController@index');
    //
    Route::post('offre', 'App\Http\Controllers\OffreController@addOffre');

	});
