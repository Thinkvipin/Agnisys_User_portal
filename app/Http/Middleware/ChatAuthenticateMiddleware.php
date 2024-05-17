<?php
// ChatAuthenticateMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class ChatAuthenticateMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // User is authenticated, allow access to the requested page
            return $next($request);
        }

        // User is not authenticated, redirect to the specified page
        return redirect('/login2'); // Change '/login' to your desired redirect page
    }
}
