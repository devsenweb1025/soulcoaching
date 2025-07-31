<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentSecurityPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Define CSP directives
        $cspDirectives = [
            // Default source - only allow same origin
            "default-src 'self'",
            
            // Script sources - only allow specific trusted domains (no unsafe-inline/eval)
            "script-src 'self' https://cdn.jsdelivr.net https://code.jquery.com https://cdnjs.cloudflare.com https://unpkg.com https://framerusercontent.com https://www.googletagmanager.com",
            
            // Style sources - allow same origin and specific CDNs only (no unsafe-inline)
            "style-src 'self' https://fonts.googleapis.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://unpkg.com",
            
            // Image sources - allow same origin and specific image sources (no data: or broad https:)
            "img-src 'self' https://framerusercontent.com https://images.unsplash.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://www.google-analytics.com",
            
            // Font sources - allow same origin and Google Fonts only
            "font-src 'self' https://fonts.gstatic.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com",
            
            // Connect sources - for AJAX requests to specific APIs only
            "connect-src 'self' https://api.calendly.com https://framerusercontent.com https://www.google-analytics.com",
            
            // Frame sources - allow same origin and specific embeds only
            "frame-src 'self' https://calendly.com https://www.google.com",
            
            // Object sources - completely blocked for security
            "object-src 'none'",
            
            // Media sources - allow same origin only
            "media-src 'self'",
            
            // Manifest sources - allow same origin
            "manifest-src 'self'",
            
            // Worker sources - allow same origin
            "worker-src 'self'",
            
            // Form action - allow same origin
            "form-action 'self'",
            
            // Base URI - restrict to same origin
            "base-uri 'self'",
            
            // Upgrade insecure requests - upgrade HTTP to HTTPS
            "upgrade-insecure-requests",
            
            // Block mixed content
            "block-all-mixed-content"
        ];

        // Join all directives
        $cspHeader = implode('; ', $cspDirectives);

        // Add CSP header
        $response->headers->set('Content-Security-Policy', $cspHeader);

        // Add additional security headers
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');

        return $response;
    }
}
