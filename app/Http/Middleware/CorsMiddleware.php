<?php

// namespace App\Http\Middleware;

// use Closure;

// class CorsMiddleware
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @return mixed
//      */
//     public function handle($request, Closure $next)
//     {
        
//         $headers = [
//             'Access-Control-Allow-Origin' => '*',
//             'Access-Control-Allow-Methods' => 'GET, POST, OPTIONS',
//             'Access-Control-Allow-Headers' => 'Content-Type',
//             'Access-Control-Allow-Credentials' => 'true',
//         ];

//         if ($request->isMethod('OPTIONS')) {
//             return response('', 200)->withHeaders($headers);
//         }

//         return $next($request)->withHeaders($headers);
//     }
// }



namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CorsMiddleware
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
        
        if (!($response instanceof BinaryFileResponse)) {
            $response->header('Access-Control-Allow-Origin', '*');
            $response->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
            $response->header('Access-Control-Allow-Headers', 'Content-Type');
            $response->header('Access-Control-Allow-Credentials', 'true');
        }

        return $response;
    }
}

