<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">




        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    

        
    
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet" />

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

 <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

        <title>{{ $title ?? config('app.name', 'Laravel') }} - {{config('app.name') }}</title>
    

<link rel="shortcut icon" type="image/x-icon" href="{{asset('img/Logo.png')}}">
<link rel="stylesheet" href="{{asset('css/main.css')}}">




        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('style')
        @stack('scripts')
    @livewireStyles
    
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
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


        

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous')}}"></script>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></script>
<!-- ... Other scripts ... -->
<!-- Vendor JS-->



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
