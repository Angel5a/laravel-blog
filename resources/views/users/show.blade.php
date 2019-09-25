@extends('layouts.users')

@section('title', $user->name)

@section('content')
    <article>
        <h2>{{ $user->name }}</h2>

        <a href="#" class="btn btn-default btn-disabled" role="button">
            {{ __('users.profile') }}
        </a>
        <a href="{{ route('users.articles', $user->id) }}" class="btn btn-default" role="button">
            {{ __('users.articles') }}
        </a>
        <a href="{{ route('users.comments', $user->id) }}" class="btn btn-default" role="button">
            {{ __('users.comments') }}
        </a>


        @can ('view', $user)
            <div class="conteiner">
                <div class="row">
                    <div class="col-lg-2">
                        {{ __('users.created_at') }}
                    </div>
                    <div class="col-lg-10">
                        {{ $user->created_at->isoFormat('LLL') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        {{ __('users.role') }}
                    </div>
                    <div class="col-lg-10">
                        {{ __('users.roles.' . $user->role) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        {{ __('users.info') }}
                    </div>
                    <div class="col-lg-10">
                        {{ $user->info }}
                    </div>
                </div>
            </div>
        @endcan

        @include('users.buttons', ['buttons' => ['edit', 'delete']])
    </article>
@endsection
