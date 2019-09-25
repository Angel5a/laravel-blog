@extends('layouts.articles')

@section('title', __('articles.title_create'))

@section('content')
    <h2>{{ __('articles.header_create') }}</h2>

    {!! Form::open(['route' => 'articles.store', 'role'=>'form']) !!}
        @include('articles.form', ['submitButtonText' => __('articles.button_create')])
    {!! Form::close() !!}
@endsection
