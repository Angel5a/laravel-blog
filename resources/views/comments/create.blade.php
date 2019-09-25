@extends('layouts.comments')

@section('title', __('comments.title_create'))

@section('content')
    <h2>{{ __('comments.header_create') }}</h2>

    {!! Form::open(['route' => 'comments.store', 'role'=>'form']) !!}
        @include('comments.form', ['article_id' => null, 'submitButtonText' => __('comments.button_create')])
    {!! Form::close() !!}
@endsection
