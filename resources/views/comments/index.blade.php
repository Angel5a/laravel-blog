@extends('layouts.articles')

<!-- Comments on separate page -->

@section('title', __('comments.title_index'))

@section('content')
    <h1>{{ __('comments.header_index') }}</h1>

    @forelse ($comments as $comment)
        <article>
            <a name="{{ 'comment_' . $comment->id }}"></a>
            <p class="lead">
                <a href="{{ route('articles.show', [$comment->article_id]) }}">{{ $comment->article->title }}</a>
            </p>
            @can('view', $comment)
                <p>{{ $comment->body }}</p>
            @else
                <p class="text-muted">{{ __('comments.hidden') }}</p>
            @endcan
            <p>
                <i class="fa fa-user"></i> <a href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
                <i class="fa fa-calendar"></i> {{ $comment->created_at->diffForHumans() }}
                @if ($comment->updated_at && $comment->updated_at != $comment->created_at)
                    <small>
                        ({{ __('comments.updated_at') }} {{ $comment->updated_at->diffForHumans() }})
                    </small>
                @endif
            </p>

            @include('comments.buttons', ['buttons' => ['show', 'edit', 'delete']])
        </article>
    @empty
        <article>
            <div class="no-data">
                <p>{{ __('comments.empty') }}</p>
            </div>
        </article>
    @endforelse

    {{ $comments->links() }}
@endsection
