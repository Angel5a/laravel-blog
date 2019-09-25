@extends('layouts.comments')

@section('title', __('comments.title_edit'))

@section('content')
    <h2>
        {{ __('comments.header_edit') }}
        <a href="{{ route('articles.show', [$comment->article_id]) }}">{{ $comment->article->title }}</a>
    </h2>

    {{ $comment->user->name }}

    {!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PATCH', 'role'=>'form']) !!}
        @include ('comments.form', ['article_id' => null, 'submitButtonText' => __('comments.button_edit')])
    {!! Form::close() !!}
@endsection
