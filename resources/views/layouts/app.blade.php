<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/core.css') }}" rel="stylesheet">

    @yield('styles')

</head>
<body>
    <div id="app">

        {{-- @isset($message)
        @include('partials.alert')
        @endif --}}

        @include('partials.navbar')

        <div class="container-fluid row">
        
        @if (Auth::user())
            @include('partials.sidebar')
        @endif

        <main class="col py-4 border-left">
            @yield('content')
        </main>

        </div>
    </div>

    @yield('javascript')

</body>
</html>
