<?php

namespace App\Http\Middleware;

use Closure;

class TrustsIframes
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
        if ($request->headers->get('referer') && $request->headers->get('referer') !== $request->getSchemeAndHttpHost()) {
            // If request comes from an iframe on a different domain, disable CSRF protection
            config(['session.verify_csrf_token' => false]);
        }

        return $next($request);
    }
}
