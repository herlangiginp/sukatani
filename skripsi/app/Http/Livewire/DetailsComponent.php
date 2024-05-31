<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $quantity = 1; // Tambahkan variabel quantity

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $harga_normal)
    {
        Cart::add($product_id, $product_name, $this->quantity, $harga_normal)->associate('App\Models\Product');
        session()->flash('success_message', 'Berhasil memasukkan barang ke dalam keranjang');
        return redirect()->route('shop.cart');
    }
    


    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function increaseQuantity()
{
    $product = Product::where('slug', $this->slug)->first(); // Fetch the product
    if ($product && $this->quantity < $product->jumlah_barang) {
        $this->quantity++;
    }
}


    public function render()
    {
        $product = Product::where('slug', $this->slug)->with('user')->first();
        
        if ($product) {
            $rproducts = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
    
            // Get the product images
            $productImages = [];
            if ($product->images) {
                foreach ($product->images as $image) {
                    $productImages[] = $image->filename; // Pastikan "filename" sesuai dengan properti yang benar
                }
            }
    
            return view('livewire.details-component', [
                'product' => $product,
                'rproducts' => $rproducts,
                'productImages' => $productImages,
            ]);
        } else {
            // Handle case where product is not found, for example redirect to a 404 page
            abort(404);
        }
    }
}