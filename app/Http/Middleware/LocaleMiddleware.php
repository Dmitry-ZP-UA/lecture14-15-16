<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;

class LocaleMiddleware
{
    /**
     * @var string
     */
    public static $mainLanguage = 'en';

    /**
     * @var array
     */
    public static $languages = ['en', 'ru'];

    /**
     * @return string
     */
    public static function getLocale()
    {
        $uri = Request::path();
        $segmentsURI = explode('/',$uri);
        if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], self::$languages))
        {
            return $segmentsURI[0];
        } else
            {
                return  self::$mainLanguage;
            }
    }

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();
        if($locale) App::setLocale($locale);

        return $next($request);
    }

}
