@extends('layouts.articles')

@section('title', $article->title)

@section('content')
    <h2>{{ $article->title }}</h2>

    <article>
        <p class="small">
            <i class="fa fa-calendar"></i> {{ __('articles.published_at') }} {{ $article->published_at->isoFormat('LL') }}
            <i class="fa fa-user"></i> {{ __('articles.by_user') }} <a href="{{ route('users.show', $article->user->id) }}">{{ $article->user->name }}</a>
            <small>
                @if ($article->updated_at && $article->updated_at != $article->created_at)
                    ({{ __('articles.updated_at') }} {{ $article->updated_at->isoFormat('LL') }})
                @endif
            </small>
        </p>
        <!--p><i class="fa fa-tags"></i> {{ __('articles.tags')  }} <a href=""><span class="badge badge-info">Post</span></a></p-->

        @can('view', $article)
            <!--img src="{{ asset('img/support/600x200.png')}}" class="img-responsive"-->
            <p>{{ $article->body }}</p>
        @endcan

        @include('articles.buttons', ['buttons' => ['edit', 'delete']])
    </article>

    @include('comments.list', ['comments' => $article->comments])

    @include('comments.add_form', ['article_id' => $article->id])

@endsection
