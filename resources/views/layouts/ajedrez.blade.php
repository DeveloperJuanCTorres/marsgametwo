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
        <link rel="stylesheet" href="{{asset('assets/css/line-awesome.css')}}?v=1993.1.16">
        <link rel="stylesheet" href="{{asset('css/ajedrez.css')}}?v=1993.1.16">
        <script>
            window.PUSHER_APP_KEY = '{{ config('broadcasting.connections.pusher.key') }}';
            window.APP_ENV = {{ config('app.env') == 'production' ? true : false }};
        </script>
        @stack('game')
    </head>
    <body class="font-sans antialiased" x-data="{sidebarOpen:false}">
        <x-banner />
            <div class="min-h-screen bg-gray-100">
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

        <div id="modalWiner" class="hidden fixed inset-0 z-40">
            <div class="congratulation">
               <div>
                    <div class="title"> 🎉Ganador <span id="winerGame"></span>🎉 </div>
                    <div class="sub-title mt-5">
                        <a href="/" class=" focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-greb-300 font-medium rounded-lg text-sm px-5 py-2.5">
                            Regresar al inicio
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
