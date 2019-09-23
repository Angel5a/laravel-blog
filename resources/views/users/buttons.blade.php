@canany($buttons, $user)
    <ul class="list-inline">
        @if (in_array('view', $buttons))
            @can('view', $user)
                <li class="list-inline-item">
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-default btn-sm" role="button">{{ __('View') }}</a>
                </li>
            @endcan
        @endif
        @if (in_array('update', $buttons))
            @can('update', $user)
                <li class="list-inline-item">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-default btn-sm" role="button">{{ __('Edit') }}</a>
                </li>
            @endcan
        @endif
        @if (in_array('delete', $buttons))
            @can('delete', $user)
                <li class="list-inline-item">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style'=>'form-inline' ]) !!}
                        {!! Form::submit(__('Delete'), ['class' => 'btn btn-default btn-sm']) !!}
                    {!! Form::close() !!}
                </li>
            @endcan
        @endif
    </ul>
@endcan