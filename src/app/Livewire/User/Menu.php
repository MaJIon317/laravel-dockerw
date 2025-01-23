<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

#[Title('Logout - webdement.ru')] 
class Menu extends Component
{
    public $routes = [];

    public function logout()
    {
        Auth::logout();

        return $this->redirectRoute('home', navigate: true);
    }

    public function mount()
    {
        foreach (Route::getRoutes() as $route) {
            if ($route->getName() && preg_match('/^\/?dashboard/', $route->getName()) && !in_array($route->getName(), [
                'dashboard.order.info'
            ])) {
                $description = null;

                if ($route->getName() == 'dashboard.balance') {
                    $description = '0₽';
                }
           
                $this->routes[$route->getName()] = array(
                    'name' => __('user.menu_' . str_replace('dashboard.', '', $route->getName())),
                    'description' => $description
                );
            }
        }
    }

    public function render()
    {
        return view('user.menu');
    }
}
