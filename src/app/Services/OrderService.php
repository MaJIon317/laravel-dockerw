<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;

class OrderService {
    protected $session;

    /**
     * Constructs a new wishlist object.
     *
     * @param Illuminate\Session\SessionManager $session
     */
    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }
     
    /**
     * Adding a new order.
     *
     * @param Collection $collection
     * @return collect
     */
    public function create(Collection $collection)
    {
        $order = Order::create([
            'user_id' => $collection->get('user_id'),
            'status' => $collection->get('status', 'new'),
            'payment' => $collection->get('payment', 'define'),
            'delivery' => $collection->get('delivery', 'define'),
            'total' => $collection->get('totals')->get('total')->price ?? 0,

            'inn' => $collection->get('inn'),
            'name' => $collection->get('name'),
            'phone' => $collection->get('phone'),
            'email' => $collection->get('email'),
            'city' => $collection->get('city'),
            'address' => $collection->get('address'),
            'comment' => $collection->get('comment'),
        ]);
 
        $order->history()->create([
            'order_id' => $order->id,
            'status' => $order->status
        ]);

        if ($collection->get('carts')) {
            foreach ($collection->get('carts') as $cart) {
                $order->products()->create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->price,
                    'total' => (float)$cart->product->price * (float)$cart->quantity,
                ]);
            }
        }

        if ($collection->get('totals')) {
            foreach ($collection->get('totals') as $code => $total) {
                $order->totals()->create([
                    'order_id' => $order->id,
                    'code' => $code,
                    'value' => $total->price
                ]);

                // Записываем купон в историю
                if ($code == 'coupon' && isset($total->coupon_id)) {
                    $order->coupon()->create([
                        'order_id' => $order->id,
                        'coupon_id' => $total->coupon_id,
                        'value' => $total->price
                    ]);
                }
            }
        }

        return $order;
    }
}