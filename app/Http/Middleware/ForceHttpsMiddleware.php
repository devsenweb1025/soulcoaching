<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttpsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Force HTTPS in production or when not already secure
        if (app()->environment('production') && !$request->isSecure()) {
            // Check for various HTTPS indicators
            $isHttps = $request->isSecure() || 
                      $request->header('X-Forwarded-Proto') === 'https' ||
                      $request->header('X-Forwarded-SSL') === 'on' ||
                      $request->header('X-Forwarded-Port') === '443';
            
            if (!$isHttps) {
                $url = 'https://' . $request->getHttpHost() . $request->getRequestUri();
                return redirect($url, 301);
            }
        }

        return $next($request);
    }
}
