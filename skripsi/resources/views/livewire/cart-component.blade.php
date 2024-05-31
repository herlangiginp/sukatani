 <section class="mt-50 mb-50">
            <div class="container bg-white radius p-4">
                <div class="row">
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
                                        <th scope="col">Hapus</th>
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
                                                @if ($item->model)
                                                    <td class="image product-thumbnail">
                                                        <img src="{{asset('img/produk')}}/{{$item->model->image}}" alt="{{$item->model->name}}">
                                                    </td>
                                                    <td class="product-des product-name text-start">
                                                        <h5 class="product-name"><a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a></h5>
                                                    </td>
                                                    <td class="price" data-title="Price"><span>Rp. {{ $item->model->harga_normal }}</span></td>
                                                    <td class="text-center" data-title="Stock">
                                                        <div class="detail-qty border radius m-auto">
                                                            <a href="#" class="qty-down" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">
                                                                <i class="bi bi-chevron-down"></i>
                                                            </a>
                                                            <span class="qty-val text-dark">{{ $item->qty }}</span>
                                                            <a href="#" class="qty-up" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')">
                                                                <i class="bi bi-chevron-up"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="text-right" data-title="Cart">
                                                        <span>Rp.{{ $item->subtotal }}</span>
                                                    </td>
                                                    <td class="action" data-title="Remove">
                                                        <a href="#" class="text-muted">
                                                            <i class="bi bi-trash text-danger" wire:click.prevent="destroy('{{ $item->rowId }}')"></i>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td colspan="6">
                                                        <p>Invalid model for this cart item.</p>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach

                           
                                    
                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <a href="#" class="text-muted"  wire:click.prevent="clearAll()"> <i class="bi bi-trash text-danger"></i>Bersihkan Keranjang</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @else
                            <p>Tidak ada barang di keranjang</p>
                        @endif
                       
                        </div>
                        <div class="cart-action text-end">
                            <a href="{{route('shop')}} " class="btn btn-success btn-lg">Lanjutkan Belanja</a>
                        </div>
                        <div class="col-lg-6 col-md-12 ">
                            <div class="border p-md-4 p-30 border-radius cart-totals ">
                                <div class="heading_s1 mb-3">
                                    <h4>Keranjang total</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="cart_total_label">Subtotal</td>
                                                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">Rp. {{Cart::subtotal()}} </span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Pajak 3%</td>
                                                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">Rp. {{Cart::tax()}} </span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Pengiriman</td>
                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i>Ambil barang sendiri (COD)</td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Total</td>
                                                <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">Rp. {{Cart::total()}} </span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{route('checkout')}} " class="btn btn-success" >Lanjutkan pembelian</a>
                            </div>
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