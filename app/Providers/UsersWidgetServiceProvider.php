<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;

class UsersWidgetServiceProvider extends ServiceProvider
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
        view()->composer('widgets.users_latest', function ($view) {
            $view->with('users', User::latest()->limit(10)->get());
        });
        view()->composer('widgets.users_top', function ($view) {
            $view->with(
                'users',
                User::withCount('articles')
                    ->where('articles_count', '>', 5)
                    ->orderBy('articles_count', 'desc')
                    ->limit(10)
                    ->get()
            );
        });
    }
}
