<?php

namespace App\Livewire;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        return view('contact')->layoutData([
            'title'             => config('settings.meta.contact.h1'),
            'meta_title'        => config('settings.meta.contact.title'),
            'meta_description'  => config('settings.meta.contact.description'),
            'meta_keywords'     => config('settings.meta.contact.keyword'),
            'breadcrumbs'       => [config('settings.meta.contact.h1')]
        ]);
    }
}
