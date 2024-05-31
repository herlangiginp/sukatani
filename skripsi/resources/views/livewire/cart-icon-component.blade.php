<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{ route('shop.cart') }}">
        <i class="bi bi-bag blk"></i>
        @if (Cart::count() > 0)
            <span class="pro-count blue">{{ Cart::count() }}</span>
        @endif
    </a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @foreach (Cart::content() as $item)
                @if ($item->model)
                    <li>
                        <div class="shopping-cart-img">
                            <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                <img alt="{{ $item->model->name }}" src="{{ asset('img/product-' . $item->model->id . '-1.png') }}">
                            </a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ substr($item->model->name, 0, 20) }}</a></h4>
                            <h4><span>{{ $item->qty }} × </span>Rp. {{ $item->model->harga_normal }}</h4>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total <span>{{ Cart::total() }}</span></h4>
            </div>
            <div class="shopping-cart-button">
                <a href="{{ route('shop.cart') }}">Lihat keranjang</a>
                <a href="checkout.html" class="outline">Beli</a>
            </div>
        </div>
    </div>
</div>
