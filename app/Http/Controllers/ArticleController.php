<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\PostArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    /**
     * Display a listing of available articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('user')->published()->latest()->paginate(10);
        return view('articles.index')->with('articles', $articles);
        //return view('articles.index', compact('articles', 'users'));
    }

    /**
     * Show the form for creating a new article.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("articles.create");
    }

    /**
     * Store a newly created article in storage.
     *
     * @param  \App\Http\Requests\PostArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostArticleRequest $request)
    {
        $article = \Auth::user()->articles()->create($request->all());
        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Display the specified article.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified article.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified article in storage.
     *
     * @param  \App\Http\Requests\PostArticleRequest  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(PostArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Remove the specified article from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    /**
     * Display a listing of the articles for specified user.
     * 
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function byUser($user_id)
    {
        $articles = Article::with('user')->byUserId($user_id)->latest()->paginate(10);
        return view('articles.index')->with('articles', $articles);
    }
    /*public function byUser(\App\User $user)
    {
        $articles = $user->articles->latest()->paginate(10);
        return view('articles.index')->with('articles', $articles);
    }*/
}
