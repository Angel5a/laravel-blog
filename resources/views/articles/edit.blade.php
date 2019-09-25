@extends('layouts.articles')

@section('title', __('articles.title_edit'))

@section('content')
    <h2>{{ __('articles.header_edit') }} {{ $article->title }}</h2>

    {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PATCH', 'role'=>'form']) !!}
        @include('articles.form', ['submitButtonText' => __('articles.button_edit')])
    {!! Form::close() !!}
@endsection
