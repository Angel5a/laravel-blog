<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\PostCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    /**
     * Display a listing of comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with(['article:id,title', 'user:id,name'])->latest()->paginate(30);
        return view('comments.index')->with('comments', $comments);
    }

    /**
     * Show the form for creating a new comment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comments.create");
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param  \App\Http\Requests\PostCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCommentRequest $request)
    {
        $comment = \Auth::user()->comments()->create($request->all());
        //return redirect()->route('articles.show', $comment->article_id)->withFragment('#comment_'.$comment->id);
        return redirect(route('articles.show', $comment->article_id) . '#comment_'.$comment->id);
    }

    /**
     * Display the specified comment.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('comments.show')->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified comment.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit')->with('comment', $comment);
    }

    /**
     * Update the specified comment in storage.
     *
     * @param  \App\Http\Requests\PostCommentRequest  $request
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
     * Remove the specified comment from storage.
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
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function byUser($user_id)
    {
        $comments = Comment::with(['article:id,title', 'user:id,name'])->byUserId($user_id)->latest()->paginate(30);
        return view('comments.index')->with('comments', $comments);
    }
    /*public function byUser(\App\User $user)
    {
        $articles = $user->comments->with(['article', 'user'])->latest()->paginate(30);
        return view('comments.index')->with('comments', $comments);
    }*/

    /**
     * Display a listing of the comments for specified article.
     * 
     * @param  int  $article_id
     * @return \Illuminate\Http\Response
     */
    public function byArticle($article_id)
    {
        $comments = Comment::with(['article:id,title', 'user:id,name'])->byArticleId($article_id)->latest()->paginate(30);
        return view('comments.index')->with('comments', $comments);
    }
    /*public function byArticle(\App\Article $article)
    {
        $comments = $article->comments->with(['article', 'user'])->latest()->paginate(30);
        return view('comments.index')->with('comments', $comments);
    }*/
}
