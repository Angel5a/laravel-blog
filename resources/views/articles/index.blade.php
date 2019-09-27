@extends('layouts.articles')

@section('title', __('articles.title_index'))

@section('content')
<h1>{{ __('articles.header_index') }}</h1>

@can('create', \App\Article::class)
<p>
    <a href="{{ route('articles.create') }}" class="btn btn-success pull-right" role="button">{{ __('articles.add_article') }}</a>
</p>
@endcan

@forelse ($articles as $article)
    <article>
        <h2><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></h2>
        <p class="small">
            <i class="fa fa-calendar"></i> {{ __('articles.published_at') }} {{ $article->published_at->isoFormat('LL') }}
            <i class="fa fa-user"></i> {{ __('articles.by_user') }} <a href="{{ route('users.show', $article->user->id) }}">{{ $article->user->name }}</a>
        </p>
        <!--p><i class="fa fa-tags"></i> {{ __('articles.tags')  }} <a href=""><span class="badge badge-info">Post</span></a></p-->

        @can('view', $article)
            <!--img src="{{ asset('img/support/600x200.png')}}" class="img-responsive"-->
            <p>{{ $article->preview_text }}</p>
        @endcan

        @include('articles.buttons', ['buttons' => ['show', 'edit', 'delete']])
    </article>
@empty
    <article>
        <div class="no-data">
            <p>{{ __('articles.empty') }}</p>
        </div>
    </article>
@endforelse

{{ $articles->links() }}
@endsection
