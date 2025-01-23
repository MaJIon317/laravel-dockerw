<?php

namespace App\Livewire\Section;

use App\Models\Subscription;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SubscriptionLivewire extends Component
{
    #[Validate('required|min:3|max:200')]
    public string $code;
    
    #[Validate('sometimes|nullable|min:3|email:rfc,dns|unique:subscriptions,email')]
    public string $email = '';

    public function save()
    {
        $this->validate();

        Subscription::create([
            'user_id' => auth('web')->id() ?? 0,
            'email' => $this->email ?? '',
        ]);

        $this->reset(['email']);

        $this->dispatch('toast', message: __('subscription.message'));
    }

    public function render()
    {
        if(view()->exists('components.section.subscription.' . $this->code)) {
            return view('components.section.subscription.' . $this->code);
        } return '<div></div>';
    }
}
