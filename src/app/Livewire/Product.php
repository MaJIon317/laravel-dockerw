<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product as ProductModel;
use Livewire\Component;
use App\Services\WishlistService;
use App\Services\CartService;

class Product extends Component
{
    public $slug;

    public function render()
    {
        $product = ProductModel::findOrFailBySlug($this->slug);
        
        // Breadcrumbs
        $breadcrumbs = array();

        $breadcrumbs[__('catalog.breadcrumb')] = route('catalog');

        $category = Category::find($product->category_id);

        if ($category) {
            foreach ($category->parents->reverse() as $parent) {
                $breadcrumbs[$parent->title] = route('category', $parent->slug);
            }

            $breadcrumbs[$category->title] = route('category', $category->slug);
        }

        $breadcrumbs[] = $product->title;
        // END Breadcrumbs

        return view('product', compact('product'))
            ->layoutData([
                //'title'             => $product->title,
                'meta_title'        => $product->meta_title,
                'meta_description'  => $product->meta_description,
                'meta_keywords'     => $product->meta_keywords,
                'breadcrumbs'       => $breadcrumbs
            ]);
    }
}
