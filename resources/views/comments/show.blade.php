@extends('layouts.comments')

<!-- Single comment view on separate page -->

@section('title', __('View comment'))

@section('content')
    <article>
        <h2>
            {{ __('Comment for article:') }}
            <a href="{{ route('articles.show', [$comment->article_id]) }}">{{ $comment->article->title }}</a>
        </h2>
        <p>
            <i class="fa fa-user"></i> <a href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
            <i class="fa fa-calendar"></i> {{ $comment->created_at->format('d/m/Y H:m:i') }}
            <small>
                @if ($comment->updated_at && $comment->updated_at != $comment->created_at)
                    ({{ __('last update') }} {{ $comment->updated_at->format('d/m/Y H:m:i') }})
                @endif
            </small>
        <p>
        @can('view', $comment)
            <p>
                {{ $comment->body }}
            </p>
        @else
            <p class="text-muted">
                {{ __('Comment is hidden.') }}
            </p>
        @endcan

        @include('comments.buttons', ['buttons' => ['update', 'delete']])
    </article>

@endsection
