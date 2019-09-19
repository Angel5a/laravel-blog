@canany($buttons, $article)
    <ul class="list-inline">
        @if (in_array('view', $buttons))
            @can('view', $article)
                <li class="list-inline-item">
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-default btn-sm" role="button">{{ __('Read') }}</a>
                </li>
            @endcan
        @endif
        @if (in_array('update', $buttons))
            @can('update', $article)
                <li class="list-inline-item">
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-default btn-sm" role="button">{{ __('Edit') }}</a>
                </li>
            @endcan
        @endif
        @if (in_array('delete', $buttons))
            @can('delete', $article)
                <li class="list-inline-item">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['articles.destroy', $article->id], 'style'=>'form-inline' ]) !!}
                        {!! Form::submit(__('Delete'), ['class' => 'btn btn-default btn-sm']) !!}
                    {!! Form::close() !!}
                </li>
            @endcan
        @endif
    </ul>
@endcan