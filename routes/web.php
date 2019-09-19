<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/articles', 'ArticleController');

// TODO: this must be implemented
Route::get('/profile/{user}', function (App\User $user) {
    return $user->name;
})->name('users.profile');

Route::get('/profile/{user}/articles', 'ArticleController@byUser')->name('users.articles');
