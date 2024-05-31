<!doctype html>
<html lang="id">

<head>
    <title>Order #{{ $order->number }}</title>

       
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

<body>

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




            <section class="mt-50 mb-50">
                <div class="container bg-white radius p-4">
                    <div class="row">
                        <div class="col-md-8 col-lg-9 col-sm-6 mb-3">
                            <p>Periksa barang</p>
                        </div>
                        <div class="col-md-4 col-lg-3 col-sm-6 d-flex justify-content-end mb-3">
                            <a href="{{ route('shop.cart') }}" class="btn btn-success">Kembali ke menu keranjang</a>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                    <div class="container pb-5 pt-5">
                                        <div class="row">
                                            <div class="col-12 col-md-8">
                                                <div class="card shadow">
                                                    <div class="card-header">
                                                        <h5>Data Order</h5>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-condensed">
                                                            <tr>
                                                                <td>ID</td>
                                                                <td><b>#{{ $order->number }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Harga</td>
                                                                <td><b> Rp {{ number_format($order->subtotal, 2) }} </b></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Status Pembayaran</td>
                                                                <td><b>
                                                                        @if ($order->payment_status == 1)
                                                                            Menunggu Pembayaran
                                                                        @elseif ($order->payment_status == 2)
                                                                            Sudah Dibayar
                                                                        @else
                                                                            Kadaluarsa
                                                                        @endif
                                                                    </b></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal</td>
                                                                <td><b>{{ $order->created_at->format('d M Y H:i') }}</b></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="card shadow">
                                                    <div class="card-header">
                                                        <h5>Pembayaran</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        @if ($order->payment_status == 1)
                                                            <button class="btn btn-success" id="pay-button">Bayar Sekarang</button>
                                                        @else
                                                            Pembayaran berhasil
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </table>
                            </div>
            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </main>
            
            <footer>
                <section class="bg-success footers ">
                    <h2 class="text-center text-white">Sukatani patch 1</h2>
                </section>
            </footer>


    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
        e.preventDefault();

        const snapToken = "{{ request('snapToken') }}";

        snap.pay(snapToken, {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            }
        });
    });
</script>

        

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



</body>

</html>
