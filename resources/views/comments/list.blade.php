<!-- Comments on article page -->

<h4>
    {{ __('Comments (:count)', ['count' => $comments->count()]) }}
</h4>

<div class="conteiner">
    @forelse ($comments as $comment)
        <div class="row">
            <div class="col">
                <p class="lead">
                    <a name="{{ 'comment_' . $comment->id }}"></a>
                    <i class="fa fa-user"></i> <a href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
                    <i class="fa fa-calendar"></i> {{ $comment->created_at->format('d/m/Y H:m:i') }}
                    <small>
                        @if ($comment->updated_at && $comment->updated_at != $comment->created_at)
                            ({{ __('last update') }} {{ $comment->updated_at->format('d/m/Y H:m:i') }})
                        @endif
                    </small>
                    <a href="{{ route('articles.show', [$comment->article_id]) . '#comment_'. $comment->id }}" title="{{ __('Link to this comment') }}">#</a>
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
                @include('comments.buttons', ['buttons' => ['view', 'update', 'delete']])
            </div>
        </div>
    @empty
        <div class="row">
            <div class="col">
                <p class="text-center text-muted">
                    {{ __('No comments.') }}
                </p>
            </div>
        </div>
    @endforelse
</div>
