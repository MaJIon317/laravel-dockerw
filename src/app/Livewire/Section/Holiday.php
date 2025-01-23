<?php

namespace App\Livewire\Section;

use App\Models\Holiday as HolidayModel;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Holiday extends Component
{
    public function render()
    {
        $holidays = HolidayModel::holidays();

        return view('components.section.holiday', compact('holidays'));
    }
}

    