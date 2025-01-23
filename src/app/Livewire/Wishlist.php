<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\WishlistService;

class Wishlist extends Component
{
    public $wishlists;
    public array $products;

    public function mount(WishlistService $wishlists) 
    {
        $this->products = $wishlists->getProducts();
        
        foreach ($this->products as $product) {
            $this->wishlists[] = $product->id;
        }
    }

    public function render(WishlistService $wishlists)
    {
        return view('wishlist')
            ->layoutData([
                'title'             => __('wishlist.title'),
                'meta_title'        => __('wishlist.meta_title'),
                'meta_description'  => __('wishlist.meta_description'),
                'meta_keywords'     => __('wishlist.meta_keywords'),
                'breadcrumbs'       => [__('wishlist.breadcrumb')]
            ]);
    }
}
