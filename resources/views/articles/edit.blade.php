@extends('layouts.articles')

@section('title', __('Edit Article'))

@section('content')
<h2>{{ __('Edit Article:') }} {{ $article->title }}</h2>

{!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PATCH', 'role'=>'form']) !!}
    @include ('articles.form', ['submitButtonText' => __('Update Article')])
{!! Form::close() !!}
@endsection
