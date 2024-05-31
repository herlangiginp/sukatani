<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class UserProductComponent extends Component
{
    use WithPagination;

    public $product_id;
    public $refreshComponent = false;

    public function deleteProduct()
    {
        $product = Product::find($this->product_id);

        // Pastikan produk dimiliki oleh pengguna yang sedang login
        if ($product && $product->user_id == Auth::id()) {
            unlink('img/produk/'. $product->image);
            $product->delete();
            session()->flash('message', 'Produk terkait telah berhasil dihapus!');

            $this->emit('productDeleted');

            $this->refreshComponent = true;
        } else {
            // Tampilkan pesan jika pengguna tidak memiliki otorisasi untuk menghapus produk
            session()->flash('message', 'Anda tidak memiliki otorisasi untuk menghapus produk ini.');
        }
    }

    public function render()
    {
        $user_id = Auth::id();
        $products = Product::where('user_id', $user_id)
                           ->orderBy('created_at', 'DESC')
                           ->paginate(10);

        return view('livewire.user.user-product-component', ['products' => $products]);
    }
}
