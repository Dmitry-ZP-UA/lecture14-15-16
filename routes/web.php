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

use Illuminate\Support\Facades\Route;

Route::namespace('Front')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('cart', 'CartController');
    Route::get("category/{slug}", 'CategoryController@getCategory')->name('front.category.slug');
    Route::get("{product}", 'ProductController@show')->name('front.get.product');
});
