<?php

namespace App\Livewire;

use App\Models\Category as CategoryModel;
use Livewire\Component;
use Illuminate\Http\Request;

class Category extends Component
{
    public $slug;

    public function render()
    {
        $category = CategoryModel::findOrFailBySlug($this->slug);

        // Breadcrumbs
        $breadcrumbs = array();

        $breadcrumbs[__('catalog.breadcrumb')] = route('catalog');

        foreach ($category->parents->reverse() as $parent) {
            $breadcrumbs[$parent->title] = route('category', $parent->slug);
        }

        $breadcrumbs[] = $category->title;
        // END Breadcrumbs

        $childrens = CategoryModel::where('parent_id', $category->id)->get();

        return view('category', compact('category', 'childrens'))
            ->layoutData([
                'title'             => $category->title,
                'meta_title'        => $category->meta_title,
                'meta_description'  => $category->meta_description,
                'meta_keywords'     => $category->meta_keywords,
                'breadcrumbs'       => $breadcrumbs
            ]);
    }
}
