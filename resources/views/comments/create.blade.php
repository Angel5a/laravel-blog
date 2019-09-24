@extends('layouts.comments')

@section('title', __('Create new Comment'))

@section('content')
<h2>{{ __('Write comment') }}</h2>

{!! Form::open(['route' => 'comments.store', 'role'=>'form']) !!}
    @include ('comments.form', ['article_id' => null, 'submitButtonText' => __('Add Comment')])
{!! Form::close() !!}
@endsection
