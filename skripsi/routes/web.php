<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NavController;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\WelcomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\admin\AdminCategoriesComponent;
use App\Http\Livewire\admin\AdminAddCategoryComponent;
use App\Http\Livewire\admin\AdminEditCategoryComponent;
use App\Http\Livewire\admin\AdminProductComponent;
use App\Http\Livewire\admin\AdminADDProductComponent;
use App\Http\Livewire\admin\AdminEditProductComponent;
use App\Http\Livewire\user\UserProductComponent;
use App\Http\Livewire\user\UserADDProductComponent;
use App\Http\Livewire\user\UserEditProductComponent;
use App\Http\Controllers\OrderController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', HomeComponent::class)->name(name:'home');
// Route::get('/homepenjual', HomeComponent::class)->name(name:'homepenjual');
// Route::get('/homepembeli', HomeComponent::class)->name(name:'homepembeli');

// Route::get('/detail', HomeComponent::class)->name(name:'detail');
// Route::get('/keranjang', HomeComponent::class)->name(name:'keranjang');
// Route::get('/periksa', HomeComponent::class)->name(name:'periksa');



// // admin
// Route::prefix('admin')->group(function() {
// Route::get('/login',[AdminController::class, 'Index'])->name('login_from');
// Route::get('/login/owner', [AdminController::class, 'Login',])->name('admin.login');
// Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');

// });

use App\Http\Livewire\CheckoutComponent;



Route::get('/', WelcomeComponent::class)->name('welcome');

Route::get('/belanja', ShopComponent::class)->name('shop');

Route::get('/produk/{slug}',DetailsComponent::class)->name('product.details');

Route::get('/product-category/{slug}',CategoryComponent::class)->name('product.category');

Route::get('/selamat-datang', WelcomeComponent::class)->name('welcome');

Route::get('/search', SearchComponent::class)->name('product.search');


    


Route::middleware('auth')->group(function () {
    Route::get('/home', HomeComponent::class)->name('home');
    Route::get('/keranjang',CartComponent::class)->name('shop.cart');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/checkout', CheckoutComponent::class)->name('checkout');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

  
});

Route::middleware(['auth', 'authuser'])->group(function () {
    Route::get('user/produk', UserProductComponent::class)->name('user.product');
    Route::get('user/produk/add', UserADDProductComponent::class)->name('user.product.add');
    Route::get('user/produk/edit/{product_id}', UserEditProductComponent::class)->name('user.product.edit');
});


Route::middleware(['auth', 'authadmin'])->group(function () {
  
    Route::get('/admin/categories', AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/add/categories', AdminAddCategoryComponent::class)->name('admin.categories.add');
    Route::get('/admin/category/edit/{category_id}', AdminEditCategoryComponent::class)->name('admin.categories.edit');
    Route::get ('admin/produk', AdminProductComponent::class)->name('admin.product');
    Route::get ('admin/produk/add', AdminADDProductComponent::class)->name('admin.product.add');
    Route::get ('admin/produk//edit/{product_id}',AdminEditProductComponent::class)->name('admin.product.edit');
    
});






require __DIR__.'/auth.php';
