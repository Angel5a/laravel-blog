@extends('layouts.articles')

<!-- Comments on separate page -->

@section('content')
<h1>{{ _('Comments') }}</h1>

@forelse ($comments as $comment)
    <article>
        <a name="{{ 'comment_' . $comment->id }}"></a>
        <p class="lead">
            <a href="{{ route('articles.show', [$comment->article_id]) }}">{{ $comment->article->title }}</a>
        </p>
        @can('view', $comment)
            <p>
                {{ $comment->body }}
            </p>
        @else
            <p class="text-muted">
                {{ __('Comment is hidden.') }}
            </p>
        @endcan
        <p>
            <i class="fa fa-user"></i> <a href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
            <i class="fa fa-calendar"></i> {{ $comment->created_at->format('d/m/Y H:m:i') }}
            <small>
                @if ($comment->updated_at && $comment->updated_at != $comment->created_at)
                    ({{ __('last update') }} {{ $comment->updated_at->format('d/m/Y H:m:i') }})
                @endif
            </small>
        </p>

        @include('comments.buttons', ['buttons' => ['view', 'update', 'delete']])
    </article>
@empty
    <article>
        <div class="no-data">
            <p>{{ __('No comments') }}</p>
        </div>
    </article>
@endforelse

{{ $comments->links() }}
@endsection
