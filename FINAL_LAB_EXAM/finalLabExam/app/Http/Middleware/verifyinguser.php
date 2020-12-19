<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class verifyinguser
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
        if($request->session()->has('username')){
            return $next($request);
         }else{
             $request->session()->flash('msg', 'invalid request for system access...');
             return redirect('/login');
         } 
    }
}
