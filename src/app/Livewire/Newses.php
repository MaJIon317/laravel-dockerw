<?php

namespace App\Livewire;

use App\Models\News as NewsModel;
use Livewire\WithPagination;
use Livewire\Component;

class Newses extends Component
{
    use WithPagination; 

    public function render()
    {
        $newses = NewsModel::status()->orderByDesc('publish_date')->paginate(config('settings.page_limit'))->withQueryString();

        return view('newses', compact('newses'))
            ->layoutData([
                'title'             => config('settings.meta.newses.h1'),
                'meta_title'        => config('settings.meta.newses.title'),
                'meta_description'  => config('settings.meta.newses.description'),
                'meta_keywords'     => config('settings.meta.newses.keyword'),
                'breadcrumbs'       => [config('settings.meta.newses.h1')]
            ]);
    }
}
 