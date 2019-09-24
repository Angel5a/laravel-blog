@component('widgets.with_title')
    @slot('title')
        <i class="fa fa-user"></i> {{ __('Top users by articles') }}
    @endslot

    @if ($users)
        <ul>
            @foreach ($users as $user)
                <li>
                    <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                    {{ trans_choice('{0} with no articles|[1] with single article|[2,*] with :count articles', $user->articles_count) }}
                </li>
            @endforeach
        </ul>
    @else
        <div class="no-data">
            <p>{{ __('No users') }}</p>
        </div>
    @endif
@endcomponent
