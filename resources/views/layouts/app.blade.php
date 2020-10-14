<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Favicon -->
    <link href="/assets/img/brand/favicon.png" rel="icon" type="image/png">

    <!-- Icons -->
    <link href="{{asset('argon/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Argon JS -->
    <script src="{{asset('argon/js/argon.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/core.css') }}" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="{{asset('argon/css/argon.min.css')}}" rel="stylesheet">

    <script src="{{asset('js/core.js')}}"></script>

    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    @yield('styles')

</head>
<body>
    <div id="app">

        @if (Auth::user())
            @include('partials.sidebar')
        @endif
    
        <main class="main-content" id="panel">
            
            @if (Auth::user())
            @include('partials.navbar')
            @endif

            @yield('content')

        </main>

    </div>

    @yield('javascript')

</body>
</html>
