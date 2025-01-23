<?php

namespace App\Services;

use App\Models\User;
use App\Models\Product;
use App\Models\DiscountGroupValue;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Cache;

class CartService {
    const MINIMUM_QUANTITY = 1;
    const DEFAULT_INSTANCE = 'cart';

    protected $user;
    protected $session;

    public $discount_groups = [];

    public $totals;
 
    /**
     * Constructs a new cart object.
     *
     * @param Illuminate\Session\SessionManager $session
     */
    public function __construct(SessionManager $session)
    {
        $this->user = Auth::guard('web');
        $this->session = $session;

        //
        $this->discount_groups = Cache::get('discount_groups', []);
    
        if (!$this->discount_groups) {
            foreach (DiscountGroupValue::orderBy('amount')->get() as $discount_group_value) {
                if (!empty($discount_group_value->percent)) {
                    $this->discount_groups[(int)$discount_group_value->discount_group_id][(float)$discount_group_value->amount] = (float)$discount_group_value->percent;
                }
            }

            if ($this->discount_groups) {
                ksort(array: $this->discount_groups);
            }
           
            Cache::put('discount_groups', $this->discount_groups);
        }
    }

    /**
     * Adds a new item to the cart.
     *
     * @param int $id
     * @param int $quantity
     * @return void
     */
    public function add(int $product_id, int $quantity): void
    {
        $content = $this->getContent();

        if ($content->has($product_id)) {
            $this->update($content->get($product_id)->id, $quantity);
        } elseif ($this->getProduct($product_id)) {
            Cart::create([
                'user_id' => $this->user->id(),
                'session_id' => $this->session->id(),
                'product_id' => $product_id,
                'quantity' => $quantity
            ]);
        }
    }

    /**
     * Adds a new item to the cart.
     *
     * @param int $id
     * @param int $quantity
     * @return void
     */
    public function update(int $id, int $quantity): void
    {
        Cart::where([
            ['id', $id],
            ['user_id', $this->user->id()]
        ])->orWhere([
            ['id', $id],
            ['session_id', $this->session->id()]
        ])->update([
            'quantity' => $quantity
        ]);
    }

    /**
     * Removes an item from the cart.
     *
     * @param int $id
     * @return void
     */
    public function remove(int $id): void
    {
        Cart::where([
            ['id', $id],
            ['user_id', '!=', null],
            ['user_id', $this->user->id()]
        ])->orWhere([
            ['id', $id],
            ['session_id', '!=', null],
            ['session_id', $this->session->id()]
        ])->delete();
    }

    /**
     * Clears the cart.
     *
     * @return void
     */
    public function clear(): void
    {
        Cart::where('user_id', $this->user->id())
            ->orWhere('session_id', $this->session->id())->delete();

        $this->session->forget('coupon');
    }

    /**
     * Returns the content of the cart.
     *
     * @return Illuminate\Support\Collection
     */
    public function content(int $cart_id = null, int $product_id = null): Collection
    {
        $result = null;

        $result = $this->getContent();
     
        if ($cart_id) {
            $result = $items->get($cart_id);
        }
 
        if (!$cart_id && $product_id && $result) {
            foreach ($result as $item) {
                if ($item->product_id === $product_id) {
                    $result = $item;

                    break;
                }
            }
        }
 
        return collect($result);
    }

    /**
     * Returns total items in the cart.
     *
     * @return int
     */
    public function total(): int
    {
        $content = $this->getContent();

        return count($content);
    }

    /**
     * Returns total price of the items in the cart.
     *
     * @return string
     */
    public function totalSum(): string
    {
        $content = $this->getContent();
         
        $total = $content->reduce(function ($total, $item) {
            return $total += (float)$item->product->price * (float)$item->quantity;
        });

        return (float)$total;
    }

    public function updateCoupon(string $coupon)
    {
        if ($coupon && $this->getCoupon($coupon)) {
            $this->session->put('coupon', $coupon);

            return true;
        } else {
            $this->session->forget('coupon');

            return false;
        }
    }

    public function getCoupon(string $coupon)
    {
        $total = 0;
 
        if ($coupon) {
            $coupon_data = Coupon::where('code', $coupon)->first();

            if ($coupon_data && $coupon_data->discount > 0) {
                $total = array();

                $total['coupon_id'] = $coupon_data->id;

                if ($coupon_data->percent) {
                    $price = $this->totalSum();

                    $total['total'] = (float)$price * ((float)$coupon_data->discount / 100);
                } else {
                    $total['total'] = $coupon_data->discount;
                }
            }
        }

        return $total;
    }

