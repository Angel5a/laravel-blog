@extends('layouts.base')

@section('page')
<main class="py-4">
    <div class="container">
        <div class="row">
            <div class="col content">
                @yield('content')
            </div>
        </div>
    </div>
</main>
@endsection
