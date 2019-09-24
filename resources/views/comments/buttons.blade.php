@canany($buttons, $comment)
    <ul class="list-inline">
        @if (in_array('view', $buttons))
            @can('view', $comment)
                <li class="list-inline-item">
                    <a href="{{ route('comments.show', $comment->id) }}" class="btn btn-default btn-sm" role="button">{{ __('View') }}</a>
                </li>
            @endcan
        @endif
        @if (in_array('update', $buttons))
            @can('update', $comment)
                <li class="list-inline-item">
                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-default btn-sm" role="button">{{ __('Edit') }}</a>
                </li>
            @endcan
        @endif
        @if (in_array('delete', $buttons))
            @can('delete', $comment)
                <li class="list-inline-item">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['comments.destroy', $comment->id], 'style'=>'form-inline' ]) !!}
                        {!! Form::submit(__('Delete'), ['class' => 'btn btn-default btn-sm']) !!}
                    {!! Form::close() !!}
                </li>
            @endcan
        @endif
    </ul>
@endcan