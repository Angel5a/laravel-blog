<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;

class ArticlesWidgetServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('widgets.articles_latest', function ($view) {
            $view->with('articles', Article::published()->latest()->with('user')->limit(10)->get());
        });
    }
}
