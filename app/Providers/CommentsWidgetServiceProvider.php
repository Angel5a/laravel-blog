<?php

namespace App\Providers;

use App\Comment;
use Illuminate\Support\ServiceProvider;

class CommentsWidgetServiceProvider extends ServiceProvider
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
        view()->composer('widgets.comments_latest', function ($view) {
            $view->with('comments', Comment::with(['user:id,name', 'article:id,title'])->latest()->limit(10)->get());
        });
    }
}
