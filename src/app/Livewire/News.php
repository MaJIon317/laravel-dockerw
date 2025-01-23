<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News as NewsModel;
use Carbon\Carbon;

class News extends Component
{
    public $slug;

    public function render()
    {
        $news = NewsModel::findOrFailBySlug($this->slug);

        // Breadcrumbs
        $breadcrumbs = array();

        $breadcrumbs[__('news.breadcrumb')] = route('newses');

        $breadcrumbs[] = $news->title;
        // END Breadcrumbs

        return view('news', compact('news'))
            ->layoutData([
                'title'             => $news->title . ' <span>от ' . Carbon::parse($news->publish_date)->translatedFormat('j F Y') . '</span>',
                'meta_title'        => $news->meta_title,
                'meta_description'  => $news->meta_description,
                'meta_keywords'     => $news->meta_keywords,
                'breadcrumbs'       => $breadcrumbs
            ]);
    }
}
