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

Route::get('/articles/{article}/comments', 'CommentController@byArticle')->name('articles.comments');
Route::resource('/articles', 'ArticleController');

Route::get('/users/{user}/articles', 'ArticleController@byUser')->name('users.articles');
Route::get('/users/{user}/comments', 'CommentController@byUser')->name('users.comments');
Route::resource('/users', 'UserController');

Route::resource('/comments', 'CommentController');

Route::get('/languages/{lang}/home', 'LanguageController@home')->name('language.home');
Route::get('/languages/{lang}/back', 'LanguageController@back')->name('language.back');
