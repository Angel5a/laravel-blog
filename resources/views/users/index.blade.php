@extends('layouts.users')

@section('content')
<h1>{{ _('Users') }}</h1>

@can('create', \App\User::class)
<p class="text-right">
    <a href="{{ route('users.create') }}" class="btn btn-success" role="button">{{ __('Add New User') }}</a>
</p>
@endcan

@if ($users)
    <article>
        <div class="conteiner">
            @foreach ($users as $user)
                <div class="row">
                    <div class="col">
                        <span>{{ $user->name }}</span>
                    </div>
                    <div class="col">
                        @include('users.buttons', ['buttons' => ['view', 'update', 'delete']])
                    </div>
                </div>
            @endforeach
        </div>
    </article>
@else
    <article>
        <div class="no-data">
            <p>{{ __('No users') }}</p>
        </div>
    </article>
@endif

{{ $users->links() }}
@endsection
