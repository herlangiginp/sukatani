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
                    <table class="table shopping-summery text-center clean">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Metode pengiriman (ambil sendiri)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Session::has('success_message'))
                                <div class="alert alert-success">
                                    <strong>{{ Session::get('success_message') }}</strong>
                                </div>
                            @endif
                            @if (Cart::count() > 0)
                                @foreach (Cart::content() as $item)
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <img src="{{asset('img/produk')}}/{{$item->model->image}}" alt="{{$item->model->name}}">
                                             
                                        </td>
                                        <td class="product-des product-name text-start">
                                            <h5 class="product-name"><a
                                                    href="product-details.html">{{ $item->model->name }}</a></h5>
                                        </td>
                                        <td class="price" data-title="Price"><span>Rp.
                                                {{ $item->model->harga_normal }}</span></td>
                                        <td>
                                            <span class="qty-val text-dark">{{ $item->qty }}</span>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span>Rp.{{ $item->subtotal }}</span>
                                        </td>
                                        <td>
                                            <address>{{ $item->model->alamattoko }}</address>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12 col-md-12 d-flex justify-content-end">
                    <!-- Keranjang Total dengan Justify Content -->
                    <div class="border p-md-4 p-30 border-radius cart-totals">
                        <div class="heading_s1 mb-3">
                            <h4>Keranjang total</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">Subtotal</td>
                                        <td class="cart_total_amount"><span
                                                class="font-lg fw-900 text-brand">Rp. {{ Cart::subtotal() }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Pajak 3%</td>
                                        <td class="cart_total_amount"><span
                                                class="font-lg fw-900 text-brand">Rp. {{ Cart::tax() }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Pengiriman</td>
                                        <td class="cart_total_amount"> <i class="ti-gift mr-5"></i>Ambil barang
                                            sendiri (COD)</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Total</td>
                                        <td class="cart_total_amount"><strong><span
                                                    class="font-xl fw-900 text-brand">Rp. {{ Cart::total() }}</span></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <tr>
                            <td>
                                <button wire:click.prevent="checkout" class="btn btn-success">
                                    Buat pesanan
                                </button>
                            </td>
                        </tr>
                              
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

        snap.pay('{{ $snapToken }}', {
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