    public function totals(): Collection
    {
        $total = 0;

        $totals = array();
     
        //
        $total_value = $this->totalSum();

        if ($total_value) {
            $total += (float)$total_value;

            $totals['product'] = [
                'name' => __('cart.total_product', ['count' => $this->total()]),
                'value' => formatPrice($total, '₽'),
                'price' => $total_value,
            ];
        }

        //
        $total_value = $this->getCoupon($this->session->get('coupon', false));

        if ($total_value) {
            $total -= (float)$total_value['total'];

            $totals['coupon'] = [
                'coupon_id' => $total_value['coupon_id'],
                'name' => __('cart.total_coupon'),
                'value' => '-' . formatPrice($total_value['total'], '₽'),
                'price' => -$total_value['total'],
            ];
        }
        
        $total_value = 0;

        //if ($total_value) {
            $total += (float)$total_value;

            $totals['delivery'] = [
                'name' => __('cart.total_delivery'),
                'value' => formatPrice($total_value, '₽'),
                'price' => $total_value,
            ];
        //}
     
        $totals['total'] = [
            'name' => __('cart.total_discount'),
            'value' => formatPrice($total, '₽'),
            'price' => $total,
        ];

        $totals = collect($totals)->map(function($total){
            return (object) $total;
        });

        return $totals;
    }


    /**
     * Returns the content of the cart.
     *
     * @return Illuminate\Support\Collection
     */
    protected function getContent(): Collection
    {
        $carts = Cart::where([
            ['user_id', '!=', null],
            ['user_id', $this->user->id()]
        ])->orWhere([
            ['session_id', '!=', null],
            ['session_id', $this->session->id()]
        ])->get();
   
        return collect($carts);
    }

    public function getDiscountGroups(int $discount_group_id = null)
    {
        return $discount_group_id ? ($this->discount_groups[$discount_group_id] ?? null) : $this->discount_groups;
    }

    public function getDiscountGroupValue(int $discount_group_id = null): Collection
    {
        $discounts = array();

        // 1. Получаем параметры по всем группам
        foreach ($this->discount_groups as $group_id => $discount_groups) {
            foreach ($discount_groups as $amount => $percent) {
                if (!isset($discounts[$group_id])) {
                    $discounts[$group_id] = array(
                        'percent' => 0,
                        'price' => 0,
                        'new_percent' => $percent,
                        'new_price' => $amount,
                    );

                    break;
                }
            }
        }

        $products = array();

        $carts = $this->getContent();

        foreach ($carts as $cart) {
            if ($cart->product->discount_group_id && !empty($cart->product->price)) {
                $products[$cart->product->discount_group_id] = $products[$cart->product->discount_group_id] ?? 0;

                $products[$cart->product->discount_group_id] += (float)$cart->product->price * (float)$cart->quantity;
            }
        }

        foreach ($products as $group_id => $total) {
            if (isset($this->discount_groups[$group_id]) && !empty($this->discount_groups[$group_id])) {
                foreach ($this->discount_groups[$group_id] as $amount => $percent) {
                    $discounts[$group_id]['price'] = $total;

                    if ($total >= $amount) {
                        $discounts[$group_id] = array(
                            'percent' => $percent,
                            'price' => $total,
                            'new_percent' => $percent,
                            'new_price' => $amount,
                        );
                    } elseif ($discounts[$group_id]['percent'] <= $percent) {
                        $discounts[$group_id]['new_percent'] = $percent;
                        $discounts[$group_id]['new_price'] = $amount;
 
                        break;
                    }
                }
            }
        }

        return collect($discount_group_id ? ($discounts[$discount_group_id] ?? null) : $discounts);
    }

    /**
     * Get product details
     *
     * @param int $product_id
     * @return void
     */
    private function getProduct(int $product_id)
    {
        return Product::where('id', $product_id)->first();
    }

    /**
     * Copying products to cart during authorization
     *
     * @param string $session_id
     * @return void
     */
    public function auth(string $session_id): void
    {
        Cart::where([
            ['session_id', $session_id]
        ])->update([
            'user_id' => $this->user->id(),
            'session_id' => $this->session->id()
        ]);
    }





    public function checkoutStatus(): Collection
    {
        $collection = array();
    
        $total = $this->totalSum();

        if ((float)config('settings.order_min') > $total) {
            $collection['min_order'] = (float)config('settings.order_min') > $total ? ((float)config('settings.order_min') - (float)$total) : null;
        }

        if (!auth()->guard('web')->check()) {
            $collection['auth'] = true;
        }
 
        return collect($collection);
    }


}