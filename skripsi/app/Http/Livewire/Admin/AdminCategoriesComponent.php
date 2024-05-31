<?php


namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Component;

class AdminCategoriesComponent extends Component
{
    use WithPagination;

    public $category_id;
    public $refreshComponent = false;

    public function deleteCategory()
    {
        // Find the category and related products
        $category = Category::find($this->category_id);
        $relatedProducts = Product::where('category_id', $this->category_id)->get();

        // Delete the related products first
        foreach ($relatedProducts as $product) {
            $product->delete();
        }

        // Now delete the category
        $category->delete();

        // Set a success message
        session()->flash('message', 'Kategori dan produk terkait telah berhasil dihapus!');

        // Emit the event after deletion
        $this->emit('categoryDeleted');

        // Set the flag to true to refresh the component
        $this->refreshComponent = true;
    }
    
    public function render()
    {
        // Load categories data from the database after deletion
        $categories = Category::orderBy('name', 'ASC')->paginate(5);

        return view('livewire.admin.admin-categories-component', ['categories' => $categories]);
    }
}