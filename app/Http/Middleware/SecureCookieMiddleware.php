<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecureCookieMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Force secure cookies in production or when HTTPS is detected
        if ($request->isSecure() || app()->environment('production') || 
            $request->header('X-Forwarded-Proto') === 'https' ||
            $request->header('X-Forwarded-SSL') === 'on') {
            
            // Set secure cookie parameters
            ini_set('session.cookie_secure', 1);
            ini_set('session.cookie_httponly', 1);
            ini_set('session.cookie_samesite', 'Lax');
            
            // Force HTTPS for cookies in production
            if (app()->environment('production')) {
                config(['session.secure' => true]);
                config(['session.http_only' => true]);
                config(['session.same_site' => 'lax']);
            }
        }

        return $response;
    }
}
