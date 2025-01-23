<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class Header extends Component
{
    public $routes = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->routes[] = array(
            'id' => 'admin.dashboard',
            'icon' => 'fa-solid fa-gauge-high',
            'name' => __('admin/header.menu.' . 'dashboard'),
            'href' => route('admin.dashboard'),
            'children' => array()
        );

        $this->routes[] = array(
            'id' => 'admin.categories.index',
            'icon' => 'fa-solid fa-layer-group',
            'name' => __('admin/header.menu.' . 'categories'),
            'href' => route('admin.categories.index'),
            'children' => array()
        );

        $this->routes[] = array(
            'id' => 'admin.products.index',
            'icon' => 'fa-solid fa-list',
            'name' => __('admin/header.menu.' . 'products'),
            'href' => route('admin.products.index'),
            'children' => array()
        );

        $this->routes[] = array(
            'id' => 'admin.orders.index',
            'icon' => 'fa-sharp fa-thin fa-box',
            'name' => __('admin/header.menu.' . 'orders'),
            'href' => route('admin.orders.index'),
            'children' => array()
        );

        $this->routes[] = array(
            'id' => 'admin.coupons.index',
            'icon' => 'fa-solid fa-receipt',
            'name' => __('admin/header.menu.' . 'coupons'),
            'href' => route('admin.coupons.index'),
            'children' => array()
        );

        $this->routes[] = array(
            'id' => 'admin.articles.index',
            'icon' => 'fa-solid fa-heading',
            'name' => __('admin/header.menu.' . 'articles'),
            'href' => route('admin.articles.index'),
            'children' => array()
        );

        $this->routes[] = array(
            'id' => 'admin.news.index',
            'icon' => 'fa-regular fa-newspaper',
            'name' => __('admin/header.menu.' . 'news'),
            'href' => route('admin.news.index'),
            'children' => array()
        );

        $this->routes[] = array(
            'id' => 'admin.feedbacks.index',
            'icon' => 'fa-regular fa-comments',
            'name' => __('admin/header.menu.' . 'feedbacks'),
            'href' => route('admin.feedbacks.index'),
            'children' => array()
        );

        $this->routes[] = array(
            'id' => 'admin.users.index',
            'icon' => 'fa-solid fa-user-tag',
            'name' => __('admin/header.menu.' . 'users'),
            'href' => route('admin.users.index'),
            'children' => array()
        );

        $childrens = array();

        $childrens[] = array(
            'id' => 'admin.admins.index',
            'name' => __('admin/header.menu.' . 'admins'),
            'href' => route('admin.admins.index'),
            'children' => array()
        );

        $childrens[] = array(
            'id' => 'admin.admin-roles.index',
            'name' => __('admin/header.menu.' . 'admin_roles'),
            'href' => route('admin.admin-roles.index'),
            'children' => array()
        );

        $this->routes[] = array(
            'id' => 'admin.admins.index',
            'icon' => 'fa-solid fa-unlock-keyhole',
            'name' => __('admin/header.menu.' . 'admins'),
            'children' => $childrens
        );

        $this->routes[] = array(
            'id' => 'admin.holidays.index',
            'icon' => 'fa-solid fa-gift',
            'name' => __('admin/header.menu.' . 'holidays'),
            'href' => route('admin.holidays.index'),
            'children' => array()
        );

        $this->routes[] = array(
            'id' => 'admin.informations.index',
            'icon' => 'fa-regular fa-file',
            'name' => __('admin/header.menu.' . 'informations'),
            'href' => route('admin.informations.index'),
            'children' => array()
        );

        $this->routes[] = array(
            'id' => 'admin.faqs.index',
            'icon' => 'fa-regular fa-file',
            'name' => __('admin/header.menu.' . 'faqs'),
            'href' => route('admin.faqs.index'),
            'children' => array()
        );
 
        $childrens = array();

        $childrens[] = array(
            'id' => 'admin.subscriptions.index',
            'name' => __('admin/header.menu.' . 'subscriptions'),
            'href' => route('admin.subscriptions.index'),
            'children' => array()
        );

        $childrens[] = array(
            'id' => 'admin.email-constructor.index',
            'name' => __('admin/header.menu.' . 'email_constructor'),
            'href' => route('admin.email-constructor.index'),
            'children' => array()
        );
        
        $this->routes[] = array(
            'id' => 'admin.email',
            'icon' => 'fa-regular fa-envelope-open',
            'name' => __('admin/header.menu.' . 'email'),
            'children' => $childrens
        );

        $this->routes[] = array(
            'id' => 'admin.settings',
            'icon' => 'fa-solid fa-gear',
            'name' => __('admin/header.menu.' . 'settings'),
            'href' => route('admin.settings.index'),
            'children' => array()
        );


        // Выделяем активный пункт меню
        $route_active = Route::currentRouteName();

        foreach ($this->routes as $key => $route) {
            $active = false;

            foreach($route['children'] as $key2 => $children) {
                if ($children['id'] == $route_active) {
                    $this->routes[$key]['children'][$key2]['active'] = true;

                    $active = true;
                }
            }

            if ($route['id'] == $route_active) {
                $active = true;
            }

            $this->routes[$key]['active'] = $active;
        }

        $permission = auth()->guard('admin')->user()->role->permission ?? null;

        // Удаляем все пункты без доступов
        if ($permission && isset($permission['assets']) && !empty($permission['assets'])) {
            foreach ($this->routes as $key => $route) {
                if (!in_array($route['id'], $permission['assets'])) {
                    unset($this->routes[$key]);
                }

                foreach ($route['children'] as $key2 => $route2) {
                    if (!in_array($route2['id'], $permission['assets'])) {
                        unset($this->routes[$key]['children'][$key2]);
                    }
                }
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin.partials.header');
    }
}
