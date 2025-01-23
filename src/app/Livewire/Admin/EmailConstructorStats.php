<?php

namespace App\Livewire\Admin;

use App\Models\EmailConstructor;
use Illuminate\Support\Facades\DB;
use Laravel\Horizon\Contracts\TagRepository;
use Livewire\Component;

class EmailConstructorStats extends Component
{
    public EmailConstructor $emailConstructor;

    public int $count_send = 0;

    public function render()
    {
        $this->count_send = $this->emailConstructor->sends()->count();

        $not_delivered = app(TagRepository::class)->count('failed:'.'App\Models\EmailConstructor:' . $this->emailConstructor->id);
        
        $this->count_send+= $not_delivered;

        $tabs = [
            'categories' => ["Прочитанные", "Переходы", "Недоставлено", "Отписки", "Отправлено"],
            'data' => [
                $this->emailConstructor->sends()->where('read', true)->count(),

                DB::table('email_constructor_send_tracks')
                    ->leftJoin('email_constructor_sends', 'email_constructor_sends.id', 'email_constructor_send_tracks.email_constructor_send_id')
                    ->leftJoin('email_constructors', 'email_constructors.id', 'email_constructor_sends.email_constructor_id')
                    ->where('email_constructors.id', $this->emailConstructor->id)
                    ->sum('email_constructor_send_tracks.count'),

                $not_delivered,

                $this->emailConstructor->sends()->where('unsubscribe', true)->count(),

                $this->count_send,
            ],
        ];
  
        $this->dispatch('refreshComponentStats');
        
        return view('admin.email-constructor-stats', compact('tabs'));
    }
}
