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

Route::get('/', function () {
    return redirect('/'. App\Http\Middleware\LocaleMiddleware::$mainLanguage);
});

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function(){
    Auth::routes();

    Route::namespace('Front')->group(function () {

        Route::post("/search", 'SearchController@search')->name('search.product');

        Route::get('/', 'HomeController@index')->name('home');
        //Route::get('/exception', 'HomeController@Exception')->name('home');

        Route::get('/cart', 'CartController@index')->name('cart.index');
        Route::post('/cart', 'CartController@store')->name('cart.store');
        Route::get('/cart/clear', 'CartController@clear')->name('cart.clear');
        Route::get('/cart/delete/{id}', 'CartController@delete')->name('cart.delete');


        Route::get("category/{slug}", 'CategoryController@getCategory')->name('front.category.slug');

        Route::post("{product}", 'ProductController@show')->name('front.get.product');
        Route::get("{product}", 'ProductController@show')->name('front.get.product');

        Route::post("/comment/create", 'CommentController@addComment')->name('comment.create');
        Route::post("/comment/update", 'CommentController@updateComment')->name('comment.update');
    });

});

Route::get('setlocale/{lang}', 'Front\LocaleController@index')->name('setlocale');




