@extends('layouts.users')

@section('title', __('Create new User'))

@section('content')
<h2>{{ __('Create new User') }}</h2>

{!! Form::open(['route' => 'users.store', 'role'=>'form']) !!}
@include ('users.form', ['submitButtonText' => __('Add User')])
{!! Form::close() !!}
@endsection
