@extends('layouts.page')

@section('title', __('Comments'))

@push('widgets')
    @include('widgets.comments_latest')
    @include('widgets.articles_comments')
    @include('widgets.users_comments')
@endpush