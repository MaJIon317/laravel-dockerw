<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Facades\Wishlist;
use App\Facades\Cart;
use Illuminate\Contracts\View\View;

class ProductCard extends Component
{
    public string $view = 'default';

    public $listeners = [];

    public $wishlist;
    public $cart;

    public Product $product;

    public int $quantity;

    public function mount(): void
    {
        $this->listeners = [
            'product-card-' . $this->product->id
        ];

        $this->quantity = $this->product->minimum ?? 1;

        $this->updateProduct();
    }

    public function updateToWishlist(): void
    {
        Wishlist::update($this->product->id);
        
        $this->updateProduct('wishlist');

        $this->dispatch('updateToWishlist', total: Wishlist::total());
    }
    
    /**
     * Adds an item to cart.
     *
     * @return void
     */
    public function addToCart(): void
    {
        Cart::add($this->product->id, $this->quantity);

        $this->updateProduct('cart');
        
        $this->dispatch('updateToCart', total: Cart::total());
    }

    /**
     * Rerenders the product items and total on the browser.
     *
     * @return void
     */
    public function updateProduct(string $code = null)
    {
        if (!$code || ($code == 'wishlist')) {
            $items = Wishlist::content();

            $this->wishlist = $items->get($this->product->id) ?? false;
        }

        if (!$code || ($code == 'cart')) {
            $this->cart = Cart::content(null, $this->product->id);
        }

        $this->dispatch('product-card-' . $this->product->id);
    }

    /**
     * Renders the component on the browser.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('components.productcard.' . $this->view);
    }
}
