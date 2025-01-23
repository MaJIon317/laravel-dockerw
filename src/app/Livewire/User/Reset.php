<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Illuminate\Http\Request;
use Livewire\Component;

class Reset extends Component
{
    #[Validate('required')]
    public $token;

    #[Validate('required')]
    public $email;

    #[Validate('required|min:6|confirmed')]
    public $password;

    #[Validate('required')]
    public $password_confirmation;

    public function mount()
    {
        $this->email = request()->get('email');
    }

    public function action()
    {
        $this->validate();

        $status = Password::reset([
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
                function (User $user, string $password) {
                    $user->forceFill([
                        'password' => $password
                    ])->setRememberToken(Str::random(60));
        
                    $user->save();
        
                    event(new PasswordReset($user));
                }
            );

        if ($status === Password::PASSWORD_RESET) {
            $this->dispatch('toast', message: __($status));

            $this->dispatch('showModal', key: 'login', params: ['size' => 'sm']);
        } else {
            $this->dispatch('toast', type: 'error', message: __($status));
        }

    }

    public function render()
    {
        return view('user.reset')
            ->layoutData([
                'title' => __('user.reset'),
                'breadcrumbs' => [__('user.reset')]
            ]);
    }
}
