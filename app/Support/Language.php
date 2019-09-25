<?php

namespace App\Support;

class Language
{

    /**
     * Returns array of all allowed locale codes
     * 
     * @return  array
     */
    protected static function allowedLocales()
    {
        $codes = config('language.allowed');
        if (empty($codes)) {
            $codes = [];
        }
        $codes[] = config('app.locale');
        $codes[] = config('app.fallback_locale');
        $codes = array_filter($codes);
        $codes = array_unique($codes);
        return $codes;
    }

    /**
     * Check if locale is allowed.
     * Returns names of all allowed locales indexed by locale codes.
     * 
     * @param  string|null
     * @return bool|array
     */
    public static function allowed($locale = null)
    {
        if ($locale) {
            return in_array($locale, self::allowedLocales());
        }

        return self::names();
    }

    /**
     * Returns names of passed or all allowed locales indexed by locale codes.
     * 
     * @param  array|null
     * @return array
     */
    public static function names($locales = null)
    {
        if (!$locales) {
            $locales = self::allowedLocales();
        }

        $all = config('language.all');

        $names = [];
        foreach ($locales as $locale) {
            $names[$locale] = isset($all[$locale]) ? $all[$locale] : 'Unknown';
        }
        return $names;
    }

    /**
     * Return current locale (e.g. 'en').
     * 
     * @return  string
     */
    public static function getLocale()
    {
        return app()->getLocale();
    }

    /**
     * Return current locale name (e.g. 'English').
     * 
     * @return  string
     */
    public static function getName($locale = null)
    {
        if (empty($locale)) {
            $locale = app()->getLocale();
        }
        //$all = config('language.all');
        //return isset($all[$code]) ? $all[$code] : 'Unknown';
        return self::names([$locale])[$locale];
    }
}
