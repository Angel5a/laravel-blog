<?php

namespace App\Http\Middleware;

use Closure;

class Language
{
    /**
     * Set locale (for current request).
     * 
     * @param  string  $locale
     */
    private function setLocale($locale)
    {
        if (!language()->allowed($locale)) {
            $locale = config('app.locale');
        }
        \App::setLocale($locale);
        $locale = explode('-', $locale, 2)[0];
        \Carbon\Carbon::setLocale($locale);
    }

    /**
     * Set locale from request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function setLocaleForRequest($request)
    {
        if ($request->session()->has('locale')) {
            $locale = $request->session()->get('locale');
        } else {
            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE', config('app.locale')), 0, 2);
        }
        $this->setLocale($locale);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->setLocaleForRequest($request);
        return $next($request);
    }
}
