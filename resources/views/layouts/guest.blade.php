<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Streams of Life</title>
        {{-- <title>{{ config('app.name', 'Streams of Life') }}</title> --}}

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            html {
                scroll-behavior: smooth;
            }
        </style>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="antialiased bg-white">
        
        @if (!request()->routeIs('login') && !request()->routeIs('register'))
            @include('partials.navigation')
        @endif
        <main>
            {{ $slot }}
        </main>

        @livewireScripts
    </body>
    
</html>
