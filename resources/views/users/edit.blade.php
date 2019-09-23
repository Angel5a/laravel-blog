@extends('layouts.users')

@section('title', __('Edit User'))

@section('content')
<h2>{{ __('Edit User:') }} {{ $user->title }}</h2>

{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH', 'role'=>'form']) !!}
    @include ('users.form', ['submitButtonText' => __('Update User')])
{!! Form::close() !!}
@endsection
