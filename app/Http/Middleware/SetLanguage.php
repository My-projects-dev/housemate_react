<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Stevebauman\Location\Facades\Location;
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
//        $position = Location::get($request->ip());
        $position = Location::get('8.8.8.8');

        if (Session::get('language') ==null && $request->language===null && $position && isset($position->countryCode) && in_array(strtolower($position->countryCode), config('translatable.locales'))) {

            $countryCode = strtolower($position->countryCode);
            Session::put('language', $countryCode);
            App::setLocale($countryCode);
            return $next($request);
        }

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
