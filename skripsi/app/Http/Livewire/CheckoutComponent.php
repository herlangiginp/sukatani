<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use Cart;
use App\Services\Midtrans\CreateSnapTokenService;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $snapToken;

    public function checkout()
    {
        // Calculate subtotal, tax, and total based on cart content
        $subtotal = floatval(str_replace(',', '', Cart::subtotal())); // Convert and format subtotal to float
        $tax = floatval(Cart::tax());
        $taxFormatted = number_format($tax, 2, '.', '');
        $total = floatval(str_replace(',', '', Cart::total())); // Convert and format total to float

        // Create an order
        $order = new Order();
        $order->number = $this->generateOrderNumber(); // Use $this->generateOrderNumber() to call the function
        $order->subtotal = $subtotal;
        $order->tax = $taxFormatted; // Use the formatted tax value
        $order->total = $total;
        $order->payment_status = '1'; // Assuming '1' means 'menunggu pembayaran'
        $order->quantity = Cart::count(); // Total quantity of items in the cart
        $order->user_id = auth()->user()->id; // Assuming you have user authentication
        $order->save();

        // Create order items for each cart item
        foreach (Cart::content() as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
                'price' => floatval(str_replace(',', '', $item->subtotal)), // Convert and format price to float
            ]);
        }
        
        $midtrans = new CreateSnapTokenService($order);
        $snapToken = $midtrans->getSnapToken();

        // Update the order with the generated snap token
        $order->snap_token = $snapToken;
        $order->save();

        // Redirect to the orders.show route with the Snap token as a parameter
        return redirect()->route('orders.show', ['order' => $order->id, 'snapToken' => $snapToken]);
    }

    // Implement the generateOrderNumber function
    private function generateOrderNumber()
    {
        // Generate a unique order number based on your business logic
        // You can use a combination of date, user ID, and random numbers for uniqueness
        $user = auth()->user();
        $timestamp = now()->format('YmdHis');
        $randomNumber = mt_rand(1000, 9999);

        return "ORD{$user->id}-{$timestamp}-{$randomNumber}";
    }

    public function render()
    {
        return view('livewire.checkout-component');
    }
}
