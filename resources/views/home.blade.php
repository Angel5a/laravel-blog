@extends('layouts.message')

@section('title', 'Home')

@section('content')
<div class="container">
    @if (session('status'))
    <div class="row justify-content-center">
        <div class="col">
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs">
            @include('widgets.articles_latest')
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs">
            @include('widgets.users_top')
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs">
            @include('widgets.users_latest')
        </div>
    </div>
</div>
@endsection
