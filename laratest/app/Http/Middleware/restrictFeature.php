<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class restrictFeature
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if($request->session()->get('type')=='admin'){
            $request->session()->put('restrict','admin');
            return $next($request);
         }else{
            $request->session()->put('restrict','user');
            return $next($request);
         } 
    }
}
