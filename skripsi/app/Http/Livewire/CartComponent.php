<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Product;

class CartComponent extends Component
{

    public function increaseQuantity($rowId) {
        $cartItem = Cart::get($rowId);
        $product = Product::find($cartItem->id);

        if ($product && $cartItem->qty < $product->jumlah_barang) {
            $qty = $cartItem->qty + 1;
            Cart::update($rowId, $qty);
            $this->emitTo('cart-icon-component', 'refreshComponent');
        }
    }

    public function decreaseQuantity($rowId) {
        $cartItem = Cart::get($rowId);
        if ($cartItem->qty > 1) {
            $qty = $cartItem->qty - 1;
            Cart::update($rowId, $qty);
            $this->emitTo('cart-icon-component', 'refreshComponent');
        }
    }

    public function updateQuantity($rowId, $newQuantity) {
        $cartItem = Cart::get($rowId);
        $product = Product::find($cartItem->id);
    
        if ($product && $newQuantity >= 1 && $newQuantity <= $product->total_barang) {
            Cart::update($rowId, $newQuantity);
            $this->emitTo('cart-icon-component', 'refreshComponent');
        }
    }
    

    public function destroy($rowId){
        Cart::remove($rowId);
        $this->emitTo('cart-icon-component', 'refreshComponent');
        session()->flash('success_message', 'Barang telah dihapus!');
    }

    public function clearAll(){
        Cart::destroy();
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}