@component('widgets.with_title')
    @slot('title')
        <i class="fa fa-user"></i> {{ __('Top users by comments') }}
    @endslot

    @if ($users)
        <ul>
            @foreach ($users as $user)
                <li>
                    <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                    {{ trans_choice('{0} with no comments|[1] with single comment|[2,*] with :count comments', $user->comments_count) }}
                </li>
            @endforeach
        </ul>
    @else
        <div class="no-data">
            <p>{{ __('No users') }}</p>
        </div>
    @endif
@endcomponent
