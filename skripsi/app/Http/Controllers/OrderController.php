<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        $snapToken = $order->snap_token;
    
        if (is_null($snapToken)) {
            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();
    
            $order->snap_token = $snapToken;
            $order->save();
        }
    
        return view('orders.show', compact('order'));
    }
    
}
