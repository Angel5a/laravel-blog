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
            $view->with('articles', Article::with('user')->published()->latest()->limit(10)->get());
        });
        view()->composer('widgets.articles_comments', function ($view) {
            $view->with(
                'articles',
                Article::withCount('comments')
                    // ->where('comments_count', '>', 5)
                    ->orderBy('comments_count', 'desc')
                    ->limit(10)
                    ->get()
            );
        });
    }
}
