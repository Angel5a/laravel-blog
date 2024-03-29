<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', __('Page')) - {{ config('app.name', __('Laravel Blog')) }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/manifest.js') }}" defer></script>
    <script src="{{ asset('js/vendor.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')

    <!-- Fonts -->
    <!--link rel="dns-prefetch" href="//fonts.gstatic.com"-->
    <!--link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')

</head>
<body>
    <div id="app">
        <header>
            @include('includes.nav')
        </header>
        
        @yield('page')

        <footer>
            @include('includes.footer')
        </footer>
    </div>
</body>
</html>
