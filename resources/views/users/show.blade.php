@extends('layouts.users')

@section('title', $user->name)

@section('content')
    <article>
        <h2>{{ $user->name }}</h2>

        <a href="#" class="btn btn-default btn-disabled" role="button">
            {{ __('User profile') }}
        </a>
        <a href="{{ route('users.articles', $user->id) }}" class="btn btn-default" role="button">
            {{ __('View user articles') }}
        </a>
        <a href="{{ route('users.comments', $user->id) }}" class="btn btn-default" role="button">
            {{ __('View user comments') }}
        </a>


        @can ('view', $user)
            <div class="conteiner">
                <div class="row">
                    <div class="col-lg-2">
                        {{ __('Registered at:') }}
                    </div>
                    <div class="col-lg-10">
                        {{ $user->created_at->format('d/m/Y H:i:s') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        {{ __('Role:') }}
                    </div>
                    <div class="col-lg-10">
                        {{ __($user->role) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        {{ __('Info:') }}
                    </div>
                    <div class="col-lg-10">
                        {{ $user->info }}
                    </div>
                </div>
            </div>
        @endcan

        @include('users.buttons', ['buttons' => ['update', 'delete']])
    </article>
@endsection
