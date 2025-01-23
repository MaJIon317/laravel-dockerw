<?php

namespace App\Livewire;

use App\Models\Article as ArticleModel;
use Livewire\WithPagination;
use Livewire\Component;

class Articles extends Component
{
    use WithPagination; 

    public function render()
    {
        $articles = ArticleModel::status()->orderByDesc('publish_date')->paginate(config('settings.page_limit'))->withQueryString();
 
        return view('articles', compact('articles'))
            ->layoutData([
                'title'             => config('settings.meta.articles.h1'),
                'meta_title'        => config('settings.meta.articles.title'),
                'meta_description'  => config('settings.meta.articles.description'),
                'meta_keywords'     => config('settings.meta.articles.keyword'),
                'breadcrumbs'       => [config('settings.meta.articles.h1')]
            ]);
    }
}
