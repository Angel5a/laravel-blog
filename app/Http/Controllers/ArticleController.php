<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\PostArticleRequest;

class ArticleController extends Controller
{
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
        /*if(\Auth::user()->isAdmin()) {
            $articles = Article::withTrashed()->latest();
        } else {
            $articles = Article::latest()->published();
        }
        $articles = $articles->with('user')->paginate(10);*/
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
     * @param  \Illuminate\Http\Request  $request
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
     * @param  \Illuminate\Http\Request  $request
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

    /*public function forceDelete(Article $article)
    {
        $this->authorize('forceDelete', $article);
        // do complite remove
    }*/

    /**
     * Display a listing of the articles for specified user.
     * 
     * @param  int  $user_id  Authors id.
     * @return \Illuminate\Http\Response
     */
    public function byUser($user_id)
    {
        $articles = Article::with('user')->byUserId($user_id)->latest()->paginate(10);
        /*$curUser = \Auth::user();
        $articles = Article::with('user');
        if($curUser->isAdmin() || $curUser->id == $user_id) {
            $articles = $articles->withTrashed();
        } else {
            $articles = $articles->published();
        }
        $articles = $articles->byUserId($user_id)->latest()->paginate(10);*/
        return view('articles.index')->with('articles', $articles);
    }
    /*public function byUser(\App\User $user)
    {
        $articles = $user->articles;
        return view('articles.index')->with('articles', $articles);
    }*/
}
