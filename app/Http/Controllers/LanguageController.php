<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Store locale.
     *
     * @param  string  $locale
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function setLocale($locale, $request)
    {
        if (!language()->allowed($locale)) {
            $locale = config('app.locale');
        }
        $request->session()->put('locale', $locale);
    }

    /**
     * Set locale and redirect to home page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $locale
     * @return \Illuminate\Http\Response
     */
    public function home($locale, Request $request)
    {
        $this->setLocale($locale, $request);
        return redirect()->route('home');
    }

    /**
     * Set locale and redirect back.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $locale
     * @return \Illuminate\Http\Response
     */
    public function back($locale, Request $request)
    {
        $this->setLocale($locale, $request);
        return redirect()->back();
    }
}
