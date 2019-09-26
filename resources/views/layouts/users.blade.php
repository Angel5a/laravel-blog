@extends('layouts.page')

@section('title', __('Users'))

@push('widgets')
    @include('widgets.users_latest')
    @include('widgets.users_articles')
    @include('widgets.users_comments')
@endpush