<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        @stack('css')
        @livewireStyles
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{asset('assets/css/line-awesome.css')}}">
        <link rel="stylesheet" href="{{asset('css/serpientes.css')}}?v=1993.1.8">
        <script>
            window.PUSHER_APP_KEY = '{{ config('broadcasting.connections.pusher.key') }}';
            window.APP_ENV = {{ config('app.env') == 'production' ? true : false }};
        </script>
        @stack('game')
    </head>
    <body class="font-sans antialiased" x-data="{sidebarOpen:false}">
        <x-banner />
            <div class="min-h-screen bg-gray-100">
                <!-- livewire('navigation-menu') -->
                {{ $slot }}
            </div>
        @stack('modals')
        @livewireScripts
        @stack('js')
        <div class="2xl:hidden xl:hidden lg:hidden"
        :class="{
        'bg-gray-900/50  fixed inset-0 z-30': sidebarOpen,
        '': !sidebarOpen
        }"></div>
    </body>
</html>
