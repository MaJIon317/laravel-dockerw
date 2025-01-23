<?php

namespace App\Livewire\User;

use Livewire\Component;

class Verify extends Component
{
    private function hasVerifiedEmail()
    {
        if (auth()->user()->hasVerifiedEmail()) {
            $this->redirectRoute('dashboard');

            return true;
        }
    }

    public function mount()
    {
        $this->hasVerifiedEmail();
    }

    public function updateLink()
    {
        if (!$this->hasVerifiedEmail()) {
            auth()->user()->sendEmailVerificationNotification();

            $this->dispatch('toast', message: __('user.verify_requested'));
        }
    }

    public function render()
    {
        return view('user.verify')->layoutData([
            'title' => __('user.verify')
        ])->layout('layouts.user');
    }
}
