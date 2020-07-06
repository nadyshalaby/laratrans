<?php

namespace CoreCave\Laratrans\Controllers;

use App\Http\Controllers\Controller;
use CoreCave\Laratrans\Models\Locale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use RuntimeException;

class LocaleController extends Controller
{
    /**
     * Change application locale.
     *
     * @param Request $request
     * @param mixed $guard
     * @param mixed $locale
     * @return RedirectResponse
     * @throws RuntimeException
     * @throws BindingResolutionException
     */
    public function getLocalize(Request $request, $guard, $locale)
    {
        if (Locale::whereCode($locale)->first()) {
            $request->session()->put("locale.$guard", $locale);
        }

        return back();
    }
}
