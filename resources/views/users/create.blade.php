@extends('layouts.users')

@section('title', __('users.title_create'))

@section('content')
    <h2>{{ __('users.header_create') }}</h2>

    {!! Form::open(['route' => 'users.store', 'role'=>'form']) !!}
        @include ('users.form', ['submitButtonText' => __('users.button_create')])
    {!! Form::close() !!}
@endsection
