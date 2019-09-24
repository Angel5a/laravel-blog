<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\PostCommentRequest;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with(['article', 'user'])->latest()->paginate(30);
        return view('comments.index')->with('comments', $comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comments.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCommentRequest $request)
    {
        $comment = \Auth::user()->comments()->create($request->all());
        //return redirect()->route('articles.show', $comment->article_id)->withFragment('#comment_'.$comment->id);
        return redirect(route('articles.show', $comment->article_id) . '#comment_'.$comment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('comments.show')->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit')->with('comment', $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(PostCommentRequest $request, Comment $comment)
    {
        $comment->update($request->all());
        //return redirect()->route('comments.show', $comment->id);
        return redirect(route('articles.show', $comment->article_id) . '#comment_'.$comment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $article_id = $comment->article_id;
        $comment->delete();
        //return redirect()->route('comments.index');
        return redirect(route('articles.show', $article_id) . '#comments');
    }

    /**
     * Display a listing of the comments for specified user.
     * 
     * @param  int  $user_id  Authors id.
     * @return \Illuminate\Http\Response
     */
    public function byUser($user_id)
    {
        $comments = Comment::with(['article', 'user'])->byUserId($user_id)->latest()->paginate(30);
        return view('comments.index')->with('comments', $comments);
    }
    /*public function byUser(\App\User $user)
    {
        $articles = $user->comments;
        return view('comments.index')->with('comments', $comments);
    }*/

    /**
     * Display a listing of the comments for specified article.
     * 
     * @param  int  $article_id  Article id.
     * @return \Illuminate\Http\Response
     */
    public function byArticle($article_id)
    {
        $comments = Comment::with(['article', 'user'])->byArticleId($article_id)->latest()->paginate(30);
        return view('comments.index')->with('comments', $comments);
    }
    /*public function byArticle(\App\Article $article)
    {
        $comments = $article->comments;
        return view('comments.index')->with('comments', $comments);
    }*/
}
