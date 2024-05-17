<?php

// App\Http\Middleware\XFrameOptionsMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class XFrameOptionsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        
        $response = $next($request);
        // Allow any domain to embed the content in an iframe
        // $response->header('Content-Security-Policy', "frame-ancestors *");

        return $response;
    }
}