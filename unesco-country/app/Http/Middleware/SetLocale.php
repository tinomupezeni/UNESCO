<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Get the language parameter from the route prefix (e.g. 'en' or 'fr')
        $language = $request->route()->parameter('language');

        if ($language && in_array($language, ['en', 'fr'])) {
            // 2. Set the application locale so Laravel knows which language to use
            app()->setLocale($language);

            // 3. Set the default parameter for URL helpers (like route()) 
            // so we don't have to manually pass ['language' => $language] every time
            URL::defaults(['language' => $language]);

            // 4. Forget the 'language' parameter from the route so that it is not
            // passed as the first argument to controller action methods.
            // This prevents parameter shifting in controller methods like show(string $slug)
            $request->route()->forgetParameter('language');
        } else {
            // Fallback default
            app()->setLocale('en');
            URL::defaults(['language' => 'en']);
        }

        return $next($request);
    }
}
