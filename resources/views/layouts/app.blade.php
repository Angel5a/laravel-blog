@extends('layouts.base')

@section('page')
<div class="container">
    <div class="row">
        <div class="col-lg-8 content">
            @yield('content')
        </div>

        <div class="col-lg-4 sidebar">
            @stack('widgets')
            @yield('sidebar', '')
        </div>
    </div>
</div>
@endsection
