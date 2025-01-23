<?php

namespace App\Livewire\Admin\Dasboard;

use App\Models\EmailConstructor as EmailConstructorModel;
use Livewire\Component;

class EmailConstructor extends Component
{
    public $emailConstructors;

    public $emailConstructor;

    public $email_constuctor = 0;
    
    public function mount()
    {
        $this->emailConstructors = EmailConstructorModel::all();

        if ($this->emailConstructors->count()) {
            $this->email_constuctor = $this->emailConstructors->last()->id;
        }
    }

    public function render()
    {
        $this->emailConstructor = $this->emailConstructors->find($this->email_constuctor);
      
        return view('admin.dasboard.email-constructor');
    }
}
