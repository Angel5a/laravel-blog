@extends('layouts.page')

@section('title', 'Articles')

@push('widgets')
    @include('widgets.articles_latest')
    @include('widgets.articles_comments')
    @include('widgets.users_articles')
@endpush