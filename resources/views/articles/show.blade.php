@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8">

            <h2>{{ $article->title }}</h2>

            <article>

                <p class="lead">
                    <i class="fa fa-calendar"></i> {{ __('Posted on') }} {{ $article->published_at }}
                    <i class="fa fa-user"></i> {{ __('by') }} <a href="{{ route('users.profile', $article->user->id) }}">{{ $article->user->name }}</a>
                </p>
                <p><i class="fa fa-tags"></i> {{ __('Tags:')  }} <a href=""><span class="badge badge-info">Post</span></a></p>
                @can ('view', $article)
                    <img src="http://placehold.it/600x200" class="img-responsive">
                    <p>{{ $article->body }}</p>
                @endcan

                @include('articles.buttons', ['buttons' => ['update', 'delete']])

            </article>

        </div>
    </div>
</div>
@endsection