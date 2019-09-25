@component('widgets.with_title', ['title' => __('widgets.comments_latest')])
    @if ($comments)
        <ul>
            @foreach ($comments as $comment)
                <li>
                    <a href="{{ route('articles.show', $comment->article->id) . '#comment_' . $comment->id }}">{{ $comment->article->title }}</a>
                    {{ __('widgets.commented_by') }}
                    <a href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
                    {{ $comment->created_at->diffForHumans() }}
                </li>
            @endforeach
        </ul>
    @else
        <div class="no-data">
            <p>{{ __('widgets.comments_no') }}</p>
        </div>
    @endif
@endcomponent
