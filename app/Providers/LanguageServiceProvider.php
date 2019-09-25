<?php

namespace App\Providers;

use App\Support\Language;
use Illuminate\Support\ServiceProvider;

class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('language', function ($app) {
            return new Language();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
