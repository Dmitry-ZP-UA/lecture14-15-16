<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.11.18
 * Time: 10:05
 */

namespace App\Http\Controllers\Front;

use App\Http\Middleware\LocaleMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class LocaleController
{

    public function index($lang, Request $request)
    {
        $referer = Redirect::back()->getTargetUrl();

        $parse_url = parse_url($referer, PHP_URL_PATH);
        $segments = explode('/', $parse_url);

        if (in_array($segments[1], LocaleMiddleware::$languages)) {
            unset($segments[1]);
        }
        array_splice($segments, 1, 0, $lang);
        $url = $request->root().implode("/", $segments);

        if(parse_url($referer, PHP_URL_QUERY)){
            $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
        }

        return redirect($url);
    }

}