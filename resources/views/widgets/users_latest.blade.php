@component('widgets.with_title')
    @slot('title')
        <i class="fa fa-user"></i> {{ __('widgets.users_latest') }}
    @endslot

    @if ($users)
        <ul>
            @foreach ($users as $user)
                <li>
                    <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                    {{ $user->created_at->diffForHumans() }}
                </li>
            @endforeach
        </ul>
    @else
        <div class="no-data">
            <p>{{ __('widgets.no_users') }}</p>
        </div>
    @endif
@endcomponent
