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
            
            // Script sources - allow specific trusted domains and unsafe-eval for frameworks
            "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net https://code.jquery.com https://cdnjs.cloudflare.com https://unpkg.com https://framerusercontent.com https://www.googletagmanager.com https://www.clarity.ms https://js.stripe.com",
            
            // Style sources - allow same origin, specific CDNs, and inline styles for background images
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://unpkg.com",
            
            // Image sources - allow same origin, data URIs, and common image sources
            "img-src 'self' data: https://framerusercontent.com https://images.unsplash.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://www.google-analytics.com https://*.cloudflare.com https://*.jsdelivr.net https://*.unpkg.com https://*.googleusercontent.com https://*.google.com",
            
            // Font sources - allow same origin and Google Fonts only
            "font-src 'self' https://fonts.gstatic.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com",
            
            // Connect sources - for AJAX requests to specific APIs only
            "connect-src 'self' https://api.calendly.com https://framerusercontent.com https://www.google-analytics.com https://www.clarity.ms https://l.clarity.ms",
            
            // Frame sources - allow same origin and specific embeds only
            "frame-src 'self' https://calendly.com https://www.google.com https://js.stripe.com",
            
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
