<div title="belanja"> 
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('img/Group 211 (1).jpg')}}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">Bumi mu, bumi ku, cari kebutuhan mu bersama ku</h1>
                                    <a href="" class="btn btn-success py-sm-3 px-sm-4">Cari Kebutuhan mu!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('img/b hitam-1-1.png')}}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">Beras Hitam</h1>
                                    <a href="" class="btn btn-success py-sm-3 px-sm-4">Cari Kebutuhan mu!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                  <img class="w-100" src="{{asset('img/b merah-2.png')}}" alt="Image">
                  <div class="carousel-caption">
                      <div class="container">
                          <div class="row justify-content-center">
                              <div class="col-lg-7">
                                  <h1 class="display-1 text-white mb-5 animated slideInDown">Beras Merah</h1>
                                  <a href="" class="btn btn-success py-sm-3 px-sm-4">Cari Kebutuhan mu!</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="carousel-item">
                <img class="w-100" src="{{asset('img/b putih-1.png')}}" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <h1 class="display-1 text-white mb-5 animated slideInDown">Beras Putih</h1>
                                <a href="" class="btn btn-success py-sm-3 px-sm-4">Cari Kebutuhan mu!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
              <img class="w-100" src="{{asset('img/b ketan-1-2.png')}}" alt="Image">
              <div class="carousel-caption">
                  <div class="container">
                      <div class="row justify-content-center">
                          <div class="col-lg-7">
                              <h1 class="display-1 text-white mb-5 animated slideInDown">Beras Ketan</h1>
                              <a href="" class="btn btn-success py-sm-3 px-sm-4">Cari Kebutuhan mu!</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
      </div>
      <!-- Carousel End -->
      
      
      <!-- Product Start -->
      
      <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Untuk Kamu</h1>
                        <p>Ini adalah pilihan produk untuk kamu, cek sekarang!</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" >
                    
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                       
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-success border-2 {{ $orderBy=='Harga: Rendah ke Tinggi' ? 'active': ''}}" href="#" wire:click.prevent="ChangeOrder('Harga: Rendah ke Tinggi')">Harga: Rendah ke Tinggi</a>
                        </li>
                        <li class="nav-item me-0">
                            <a class="btn btn-outline-success border-2 {{ $orderBy=='Harga: Tinggi ke Rendah' ? 'active': ''}}" href="#" wire:click.prevent="ChangeOrder('Harga: Tinggi ke Rendah')">Harga: Tinggi ke Rendah </a>
                        </li>
                    </ul>
                </div>
            </div>
          
      
      
     
      
                <!--  -->
                <div class="tab-content">
                        <div class="row g-4">
                          <!--  -->
                          @foreach ($products as $product)
                            
                     
                          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
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
                                        <h2><a href="product-details.html">{{$product->name}}</a></h2>
                                      <div class="product-price">
                                        <span>Rp. {{$product->harga_normal}} </span> <span class="old-price">Rp. </span>
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
                    
                    
                    
                    
                   
                  
                        <div class="col-12 text-center">
                            <a class="btn btn-success rounded-pill py-3 px-5" href="{{route('shop')}}">Cari Lebih Banyak Produk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

