<?php

namespace App\Livewire\Modals;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Facades\Wishlist;
use App\Facades\Cart;

#[Title('Register - webdement.ru')] 
class Register extends Component
{
    #[Validate('required|string|min:3|max:250')]
    public $name;

    #[Validate('required|email|max:250|unique:users,email')]
    public $email;

    #[Validate('required|string|min:9|max:18|unique:users')]
    public $phone;

    #[Validate('required|string|min:8')]
    public $password;

    public function mount()
    {
        if (Auth::guard('web')->check()) {
            return $this->redirectRoute('dashboard', navigate: true);
        }
    }

    public function action()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password)
        ]);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        $session_id = session()->getId();
        
        Auth::attempt($credentials);
        
        Wishlist::auth();
        Cart::auth($session_id);

        return $this->redirect(url()->previous(), navigate: true);
    }

    public function render()
    {
        return view('components.modals.register');
    }
}
