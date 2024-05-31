<div title="Detail Produk">
    <div class="d-flex flex-row mb-3">
        <div class="col-8 pb-5 pt-4 ps-2 col-8 col-lg-8 col-md-7 col-sm-7 col-xs-7">
            <section class="bg-light pe-4">
                <div class="row">
                    <div class="card">
                        <div class="product-detail accordion-detail">  
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="bi bi-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="{{asset('img/produk')}}/{{ $product->image}}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('img/produk')}}/{{ $product->image}}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('img/produk')}}/{{ $product->image}}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('img/produk')}}/{{ $product->image}}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('img/produk')}}/{{ $product->image}}" alt="product image">
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{asset('img/produk')}}/{{ $product->image}}" alt="product image">
                                    </figure>
                                    <!-- Add more images here as needed -->
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails  pl-15 pr-15">
                                    <div><img src="{{asset('img/produk')}}/{{ $product->image}}" alt="product image"></div>
                                    <div><img src="{{asset('img/produk')}}/{{ $product->image}}" alt="product image"></div>
                                    <div><img src="{{asset('img/produk')}}/{{ $product->image}}" alt="product image"></div>
                                    <div><img src="{{asset('img/produk')}}/{{ $product->image}}" alt="product image"></div>
                                    <div><img src="{{asset('img/produk')}}/{{ $product->image}}" alt="product image"></div>
                                    <div><img src="{{asset('img/produk')}}/{{ $product->image}}" alt="product image"></div>
                                    <!-- Add more thumbnail images here as needed -->
                                </div>
                            </div>
                        </div>                                
                    </div>
                </div>
            </section>

            <div class="position-sticky" style="top: 2rem;">
                <div class="pt-4 p-2 mb-3 bg-light rounded">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="py-3 fw-bold"> Description:</h6>
                                    <p>{{$product->deskripsi}}</p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
        

                <div class="col-4 col-lg-4 col-md-5 col-sm-5 col-xs-5">
                    <div class="position-sticky" style="top: 6rem;">
                        <div class="mb-3 bg-light rounded">
                            <div class="position-sticky" style="top: 6rem;">
                                <div class="mb-3 bg-light rounded">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1 class="fw-bolder h1">{{ $product->name }}</h1>
                                            
                                            <div class="text">
                                                <i class="text-muted h5 text-decoration-line-through">Rp. {{ $product->harga_diskon }}</i>
                                                <span class="text-dark h2">Rp. {{ $product->harga_normal }}</span>
                                            </div>
                                                    <ul class="text-des list-inline-item">
                                                        <li class="desc pt-1 pb-1  py-5">
                                                            <div>
                                                                <span>Toko:</span>
                                                                @if ($product->user)
                                                                    <span href="">{{ $product->user->name }}</span>
                                                                @else
                                                                    <span>Tidak ada informasi toko</span>
                                                                @endif
                                                            </div>
                                                            
                                                            <div>
                                                                <span>Kategori : </span>
                                                                <a href="{{route('product.category', ['slug'=>$product->slug])}}">{{$product->category->name}}</a>
                                                            </div>
                                                            <div>
                                                                <span>Lokasi Ambil Barang :  <address class="fw-bolder" >{{$product->alamattoko}} </address></span>
                                                            </div>
                                                            <div>
                                                                <span>Berat satuan/barang :</span>
                                                                <span>{{$product->berat_barang}} kg </span>
                                                            </div>
                                                    
                                                                <form action="" method="GET">
                                                                <input type="hidden" name="product-title" value="detail">
                                                                    <div class="row">
                                                                        {{-- <div class="attr-detail desc">
                                                                            <ul class="list-filter jenis-filter ">
                                                                                <li class="list-inline-item">
                                                                                    <span>Jenis :</span>
                                                                                    <li><a href="#">Pandan Wangi</a></li>
                                                                                            <li class="active"><a href="#">Benthik Susu</a></li>
                                                                                            <li><a href="#">Rojolele</a></li>
                                                                                            <li><a href="#">IR 64</a></li>
                                                                                    <li>
                                                                                <li>  
                                                                            </ul>    
                                                                        </div> --}}
                                                                    </div>                  
                                                                    <li class="desc">
                                                                        <span>Jumlah :</span>
                                                                        <div class="list-inline-item input-group">
                                                                            <button type="button" value="-" class="minus border bi bi-dash mt-1 success" data-field="quantity" wire:click.prevent="decreaseQuantity"></button>
                                                                            <input type="number" step="1" max="10" wire:model="quantity" class="quantity-field border-0 text-center w-20">
                                                                            <button type="button" value="+" class="plus border bi bi-plus ms-1 mt-1 success" data-field="quantity" wire:click.prevent="increaseQuantity"></button>
                                                                        </div>
                                                                    </li>
                                                                </ul>

                                                                @auth 
                                                               
                                                            
                                                                <div class="product-extra-link2 flex-grow-0">
                                                                    <button type="submit" class="btn btn-lg" name="submit" value="beli">Beli</button>
                                                                    <button type="submit" class="btn btn-lg" name="submit" value="keranjang" wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->harga_normal }})">Keranjang</button>
                                                                </div>
                                                                    @else
                                                                    <div class="flex-grow-0 ">
                                                                        
                                                                        <a class="btn btn-success text-light btn-lg "  href="{{route('login')}}" >Masuk</a>
                                                                    </div>
                                                                   
                                                             
                                                                @endauth
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


    <!-- dd -->
    <div class="py-5 px-5">
        <div class="row align-items-end">
            <div class="col-lg-6 ">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Untuk Kamu</h1>
                    <p>Ini adalah pilihan produk untuk kamu, cek sekarang!</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <a class="btn btn-outline-success border-2" href="{{route('shop')}} ">Cari Lebih banyak</a>
                </ul>
            </div>
        </div>
        <!--  -->
        <div class="tab-content">
            <div class="row g-4 related-product">
              <!--  -->
@foreach ($rproducts as $rproduct)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                          <div class="product-cart-wrap mb-30">
                              <div class="product-img-action-wrap">
                                  <div class="product-img product-img-zoom">
                                      <a href="{{route('product.details', ['slug'=>$rproduct->slug])}}">
                                          <img class="default-img" src="{{asset('img/produk')}}/{{ $rproduct->image}}" alt="{{$rproduct->name}}">
                                          <img class="hover-img" src="{{ asset('assets/img/product-' . $product->id . '-2.jpg') }}" alt="">
                                      </a>
                                    </div>
                                   
                                </div>
                              <div class="product-content-wrap">
                                    <div class="product-category">
                                       <a href="{{route('product.category', ['slug'=>$rproduct->slug])}}">{{$rproduct->category->name}}</a>
                                    </div>
                                      <h2><a href="{{route('product.details', ['slug'=>$rproduct->slug])}}">{{$rproduct->name}}</a></h2>
                                    <div class="product-price">
                                      <span>Rp. {{$rproduct->harga_normal}} </span> <span class="old-price">Rp. {{$rproduct->harga_diskon}}</span>
                                    </div>
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
               
                    @endforeach
                
            
 </div>
</div>
</div>
<!-- footer -->




                         
