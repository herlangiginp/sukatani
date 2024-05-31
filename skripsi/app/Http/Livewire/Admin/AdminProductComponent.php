<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class AdminProductComponent extends Component
{
    use WithPagination;

    public $product_id;
    public $refreshComponent = false;

    public function deleteProduct()
    {
        $product = Product::find($this->product_id); 
        unlink('img/produk/'. $product->image);
        $product->delete();
        session()->flash('message', 'Produk terkait telah berhasil dihapus!');
    
        $this->emit('productDeleted');
    
        $this->refreshComponent = true;
    }
    

    public function render()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.admin-product-component', ['products' => $products]);
    }
}

