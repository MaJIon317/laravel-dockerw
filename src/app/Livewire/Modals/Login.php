<?php

namespace App\Livewire\Modals;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use App\Facades\Wishlist;
use App\Facades\Cart;

#[Title('Login - webdement.ru')] 
class Login extends Component
{
    #[Validate('required|email|exists:users,email')]
    public $email;

    #[Validate('required|min:6')]
    public $password;
    
    public $someone = null;

    public function mount()
    {
        if (Auth::guard('web')->check()) {
            return $this->redirectRoute('dashboard', navigate: true);
        }
    }
    
    public function action()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        $session_id = session()->getId();

        if (Auth::attempt($credentials)) {
            Wishlist::auth();
            Cart::auth($session_id);
 
            session()->flash('toast', [
                'message' => __('user.error_login')
            ]);

            return $this->redirect(url()->previous(), navigate: true);
        }
        
        $this->addError('password', __('user.error_login'));

        $this->dispatch('toast', type: 'error', message: __('user.error_login'));
    }

    public function render()
    {
        return view('components.modals.login');
    }
}
