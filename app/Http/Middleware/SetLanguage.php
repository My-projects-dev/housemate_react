<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!in_array($request->language, config('translatable.locales'))) {

            $segments = array_slice($request->segments(), 1);
            $locale = Session::get('language', config('app.locale'));

            return redirect()->to(url($locale . '/' . implode('/', $segments)));
        }

        Session::put('language', $request->language);
        App::setLocale($request->language);

        return $next($request);
    }
}
