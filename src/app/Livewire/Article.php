<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article as ArticleModel;
use Carbon\Carbon;

class Article extends Component
{
    public $slug;

    public function render()
    {
        $article = ArticleModel::findOrFailBySlug($this->slug);

        // Breadcrumbs
        $breadcrumbs = array();

        $breadcrumbs[__('article.breadcrumb')] = route('articles');

        $breadcrumbs[] = $article->title;
        // END Breadcrumbs

        return view('article', compact('article'))
            ->layoutData([
                'title'             => $article->title . ' <span>от ' . Carbon::parse($article->publish_date)->translatedFormat('j F Y') . '</span>',
                'meta_title'        => $article->meta_title,
                'meta_description'  => $article->meta_description,
                'meta_keywords'     => $article->meta_keywords,
                'breadcrumbs'       => $breadcrumbs
            ]);
    }
}
