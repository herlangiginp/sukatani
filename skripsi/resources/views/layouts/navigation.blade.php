<nav x-data="{ open: false }" @click.away="open = false" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto row ">
        <div class="flex justify-between h-16 sticky-bar">
            <div class="flex col">
                <div class="shrink-0 flex items-center ">
                    @auth
                    <a href="{{ route('home') }}">
                    @else
                    <a href="{{ route('welcome') }}">
                    @endauth
                   
                        <x-application-logotext class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>
            <div class="main-menu hidden flex items-center space-x-8 sm:-my-px sm:ml-10 sm:flex col-10  justify-content-center">
                <ul class="space-x-8 sm:-my-px sm:ml-8 sm:flex items-center  ">
                    <li>
                        @auth
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('Beranda') }}
                        </x-nav-link>
                        @else
                        <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                            {{ __('Beranda') }}
                        </x-nav-link>
                        @endauth
                        
                    </li>
                    <li>
                        <a class="nav-link dropdown-toggle" href="#" role="button" x-on:click="open = !open" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="sub-menu" x-show="open" x-cloak>
                            @if (isset($categories))
                            @foreach ($categories as $category)
                            <li>
                                <x-dropdown-link href="{{ route('product.category', ['slug' => $category->slug]) }}">
                                    {{ $category->name }}
                                </x-dropdown-link>
                            </li>
                            @endforeach
                        @else
                            <p>Tidak ada kategori produk</p>
                        @endif
                        </ul>
                    </li>
                  
                    <li>
                        <x-nav-link :href="route('shop')" :active="request()->routeIs('shop')">
                            {{ __('Belanja') }}
                        </x-nav-link>
                    </li>
                    <li>
                       @livewire('header-search-component')
                    </li>

            @Auth
        
                    <li >
                        <div class=" header-action-2">
                           @livewire('cart-icon-component')
                          
                        </div>
                    </li>
                    @else
              
                    @endauth


                    @auth
                    @if(Auth::user()->role == 'user')
                    <li>
                        <x-nav-link :href="route('user.product.add')" :active="request()->routeIs('user.product.add')">
                            {{ __('Jual') }}
                        </x-nav-link>
                    </li>
                    @endif
                @endauth
        </li>
    </ul>
</div>
</div>

            @auth
       
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center p-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="mt-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        

                        @auth
                            @if(Auth::user()->role == 'admin')
                        
                            <x-dropdown-link :href="route('admin.categories')">
                                {{ __('Edit kategori barang') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('admin.product')">
                                {{ __('Produk') }}
                            </x-dropdown-link>


                            @else
                            <x-dropdown-link :href="route('user.product')">
                                {{ __('Produk') }}
                            </x-dropdown-link>
                            @endif
                        @endif



                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>



            @else

            <div class="hidden sm:flex sm:items-center sm:ml-6 main-menu ">
                <ul class="space-x-8 sm:-my-px sm:ml-10 sm:flex items-center  ">
                    <li><a  href="{{route ('register') }}">Buat Akun</a></li>
                    <li><a class="btn btn-success text-light"   href="{{route ('login') }}">Masuk</a></li>
            </div>



            @endauth


     <!-- mobile -->

<div class="-mr-2 flex items-center sm:hidden">     
    <div class="header-action-right d-block d-lg-none container">
        <div class=" header-action-2">
    @auth

    <div class=" header-action-2">
        @livewire('cart-icon-component')
       
     </div>
        


    @endauth


    <div class="-mr-2 flex items-center sm:hidden">
        <div class="header-action-icon-2 d-block d-lg-none items-center ">
            <div class="burger-icon burger-icon-white items-center">
                <span class="burger-icon-top"></span>
                <span class="burger-icon-mid"></span>
                <span class="burger-icon-bottom"></span>
            </div>
        </div>
    </div>
</div>

            <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                @auth
                <a href="{{ route('home') }}">
                @else
                <a href="{{ route('welcome') }}">
                @endauth
                    <x-application-logotext class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>


        <div class="mobile-header-content-area ">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…">
                    <button type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border ">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu ">
                        @auth
                        <li class="menu-item-has-children"><x-responsive-nav-link :href="route('home')">
                            {{ __('Beranda') }}
                        </x-responsive-nav-link>
                        </li>
                        @else
                      
                        <li class="menu-item-has-children"><x-responsive-nav-link :href="route('welcome')">
                            {{ __('Beranda') }}
                        </x-responsive-nav-link>
                        </li>
                        @endauth
                        <li class="menu-item-has-children">
                            <span class="menu-expand"></span>
                            <a href="#">Kategori</a>
                            <ul class="dropdown" x-show="open" x-cloak>
                                @if (isset($categories) && count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <li>
                                            <x-responsive-nav-link href="{{ route('product.category', ['slug' => $category->slug]) }}">
                                                {{ $category->name }}
                                            </x-responsive-nav-link>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <a href="#">Tidak ada kategori produk</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        
                        <li class="menu-item-has-children"><x-responsive-nav-link :href="route('shop')">
                            {{ __('Belanja') }}
                        </x-responsive-nav-link></li>

                        @auth
                        @if(Auth::user()->role == 'user')
                    
                        <li class="menu-item-has-children"><x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Jual') }}
                        </x-responsive-nav-link></li>
                            @else
                              
                                @endif
                            @endif
             
                       
                     </ul>
                </nav>
                <!-- mobile menu end -->
            </div>

 
                   
                               
  

        
        <!-- Responsive Settings Options -->
        <div class="pb-1 border-t border-gray-200 dark:border-gray-600 ">
            @Auth

            
                <div class="px-3 pt-3 ">
                    <div class=" text-gray-800 dark:text-gray-200 fw-bold">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
    
                <div class="mt-3 space-y-1 ">
                    <ul class="mobile-menu ">
                        <li>
                            <x-responsive-nav-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>
                        </li>
    
                    </ul>
                   
                   
    
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            
            @else
          

            <div class="mt-3 space-y-1 ">
                <ul class="mobile-menu ">
                    <li>
                        <x-responsive-nav-link :href="route('login')">
                            {{ __('login') }}
                        </x-responsive-nav-link>
                    </li>
                    <li>
                        <x-responsive-nav-link :href="route('register')">
                            {{ __('register') }}
                        </x-responsive-nav-link>
                    </li>

                </ul>

            @endauth

        </div>
    </div>
</nav>
