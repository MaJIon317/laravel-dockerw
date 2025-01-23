<?php

namespace App\Livewire\Section;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Product;
use Livewire\Component;

class ProductTab extends Component
{
    public Product $product;
    public $tab_active;
    public array $tabs; 
    public string $all_url = '';

    public function mount(): void
    {
        $this->tab_active = Arr::first($this->tabs);
    }

    public function select(string $tab)
    {
        $this->all_url = '';
        $this->tab_active = $tab;
    }

    public function related($request)
    {
        $request->query->add([
            'category_id' => $this->product->category_id,
            'exclude' => $this->product->id
        ]);

        return $request;
    }

    public function new($request)
    {
        $this->all_url = route('compilation', 'new');

        $request->query->add(['new' => config('settings.new_day', 30)]);

        return $request;
    }

    public function hit($request)
    {
        $this->all_url = route('compilation', 'hit');

        $request->query->add(['hit' => true]);

        return $request;
    }

    public function rendered($view, $html)
    {
        $this->dispatch('slider');
    }

    public function render(Request $request)
    {
        $products = Product::status()->paginate(10)->withQueryString();
        
        return view('components.section.product-tab', compact('products'));
    }
}
 