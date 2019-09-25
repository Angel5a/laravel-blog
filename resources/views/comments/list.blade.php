<!-- Comments on article page -->

<h4>
    {{ __('comments.header_list', ['count' => $comments->count()]) }}
</h4>

<div class="conteiner">
    @forelse ($comments as $comment)
        <div class="row">
            <div class="col">
                <p class="lead">
                    <a name="{{ 'comment_' . $comment->id }}"></a>
                    <i class="fa fa-user"></i> <a href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
                    <i class="fa fa-calendar"></i> {{ $comment->created_at->diffForHumans() }}
                    @if ($comment->updated_at && $comment->updated_at != $comment->created_at)
                        <small>
                            ({{ __('comments.updated_at') }} {{ $comment->updated_at->diffForHumans() }})
                        </small>
                    @endif
                    <a href="{{ route('articles.show', [$comment->article_id]) . '#comment_'. $comment->id }}" title="{{ __('comments.link_tooltip') }}">#</a>
                </p>
                
                @can('view', $comment)
                    <p>{{ $comment->body }}</p>
                @else
                    <p class="text-muted">{{ __('comments.hidden') }}</p>
                @endcan

                @include('comments.buttons', ['buttons' => ['show', 'edit', 'delete']])
            </div>
        </div>
    @empty
        <div class="row">
            <div class="col">
                <p class="text-center text-muted">
                    {{ __('comments.empty') }}
                </p>
            </div>
        </div>
    @endforelse
</div>
