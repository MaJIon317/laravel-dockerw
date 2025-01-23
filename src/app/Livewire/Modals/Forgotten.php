<?php

namespace App\Livewire\Modals;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Forgotten extends Component
{
    #[Validate('required|email|exists:users')]
    public $email;

    public function action()
    {
        $this->validate();

        $status = Password::sendResetLink([
            'email' => $this->email
        ]);
     
        if ($status === Password::RESET_LINK_SENT) {
            $this->dispatch('toast', message: __($status));

            $this->dispatch('resetModal');
        } else {
            $this->dispatch('toast', type: 'error', message: __($status));
        }
    }

    public function render()
    {
        return view('components.modals.forgotten');
    }
}
 