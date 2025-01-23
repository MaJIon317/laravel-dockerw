<?php

namespace App\Livewire\Admin;

use App\Models\EmailConstructor;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EmailConstructorClickMap extends Component
{
    public EmailConstructor $emailConstructor;

    public function render()
    {
        $maps = DB::table('email_constructor_send_tracks')
            ->select(['email_constructor_send_tracks.key', 'email_constructor_send_tracks.count'])
            ->leftJoin('email_constructor_sends', 'email_constructor_sends.id', 'email_constructor_send_tracks.email_constructor_send_id')
            ->where('email_constructor_sends.email_constructor_id', $this->emailConstructor->id)
            ->groupBy('email_constructor_send_tracks.key')
            ->havingRaw('email_constructor_send_tracks.count')
            ->get();

        $this->dispatch('refreshComponentStats');
 
        return view('admin.email-constructor-click-map', compact('maps'));
    }
}
