@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">

            <h2>{{ __('Edit Article:') }} {{ $article->title }}</h2>

            {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PATCH', 'role'=>'form']) !!}
                @include ('articles.form', ['submitButtonText' => __('Update Article')])
            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
