<div title="belanja">


    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>Terdapat <strong class="text-brand">{{$products->total()}}</strong> barang untuk mu!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap bg-white radius">
                                    <div class="sort-by">
                                        <span>Tampilkan :</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span>{{$pageSize}} <i class="bi bi-arrow-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="{{ $pageSize==12 ? 'active': ''}}" href="#" wire:click.prevent="ChangepageSize(12)">12</a></li>
                                        <li><a class="{{ $pageSize==15 ? 'active': ''}}" href="#" wire:click.prevent="ChangepageSize(15)">15</a></li>
                                        <li><a class="{{ $pageSize==25 ? 'active': ''}}" href="#" wire:click.prevent="ChangepageSize(25)">25</a></li>
                                        <li><a class="{{ $pageSize==32 ? 'active': ''}}" href="#" wire:click.prevent="ChangepageSize(32)">32</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover ">
                                <div class="sort-by-product-wrap bg-white radius">
                                    <div class="sort-by">
                                        <span>Urutkan berdasarkan pada:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> {{$orderBy}} <i class="bi bi-arrow-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="{{ $orderBy=='Tampilan bawaan' ? 'active': ''}}" href="#" wire:click.prevent="ChangeOrder('Tampilan bawaan')">Tampilan bawaan</a></li>
                                        <li><a class="{{ $orderBy=='Harga: Rendah ke Tinggi' ? 'active': ''}}" wire:click.prevent="ChangeOrder('Harga: Rendah ke Tinggi')">Harga: Rendah ke Tinggi</a></li>
                                        <li><a class="{{ $orderBy=='Harga: Tinggi ke Rendah' ? 'active': ''}}" wire:click.prevent="ChangeOrder('Harga: Tinggi ke Rendah')">Harga: Tinggi ke Rendah</a></li>
                                        <li><a class="{{ $orderBy=='Barang terbaru' ? 'active': ''}}" wire:click.prevent="ChangeOrder('Barang terbaru')">Barang terbaru</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row product-grid-3">
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{route('product.details', ['slug'=>$product->slug])}}">
                                            <img class="default-img" src="{{asset('img/produk')}}/{{$product->image}}" alt="{{$product->name}} ">
                                            <img class="hover-img" src="{{ asset('assets/img/product-' . $product->id . '-2.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="{{route('product.category', ['slug'=>$product->slug])}}">{{$product->category->name}}</a>
                                    </div>
                                      <h2><a href="{{route('product.details', ['slug'=>$product->slug])}}">{{$product->name}}</a></h2>
                                    <div class="product-price">
                                      <span>Rp. {{$product->harga_normal}} </span> <span class="old-price">Rp. {{$product->harga_diskon}}</span>
                                    </div>

                                    @auth                     
                                    <div class="product-action-1 show">
                                        <button aria-label="Keranjang" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}}, '{{ $product->name }}', {{ $product->harga_normal }})"><i class="bi bi-bag-plus m-2"></i></button>
                                    </div>
                                        @else
                                        <button class="product-action-1 show">
                                            <a aria-label="Keranjang" class="action-btn hover-up p-1" href="{{route('login')}}" role="button"><i class="bi bi-bag-plus m-2"></i></a>
                                        </button>
                                    @endauth
                                    
                                </div> 
                            </div>
                        </div> 
                      @endforeach
                    </div>
                    <!--pagination-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        {{$products->links("pagination::bootstrap-5")}}
                        {{-- <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">16</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                            </ul>
                        </nav> --}}
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar ">
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
                    <div class="widget-category mb-30 bg-white radius">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                        <ul class="categories">
                            @foreach ($categories as $category)
                                 <li><a href="{{route('product.category', ['slug'=>$category->slug])}}">{{$category->name}}</a></li>
                            @endforeach
                          
                        </ul>
                    </div>
                    <!-- Fillter By Price -->
         
    </section>


</div>
