@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">

            <h2>{{ _('Create new Article') }}</h2>

            {!! Form::open(['route' => 'articles.store', 'role'=>'form']) !!}
            @include ('articles.form', ['submitButtonText' => __('Add Article')])
            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
