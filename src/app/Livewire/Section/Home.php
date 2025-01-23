<?php

namespace App\Livewire\Section;

use App\Models\Category;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $categories = Category::where('parent_id', null)->get();

        return view('components.section.home', compact('categories'));
    }
}
