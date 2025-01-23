<ul class="account_menu-ul">
 
    @foreach($routes as $route => $value)
        <li class="account_menu-li">
            <a href="{{ route($route) }}" class="account_menu-a{{ Route::currentRouteName() == $route ? ' active' : null }}" wire:navigate>
                <span class="account_menu-icon">
                    <svg width="20" height="20">
                        <use xlink:href="storage/image/sprite.svg#{{ str_replace('.', '-', $route) }}"></use>
                    </svg>
                </span>
                <span class="account_menu-name">{{ $value['name'] }}</span>
                @if ($value['description'])
                    <span class="account_menu-description">{{ $value['description'] }}</span>
                @endif
            </a>
        </li>
    @endforeach

    <li class="account_menu-li">
        <button type="button" wire:click.prevent="logout" class="account_menu-a">
            <span class="account_menu-icon">
                <svg width="20" height="20">
                    <use xlink:href="storage/image/sprite.svg#logout"></use>
                </svg>
            </span>
            <span class="account_menu-name">{{ __('user.menu_logout') }}</span>
        </button>
    </li>
</ul>