<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function language(String $locale)
{
    $locale = in_array($locale, config('app.locales')) ? $locale : config('app.fallback_locale');
    session(['locale' => $locale]);
    return back();
}
}
