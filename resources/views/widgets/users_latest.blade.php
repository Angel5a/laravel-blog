@component('widgets.with_title')
    @slot('title')
        <i class="fa fa-user"></i> {{ __('Latest Users') }}
    @endslot

    @if ($users)
        <ul>
            @foreach ($users as $user)
                <li>
                    <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                    {{ $user->created_at->format('d/m/Y') }}
                </li>
            @endforeach
        </ul>
    @else
        <div class="no-data">
            <p>{{ __('No users') }}</p>
        </div>
    @endif
@endcomponent
