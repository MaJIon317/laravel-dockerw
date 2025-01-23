<?php

namespace App\Livewire\Cart;

use App\Models\Product;
use Livewire\Component;
use App\Facades\Wishlist;
use App\Facades\Cart as CartFasade;

class Cart extends Component
{
    public $error;

    public $wishlists;
    public $carts;
    public $discount_groups;
    public $notCheckout;
    public $totals;
    
    public string $coupon;
    /**
     * Mounts the component on the template.
     *
     * @return void
     */
    public function mount(string $code = null): void
    {
        if (!$code || ($code == 'wishlist')) {
            $this->wishlists = Wishlist::content();
        }

        if (!$code || ($code == 'cart')) {
            $this->carts = CartFasade::content();
            $this->discount_groups = CartFasade::getDiscountGroupValue();
            $this->totals = CartFasade::totals();
            
            $coupon = session()->get('coupon', false);

            $this->coupon = $coupon ? (CartFasade::getCoupon($coupon) ? $coupon : '') : '';
        }

        $this->notCheckout = CartFasade::checkoutStatus();
    }

    public function updateToWishlist(int $product_id): void
    {
        Wishlist::update($product_id);
        
        $this->mount('wishlist');

        $this->dispatch('updateToWishlist', total: Wishlist::total());
    }

    /**
     * Update item to cart.
     *
     * @return void
     */
    public function updateCart(int $id, int $quantity): void
    {
        CartFasade::update($id, $quantity, []);
    
        $this->mount('cart');
        
        $this->dispatch('updateToCart', total: CartFasade::total());
    }

    /**
     * Update item to cart.
     *
     * @return void
     */
    public function updateCoupon(string $coupon): void
    {
        $this->error['coupon'] = null;

        if (!empty(trim($coupon))) {
            $coupon = CartFasade::updateCoupon($coupon);

            if (!$coupon) {
                $this->error['coupon'] = 'Купон не найден';
            }
        }

        $this->mount();
    }

     /**
     * Remove item to cart.
     *
     * @return void
     */
    public function removeCart(int $id): void
    {
        CartFasade::remove($id);

        $this->mount('cart');
        
        $this->dispatch('updateToCart', total: CartFasade::total());
    }

    public function render()
    {
        return view('cart.cart')
            ->layoutData([
                'title'             => $this->carts ? __('cart.title') : null,
                'breadcrumbs'       => $this->carts ? [__('cart.breadcrumb')] : null
            ]);
    }
}
