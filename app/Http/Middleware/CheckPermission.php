<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    public function handle($request, Closure $next)
    {
        
        $account = \Auth::user()->account;
        if (!$account)
            return redirect('/');
       
        //الرابط المطلوب
        //App\Http\Controllers\Account\AccountController@index
        $currentAction = \Route::currentRouteAction();
        if ($account != NULL) {
            //الرابط المطلوب
            //example  App\Http\Controllers\AccountController@index
            list($controller, $method) = explode('@', $currentAction);
            // $controller now is "App\Http\Controllers\FooBarController"
            $controller = strtolower(preg_replace('/.*\\\/', '', $controller));
            $controller = str_replace("controller", "", $controller);
            if ($method == "index")
                $method = "";
            else
                $method = "/$method";
            
            $url = "/account/$controller" . $method; 
            $url = parse_url($url);
            $url = $url["path"];

            $link = \DB::table("links")->where('url', $url)->first();

            //معناه انه الرابط عليه صلاحيات
            if ($link != NULL) {
                $haveAdminThisLink = $account->links->contains($link->id);
                if (!$haveAdminThisLink) {
                    return redirect('/account/home/noaccess');
                }
            }
        }
        return $next($request);
    }
}
