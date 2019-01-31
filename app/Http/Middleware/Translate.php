<?php

namespace App\Http\Middleware;

use Closure;

class Translate
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = 'en';

        if (auth()->user()) {
            if (!empty(auth()->user()->lang))

                $lang = auth()->user()->lang;
        } else {
            if (session()->has('lang'))
                $lang = session()->get('lang');

        }
        app()->setLocale($lang);

        return $next($request);
    }
}
