<?php

namespace App\Livewire\Section;

use App\Models\News;
use Livewire\Component;

class NewsLivewire extends Component
{
    public function render()
    {
        $news = News::limit(10)->get();

        return view('components.section.news', compact('news'));
    }
}
