@component('widgets.with_title', ['title' => __('Latest Comments')])
    @if ($comments)
        <ul>
            @foreach ($comments as $comment)
                <li>
                    <a href="{{ route('articles.show', $comment->article->id) }}">{{ $comment->article->title }}</a>
                    {{ __('commented by') }}
                    <a href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
                    {{ __('at') }}
                    {{ $comment->created_at->format('d/m/Y H:m:i') }}
                </li>
            @endforeach
        </ul>
    @else
        <div class="no-data">
            <p>{{ __('No comments') }}</p>
        </div>
    @endif
@endcomponent
