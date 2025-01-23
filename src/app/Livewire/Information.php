<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Information as InformationModel;

class Information extends Component
{
    public $slug;

    public function render()
    {
        $information = InformationModel::findOrFailBySlug($this->slug);

        return view('information', compact('information'))
            ->layoutData([
                'title' => $information->title,
                'description' => $information->description,
                'meta_title' => $information->meta_title,
                'meta_description' => $information->meta_description,
                'meta_keywords' => $information->meta_keywords,
                'breadcrumbs' => [$information->title]
            ]);
    }
}
