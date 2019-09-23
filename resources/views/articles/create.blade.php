@extends('layouts.articles')

@section('title', __('Create new Article'))

@section('content')
<h2>{{ __('Create new Article') }}</h2>

{!! Form::open(['route' => 'articles.store', 'role'=>'form']) !!}
@include ('articles.form', ['submitButtonText' => __('Add Article')])
{!! Form::close() !!}
@endsection
