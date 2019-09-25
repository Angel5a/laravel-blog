@extends('layouts.comments')

<!-- Single comment view on separate page -->

@section('title', __('comments.title_show'))

@section('content')
    <article>
        <h2>
            {{ __('comments.header_show') }}
            <a href="{{ route('articles.show', [$comment->article_id]) }}">{{ $comment->article->title }}</a>
        </h2>
        <p>
            <i class="fa fa-user"></i> <a href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
            <i class="fa fa-calendar"></i> {{ $comment->created_at->isoFormat('LLL') }}
            @if ($comment->updated_at && $comment->updated_at != $comment->created_at)
                <small>
                    ({{ __('comments.updated_at') }} {{ $comment->updated_at->isoFormat('LLL') }})
                </small>
            @endif
        </p>

        @can('view', $comment)
            <p>{{ $comment->body }}</p>
        @else
            <p class="text-muted">{{ __('comments.hidden') }}</p>
        @endcan

        @include('comments.buttons', ['buttons' => ['edit', 'delete']])
    </article>
@endsection
