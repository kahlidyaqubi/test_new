<?php

namespace App\Http\Middleware;

use Closure;

class OrgRole
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
        $response = $next($request);
		$org = \Auth::user()->org;
        if(!$org)
            return redirect('/');
        
        return $response;
    }
}
