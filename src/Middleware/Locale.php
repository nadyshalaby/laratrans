<?php

namespace CoreCave\Laratrans\Middleware;

use Carbon\Carbon;
use Closure;
use CoreCave\Laratrans\Models\Locale as ModelsLocale;
use Symfony\Component\Translation\Loader\ArrayLoader;
use Symfony\Component\Translation\Translator;

class Locale
{
    /**
     * Handle an incoming request to check for localization.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param null $guard
     * @return mixed
     */

    public function handle($request, Closure $next, $guard = null)
    {
        if (!$guard) {
            $guard = config('auth.defaults.guard');
        }

        if (!$request->session()->has("locale.$guard")) {
            $defLocale = ModelsLocale::where('is_default', true)->first();
            $request->session()->put("locale.$guard", $defLocale ? $defLocale->code : config('app.locale'));
        }

        app()->setLocale($request->session()->get("locale.$guard"));

        return $next($request);
    }
}
