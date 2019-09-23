@extends('layouts.articles')

@section('title', $article->title)

@section('content')
<h2>{{ $article->title }}</h2>

<article>
    <p class="lead">
        <i class="fa fa-calendar"></i> {{ __('Posted on') }} {{ $article->published_at->format('d/m/Y') }}
        <i class="fa fa-user"></i> {{ __('by') }} <a href="{{ route('users.show', $article->user->id) }}">{{ $article->user->name }}</a>
    </p>
    <p><i class="fa fa-tags"></i> {{ __('Tags:')  }} <a href=""><span class="badge badge-info">Post</span></a></p>

    @can ('view', $article)
        <img src="http://placehold.it/600x200" class="img-responsive">
        <p>{{ $article->body }}</p>
    @endcan

    @include('articles.buttons', ['buttons' => ['update', 'delete']])
</article>
@endsection
