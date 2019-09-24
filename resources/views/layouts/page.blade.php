@extends('layouts.base')

@section('page')
<div class="container">
    <div class="row">
        <div class="col-lg-8 content">
            <main class="py-4">
                @yield('content')
            </main>
        </div>

        <div class="col-lg-4 sidebar">
            @stack('widgets')
            @yield('sidebar', '')
        </div>
    </div>
</div>
@endsection
