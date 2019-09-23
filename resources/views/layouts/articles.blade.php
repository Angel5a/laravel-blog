@extends('layouts.app')

@section('title', 'Articles')

@push('widgets')
    @include('widgets.articles_latest')
    @include('widgets.users_top')
    @include('widgets.users_latest')
@endpush