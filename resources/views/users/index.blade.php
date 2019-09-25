@extends('layouts.users')

@section('title', __('users.title_index'))

@section('content')
    <h1>{{ __('users.header_index') }}</h1>

    @can('create', \App\User::class)
        <p class="text-right">
            <a href="{{ route('users.create') }}" class="btn btn-success" role="button">{{ __('users.add_user') }}</a>
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
                            @include('users.buttons', ['buttons' => ['show', 'edit', 'delete']])
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    @else
        <article>
            <div class="no-data">
                <p>{{ __('users.empty') }}</p>
            </div>
        </article>
    @endif

    {{ $users->links() }}
@endsection
