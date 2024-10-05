<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/guest/style.css','resources/css/common.css', 'resources/js/app.js'])
    </head>
    <body>

        <header>
            <div>
                <a href="/">
                    <x-application-logo />
                </a>
            </div>
            @include('layouts.app_navigation')
        </header>

        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>

    </body>
</html>
