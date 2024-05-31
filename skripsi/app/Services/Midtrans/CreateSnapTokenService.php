<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;
use App\Models\Order;
use App\Models\OrderItem;



class CreateSnapTokenService extends Midtrans
{
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

	public function getSnapToken()
	{
		// Load the order items relationship
		$this->order->load('orderItems');
	
		$itemDetails = [];
	
		foreach ($this->order->orderItems as $orderItem) {
			$itemDetails[] = [
				'id' => $orderItem->product_id,
				'price' => $orderItem->price,
				'quantity' => $orderItem->quantity,
				'name' => $orderItem->product->name,
			];
		}
	

        $params = [
			'transaction_details' => [
				'order_id' => $this->order->number,
				'gross_amount' => $this->order->total_price,
			],
			
            'item_details' => $itemDetails,
            'customer_details' => [
                'first_name' => 'Martin Mulyo Syahidin',
                'email' => 'mulyosyahidin95@gmail.com',
                'phone' => '081234567890',
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
