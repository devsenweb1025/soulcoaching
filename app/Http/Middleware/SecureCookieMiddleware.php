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

        // Detect HTTPS more reliably for production servers
        $isHttps = $request->isSecure() || 
                  $request->header('X-Forwarded-Proto') === 'https' ||
                  $request->header('X-Forwarded-SSL') === 'on' ||
                  $request->header('X-Forwarded-Port') === '443' ||
                  $request->header('X-Forwarded-Host') && str_contains($request->header('X-Forwarded-Host'), 'https') ||
                  (app()->environment('production') && $request->header('Host') && !str_contains($request->header('Host'), 'localhost'));

        // In production, always assume HTTPS unless explicitly detected as HTTP
        if (app()->environment('production')) {
            $isHttps = $isHttps || !$request->header('X-Forwarded-Proto') || $request->header('X-Forwarded-Proto') !== 'http';
        }

        // Set session cookie parameters
        ini_set('session.cookie_httponly', 1);
        ini_set('session.cookie_samesite', 'Lax');
        
        // Set secure flag based on HTTPS detection
        if ($isHttps) {
            ini_set('session.cookie_secure', 1);
            config(['session.secure' => true]);
        } else {
            ini_set('session.cookie_secure', 0);
            config(['session.secure' => false]);
        }
        
        // Always set these for consistency
        config(['session.http_only' => true]);
        config(['session.same_site' => 'lax']);

        return $response;
    }
}
