<?php

namespace App\Livewire\Section;

use App\Models\Faq;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Faqs extends Component
{
    public function render()
    {
        $faqs = Faq::orderByDesc('created_at')->get();

        return view('components.section.faqs', compact('faqs'));
    }
}

    