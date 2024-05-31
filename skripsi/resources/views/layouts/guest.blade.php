<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


               
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet" />

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />


        
        <title>{{ $title ?? config('app.name', 'Laravel') }} - {{config('app.name') }}</title>


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])



        <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/Logo.png')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        
        @stack('style')
        @livewireStyles

    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                @auth
                <a href="{{route('home')}}">
                @else
                <a href="{{route('welcome')}}">
                @endauth
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
    
  

<script src="{{ asset('js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{ asset('js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{ asset('js/plugins/slick.js')}}"></script>
<script src="{{ asset('js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{ asset('js/plugins/wow.js')}}"></script>
<script src="{{ asset('js/plugins/jquery-ui.js')}}"></script>
<script src="{{ asset('js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('js/plugins/magnific-popup.js')}}"></script>
<script src="{{ asset('js/plugins/select2.min.js')}}"></script>
<script src="{{ asset('js/plugins/waypoints.js')}}"></script>
<script src="{{ asset('js/plugins/counterup.js')}}"></script>
<script src="{{ asset('js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{ asset('js/plugins/images-loaded.js')}}"></script>
<script src="{{ asset('js/plugins/isotope.js')}}"></script>
<script src="{{ asset('js/plugins/scrollup.js')}}"></script>
<script src="{{ asset('js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{ asset('js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{ asset('js/plugins/jquery.elevatezoom.js')}}"></script>


<script src="{{ asset('js/main.js?v=3.3')}}"></script>
<script src="{{ asset('js/shop.js?v=3.3')}}"></script>







@livewireScripts
    </body>

    </html>
