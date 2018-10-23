<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::namespace('Front')->group(function () {
    Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart', 'CartController@store')->name('cart.store');
    Route::get('/cart/clear', 'CartController@clear')->name('cart.clear');
    Route::get('/cart/delete/{id}', 'CartController@delete')->name('cart.delete');

    Route::get("category/{slug}", 'CategoryController@getCategory')->name('front.category.slug');
    Route::get("{product}", 'ProductController@show')->name('front.get.product');
});



