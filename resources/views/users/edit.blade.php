@extends('layouts.users')

@section('title', __('users.title_edit'))

@section('content')
    <h2>{{ __('users.header_edit') }} {{ $user->title }}</h2>

    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH', 'role'=>'form']) !!}
        @include ('users.form', ['submitButtonText' => __('users.button_edit')])
    {!! Form::close() !!}
@endsection
