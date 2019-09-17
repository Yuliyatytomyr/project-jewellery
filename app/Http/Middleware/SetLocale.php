<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $array_locales = ['ru', 'ua'];
        if(in_array($request->segment(1), $array_locales)){
            app()->setLocale($request->segment(1));
        }else{
            app()->setLocale('ua');
        }

        return $next($request);
    }
}
