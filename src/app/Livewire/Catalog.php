<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Catalog extends Component
{
    public function render()
    {
        $categories = Category::where('parent_id', null)->get();

        return view('catalog', compact('categories'))
            ->layoutData([
                'title'             => config('settings.meta.catalog.h1'),
                'meta_title'        => config('settings.meta.catalog.title'),
                'meta_description'  => config('settings.meta.catalog.description'),
                'meta_keywords'     => config('settings.meta.catalog.keyword'),
                'breadcrumbs'       => [config('settings.meta.catalog.h1')]
            ]);
    }
}
