@extends('layouts.comments')

@section('title', __('Edit comment'))

@section('content')
<h2>{{ __('Edit comment:') }} {{ $comment->article->title }}</h2>

{{ $comment->user->name }}

{!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PATCH', 'role'=>'form']) !!}
    @include ('comments.form', ['article_id' => null, 'submitButtonText' => __('Update Comment')])
{!! Form::close() !!}
@endsection
