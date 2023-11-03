<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('name', 'Mark-et') }}</title>

    <link rel="icon" href="/images/market.ico">

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-neutral-800">
    <div id="app" class="min-h-screen font-poppins">
        @guest
        @else
        <div class="lg:flex lg:flex-row">
            <div class="lg:block hidden">
                @include('layouts.side-nav')
            </div>
            <div class="lg:hidden block mx-11">
                @include('layouts.top-nav')
            </div>
            @endguest
            <main class="flex-grow mx-11">
                @yield('content')
            </main>
        </div>
    </div>
</body>
<script src="{{ asset('components.js') }}"></script>
</html>
