<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class MenuCategory extends Component
{
    public function render()
    {
        $categories = Category::where('parent_id', null)->get();

        return view('components.menu-category', compact('categories'));
    }
}
