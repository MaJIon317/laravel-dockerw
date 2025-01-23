<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Facades\Wishlist;
use App\Facades\Cart;
use App\Models\DiscountGroup;

class Header extends Component
{
    public $wishlistTotal;
    public $cartTotal;
    public $discount_groups;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->wishlistTotal = Wishlist::total();
        $this->cartTotal = Cart::total();
        $this->discount_groups = DiscountGroup::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('partials.header');
    }
}