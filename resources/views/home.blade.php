@extends('layouts.app')

@section('title', __('Home'))

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
            @include('widgets.users_latest')
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs">
            @include('widgets.comments_latest')
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs">
            @include('widgets.articles_comments')
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs">
            @include('widgets.users_articles')
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs">
            @include('widgets.users_comments')
        </div>
    </div>
</div>
@endsection
