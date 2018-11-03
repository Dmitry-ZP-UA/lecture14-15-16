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

        Route::get('/', 'HomeController@index')->name('home');
        //Route::get('/exception', 'HomeController@Exception')->name('home');
        Route::get('/cart', 'CartController@index')->name('cart.index');
        Route::post('/cart', 'CartController@store')->name('cart.store');
        Route::get('/cart/clear', 'CartController@clear')->name('cart.clear');
        Route::get('/cart/delete/{id}', 'CartController@delete')->name('cart.delete');

        Route::get("category/{slug}", 'CategoryController@getCategory')->name('front.category.slug');
        Route::get("{product}", 'ProductController@show')->name('front.get.product');
        Route::post("{product}", 'ProductController@AddToComment')->name('product.comment');


    });

});

Route::get('setlocale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl();;
    $parse_url = parse_url($referer, PHP_URL_PATH);
    $segments = explode('/', $parse_url);
    if (in_array($segments[1], App\Http\Middleware\LocaleMiddleware::$languages)) {
        unset($segments[1]);
    }
    array_splice($segments, 1, 0, $lang);
    $url = Request::root().implode("/", $segments);
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url);

})->name('setlocale');




