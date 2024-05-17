<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        
        if (Auth::guard($guard)->check() && Auth::user()->status == 1) {
            return redirect('/dashboard');
        }
        else if(Auth::guard($guard)->check() && Auth::user()->status == 0){
            
            return redirect('/dashboard');
        }
        return $next($request);
    }
}
