<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads; 
use App\Models\Product;
use App\Models\Category;

class UserEditProductComponent extends Component

{
    use WithFileUploads;

    public $product_id;
    public $name;
    public $slug;
    public $deskripsi_pendek;
    public $deskripsi;
    public $harga_normal;
    public $harga_diskon;
    public $sku;
    public $status_barang = 'ada';
    public $alamattoko;
    public $berat_barang;
    public $jumlah_barang;
    public $image;
    public $category_id;
    public $newimage;

    public function mount($product_id)
    {
        $product = Product::find($product_id);
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->deskripsi_pendek = $product->deskripsi_pendek;
        $this->deskripsi = $product->deskripsi;
        $this->harga_normal = $product->harga_normal;
        $this->harga_diskon = $product->harga_diskon;
        $this->sku = $product->sku;
        $this->status_barang = $product->status_barang;
        $this->alamattoko = $product->alamattoko;
        $this->berat_barang = $product->berat_barang;
        $this->jumlah_barang = $product->jumlah_barang;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
    }
    

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function updateProduct()
{
    $this->validate([
        'name' => 'required',
        'slug' => 'required',
        'deskripsi_pendek' => 'required',
        'deskripsi' => 'required',
        'harga_normal' => 'required',
        'harga_diskon' => 'required',
        'sku' => 'required',
        'status_barang' => 'required',
        'alamattoko' => 'required',
        'berat_barang' => 'required',
        'jumlah_barang' => 'required',
        'category_id' => 'required',
        'newimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = Product::find($this->product_id);
    $product->name = $this->name;
    $product->slug = $this->slug;
    $product->deskripsi_pendek = $this->deskripsi_pendek;
    $product->deskripsi = $this->deskripsi;
    $product->harga_normal = $this->harga_normal;
    $product->harga_diskon = $this->harga_diskon;
    $product->sku = $this->sku;
    $product->status_barang = $this->status_barang;
    $product->alamattoko = $this->alamattoko;
    $product->berat_barang = $this->berat_barang;
    $product->jumlah_barang = $this->jumlah_barang;

    if ($this->newimage) {
        unlink('img/produk/'.$product->image);
        $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
        $this->newimage->storeAs('produk', $imageName);
        $product->image = $imageName;
    }

    $product->category_id = $this->category_id;
    $product->save();
    session()->flash('message', 'Anda telah berhasil mengubah produk!');
}

public function render()
{
$categories = Category::orderBy('name', 'ASC')->get();
return view('livewire.user.user-edit-product-component', ['categories'=>$categories]);

}

}
