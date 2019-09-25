<?php

if (!function_exists('language')) {
    /**
     * Get the available language instance.
     *
     * @return \App\Http\Support\Language
     */
    function language()
    {
        return app('language');
    }
}