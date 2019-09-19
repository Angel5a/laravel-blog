@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8">

            <h1>{{ _('Articles') }}</h1>

            <p>
                <a href="{{ route('articles.create') }}" class="btn btn-success pull-right" role="button">{{ __('Add New Article') }}</a>
            </p>

            @forelse ($articles as $article)
                <article>

                    <h2><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></h2>
                    <p class="lead">
                        <i class="fa fa-calendar"></i> {{ __('Posted on') }} {{ $article->published_at }}
                        <i class="fa fa-user"></i> {{ __('by') }} <a href="{{ route('users.profile', $article->user->id) }}">{{ $article->user->name }}</a>
                    </p>
                    <p><i class="fa fa-tags"></i> {{ __('Tags:')  }} <a href=""><span class="badge badge-info">Post</span></a></p>
                    @can('view', $article)
                        <img src="http://placehold.it/600x200" class="img-responsive">
                        <p>{{ $article->preview_text }}</p>
                    @endcan

                    @include('articles.buttons', ['buttons' => ['view', 'update', 'delete']])

                </article>
            @empty
                <article>
                    <div class="no-data">
                        <p>{{ __('No articles') }}</p>
                    </div>
                </article>
            @endforelse
        </div>
    </div>
</div>
@endsection
