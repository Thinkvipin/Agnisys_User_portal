<?php
// ReleaseFolderAuth.php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ReleaseFolderAuth
{
    public function handle($request, Closure $next)
    {
        // // Check if the user is authenticated
        // if (Auth::check()) {
        //     return $next($request);
        // }

        // // If not authenticated, redirect to the login page
        // return redirect('/login');
    }
}