<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductionCsrfMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ensure CSRF token exists (session is already started by StartSession middleware)
        if (!$request->session()->has('_token')) {
            $request->session()->put('_token', csrf_token());
        }

        // Set proper session configuration for production
        if (app()->environment('production')) {
            // Detect if behind proxy/load balancer
            $isBehindProxy = $request->header('X-Forwarded-For') || 
                            $request->header('X-Forwarded-Proto') ||
                            $request->header('X-Real-IP');

            if ($isBehindProxy) {
                // Trust proxy headers
                $request->setTrustedProxies(['127.0.0.1', '::1'], 
                    Request::HEADER_X_FORWARDED_FOR | 
                    Request::HEADER_X_FORWARDED_HOST | 
                    Request::HEADER_X_FORWARDED_PORT | 
                    Request::HEADER_X_FORWARDED_PROTO
                );
            }

            // Set secure cookies if using HTTPS
            $isHttps = $request->isSecure() || 
                      $request->header('X-Forwarded-Proto') === 'https' ||
                      $request->header('X-Forwarded-SSL') === 'on';

            if ($isHttps) {
                config(['session.secure' => true]);
                ini_set('session.cookie_secure', 1);
            } else {
                config(['session.secure' => false]);
                ini_set('session.cookie_secure', 0);
            }
        }

        return $next($request);
    }
}
