@extends('layouts.app')

@section('title', 'Users')

@push('widgets')
    @include('widgets.articles_latest')
    @include('widgets.users_top')
    @include('widgets.users_latest')
@endpush