<?php
namespace App\Http\Livewire;


use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Cart;

class welcomeComponent extends Component
{
 
// Saya asumsikan Anda menggunakan model 'Product' dan telah mengimpornya di atas (use App\Models\Product;)


use WithPagination;

public $pageSize = 8;
public $product;
public $orderBy =" Tampilan bawaan";


public function store($product_id,$product_name,$product_price)
{
    Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
    session()->flash('success_message','Berhasil memasukan barang ke dalam keranjang');
    return redirect()->route('shop.cart');
}


public function ChangepageSize($size){
    $this->pageSize = $size;
}

public function ChangeOrder($order){
    $this->orderBy = $order;
}

  public function render()
    {
        if($this->orderBy == 'Harga: Rendah ke Tinggi'){
            $products = Product::orderBy('harga_normal','ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Harga: Tinggi ke Rendah'){
            $products = Product::orderBy('harga_normal','DESC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Barang terbaru'){
            $products = Product::orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Product::paginate($this->pageSize);
        }
        $categories = Category::orderBy('name', 'ASC')->get();
    return view('livewire.welcome-component', ['products' => $products, 'categories' => $categories]);
}
}

