<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Compilation extends Component
{
    public $slug;

    public function render(Request $request)
    {
        $slug = Str::lower($this->slug);

        return view('compilation')
            ->layoutData([
                'title'             => config('settings.meta.compilation_' . $slug . '.h1'),
                'meta_title'        => config('settings.meta.compilation_' . $slug . '.title'),
                'meta_description'  => config('settings.meta.compilation_' . $slug . '.description'),
                'meta_keywords'     => config('settings.meta.compilation_' . $slug . '.keyword'),
                'breadcrumbs'       => [config('settings.meta.compilation_' . $slug . '.h1')]
            ]);
    }
}