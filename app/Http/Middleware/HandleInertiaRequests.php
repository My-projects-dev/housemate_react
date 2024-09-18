<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $translations = json_decode(file_get_contents(resource_path('lang/' . App::getLocale() . '.json')), true);

        $languages = Cache::rememberForever('active_languages', function () {
            return collect(Language::active()->get());
        });

        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],

            'trans' => $translations,
            'language' => App::getLocale(),
            'availableLanguages' => $languages,
//            'availableLanguages' => config('translatable.locales'),
        ];
    }
}
