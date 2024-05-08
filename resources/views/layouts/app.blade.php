<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <?php
            $version = '1993.1.0';
        ?>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <!-- vite(['resources/css/app.css', 'resources/js/app.js']) -->
        
        <link href="{{asset('css/app.css')}}?v=<?php echo $version ?>" rel="stylesheet">

        
        

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link rel="stylesheet" href="{{asset('assets/css/line-awesome.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{asset('lib/animate/animate.min.css')}}?v=<?php echo $version ?>" rel="stylesheet">
        <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}?v=<?php echo $version ?>" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <!-- <link href="{{asset('css/bootstrap.min.css')}}?v=<?php echo $version ?>" rel="stylesheet"> -->

        <!-- Template Stylesheet -->
        <link href="{{asset('css/style.css')}}?v=<?php echo $version ?>" rel="stylesheet">

        

        <link href="{{asset('css/style1.css')}}?v=<?php echo $version ?>" rel="stylesheet">
        <link href="{{asset('css/jquery-ui.css')}}?v=<?php echo $version ?>" rel="stylesheet">
        <link href="{{asset('css/line-awesome.css')}}?v=<?php echo $version ?>" rel="stylesheet">
        <link href="{{asset('css/nice-select.css')}}?v=<?php echo $version ?>" rel="stylesheet">
        <link href="{{asset('css/responsive.css')}}?v=<?php echo $version ?>" rel="stylesheet">

        
        @stack('css')

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased img-fondo">
        <x-banner />

        <div class="">
           

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <!-- <script src="{{asset('js/app.js')}}?v=<?php echo $version ?>"></script> -->
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('lib/easing/easing.min.js')}}?v=<?php echo $version ?>"></script>
        <script src="{{asset('lib/waypoints/waypoints.min.js')}}?v=<?php echo $version ?>"></script>
        <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}?v=<?php echo $version ?>"></script>

        <!-- Template Javascript -->
        <script src="{{asset('js/main.js')}}?v=<?php echo $version ?>"></script>

        <!-- <script src="{{asset('js/bootstrap.bundle.min.js')}}?v=<?php echo $version ?>"></script> -->
        <script src="{{asset('js/jquery-3.5.1.min.js')}}?v=<?php echo $version ?>"></script>
        <script src="{{asset('js/jquery-ui.min.js')}}?v=<?php echo $version ?>"></script>
        <script src="{{asset('js/slick.min.js')}}?v=<?php echo $version ?>"></script>
        <script src="{{asset('js/jquery.nice-select.min.js')}}?v=<?php echo $version ?>"></script>
        <script src="{{asset('js/app1.js')}}?v=<?php echo $version ?>"></script>

        <script src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>
        
    </body>
</html>
