<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads; 
use App\Models\Product;
use App\Models\Category;

class AdminAddProductComponent extends Component

{
    use WithFileUploads;


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

    
    
    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function addProduct()
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
            'image' => 'required',
            'category_id' => 'required'
        ]);
    $product = new Product ();
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
    $imageName = Carbon:: now()->timestamp.'.'.$this->image->extension();
    $this->image->storeAs ('produk', $imageName);
    $product->image = $imageName;
    $product->category_id = $this->category_id;
    $product->save();
    session ()->flash('message', 'Produk berhasil ditambahkan!');
    }


    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.admin.admin-add-product-component', ['categories' => $categories]);
    }
    
}
