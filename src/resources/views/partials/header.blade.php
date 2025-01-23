<header class="header" id="header">
    <div class="container">
        
        <div class="header__menu">
            <ul class="header__menu-ul">
                @if(config('settings.menu'))
                    @foreach(config('settings.menu') as $item)
                        <li class="header__menu-li">
                            <a href="{{ $item['link'] }}" class="header__menu-a" wire:navigate>
                                <span class="header__menu-name">{{ $item['name'] }}</span>
                                @if (isset($item['items']) && !empty($item['items']))
                                    <span class="header__menu-arrow">
                                        <svg width="10" height="6">
                                            <use xlink:href="storage/image/sprite.svg#arrow"></use>
                                        </svg>
                                    </span>
                                @endif
                            </a>
                            @if (isset($item['items']) && !empty($item['items']))
                                <ul class="header__menu-child">
                                    @foreach($item['items'] as $child)
                                        <li class="header__menu-child_li">
                                            <a href="{{ $child['link'] }}" class="header__menu-child_a" wire:navigate>
                                                <span class="header__menu-child_name">{{ $child['name'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif

                <li class="header__menu-li">
                    <a href="javascript:void(0)" class="header__menu-a">
                        <span class="header__menu-name">Система скидок</span>
                        <span class="header__menu-arrow">
                            <svg width="10" height="6">
                                <use xlink:href="storage/image/sprite.svg#arrow"></use>
                            </svg>
                        </span>
                    </a>
                    <ul class="header__menu-child">
                        @foreach($discount_groups as $discount_group)
                            <li class="header__menu-child_li">
                                <button type="button" title="{{ $discount_group->title }}" class="header__menu-child_a" x-on:click="Livewire.dispatch('showModal', {key: 'price-group', params: {discount_group_id: '{{ $discount_group->id }}'}})">
                                    <span class="header__menu-child_name">{{ __('discount_group.title', ['title' => $discount_group->title]) }}</span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="header__menu-li">
                    <a href="{{ route('information', 'delivery') }}" class="header__menu-a" wire:navigate>
                        <span class="header__menu-icon header__menu-icon--color">
                            <svg width="18" height="16">
                                <use xlink:href="storage/image/sprite.svg#trolley"></use>
                            </svg>
                        </span>
                        <span class="header__menu-name">Минимальная сумма заказа {{ number_format(config('settings.order_min'), 0, ',', ' ') }} руб</span>
                    </a>
                </li>
                
            </ul>
        </div>

        <div class="header__data">
            <div class="header__data-item header__data-item--logo">
                <button type="button" class="header__data-catalog" title="Меню каталога" data-menu-open="menucatalog" x-on:click="Livewire.dispatch('menu', 'menucatalog')">
                    <svg width="35" height="34">
                        <use xlink:href="storage/image/sprite.svg#catalog"></use>
                    </svg>
                </button>
                @if (url()->current() == route('home'))
                    <div class="header__data-logo">
                        <img src="storage/image/logos/logo.svg" alt="{{ config('settings.name') }}" class="header__data-logo_img">
                    </div>
                @else
                    <a href="{{ route('home') }}" class="header__data-logo" wire:navigate>
                        <img src="storage/image/logos/logo.svg" alt="{{ config('settings.name') }}" class="header__data-logo_img">
                    </a>
                @endif
            </div>
            <div class="header__data-item header__data-item--search">
                <button type="button" class="header__data-catalog" title="Меню каталога" data-menu-open="menucatalog" x-on:click="Livewire.dispatch('menu', 'menucatalog')">
                    <svg width="35" height="34">
                        <use xlink:href="storage/image/sprite.svg#catalog"></use>
                    </svg>
                </button>

                <div class="header__data-blocksearch">
                    <div class="header__data-advantage">
                        <span class="header__data-advantage--max">№1 среди российских поставщиков праздничной продукции</span>
                        <span class="header__data-advantage--min">№1 поставщик праздничной продукции</span>
                    </div>
                    <div class="header__data-search">
                        <livewire:section.search_livewire />
                    </div>
                </div>

                <button type="button" class="header__data-search_close" data-close="search">
                    <svg width="20" height="21">
                        <use xlink:href="storage/image/sprite.svg#close"></use>
                    </svg>
                </button>

            </div>
            <div class="header__data-item header__data-item--phone">
                <div class="header__data-phone">
                    <div class="header__data-phone_block">
                        <a href="tel:+{{ preg_replace('/[^0-9]/', '', config('settings.phone_federal')) }}" class="header__data-phone_a">{{ config('settings.phone_federal') }}</a>
                        <span class="header__data-phone_button">
                            <svg width="3" height="8">
                                <use xlink:href="storage/image/sprite.svg#info"></use>
                            </svg>
                        </span>
                        <span class="header__data-phone_info">Бесплатно по РФ</span>
                    </div>
                    <div class="header__data-phoneother">
                        <div class="header__data-phoneother_block">
                            <div class="header__data-phoneother_item">
                                <a href="tel:+{{ preg_replace('/[^0-9]/', '', config('settings.phone_federal')) }}" class="header__data-phoneother_a">
                                    <span class="header__data-phoneother_icon">
                                        <svg width="18" height="18">
                                            <use xlink:href="storage/image/sprite.svg#phone"></use>
                                        </svg>
                                    </span>
                                    <span class="header__data-phoneother_phone">
                                        <span class="header__data-phone_a header__data-phoneother_name">{{ config('settings.phone_federal') }}</span>
                                        <span class="header__data-phone_info header__data-phoneother_detail">Бесплатно по РФ</span>
                                    </span>
                                </a>
                            </div>
                            <div class="header__data-phoneother_item">
                                <a href="tel:+{{ preg_replace('/[^0-9]/', '', config('settings.phone')) }}" class="header__data-phoneother_a">
                                    <span class="header__data-phoneother_icon">
                                        <svg width="18" height="18">
                                            <use xlink:href="storage/image/sprite.svg#phone"></use>
                                        </svg>
                                    </span>
                                    <span class="header__data-phoneother_phone">
                                        <span class="header__data-phone_a header__data-phoneother_name">{{ config('settings.phone') }}</span>
                                    </span>
                                </a>
                            </div>
                            <div class="header__data-phoneother_item">
                                <div class="header__data-phoneother_work">
                                    Обработка заказов: {{ config('settings.mode') }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="header__data-item header__data-item--system">
                <div class="header__data-systems">
                    <div class="header__data-system header__data-system--mobile">
                        
                        <button type="button" class="header__data-system_a" title="Меню каталога" data-menu-open="menucatalog" x-on:click="Livewire.dispatch('menu', 'menucatalog')">
                            <span class="header__data-system_icon">
                                <svg width="24" height="24">
                                    <use xlink:href="storage/image/sprite.svg#catalog"></use>
                                </svg>
                            </span>
                            <span class="header__data-system_name">Каталог</span>
                        </button>
                    
                    </div>

                    <div class="header__data-system">
                        @auth
                            <a href="{{ route('dashboard') }}" class="header__data-system_a" wire:navigate>
                                <span class="header__data-system_icon">
                                    <svg width="24" height="24">
                                        <use xlink:href="storage/image/sprite.svg#user-auth"></use>
                                    </svg>
                                </span>
                                <span class="header__data-system_name">Профиль</span>
                            </a>
                        @else
                            <button type="button" class="header__data-system_a" title="Профиль" x-on:click="Livewire.dispatch('showModal', {key: 'login', params: {size: 'sm'}})">
                                <span class="header__data-system_icon">
                                    <svg width="24" height="24">
                                        <use xlink:href="storage/image/sprite.svg#user"></use>
                                    </svg>
                                </span>
                                <span class="header__data-system_name">Профиль</span>
                            </button>
                        @endauth
                    </div>
                    <div class="header__data-system">
                        <a href="{{ route('wishlist') }}" class="header__data-system_a{{ $wishlistTotal ? ' notnull' : '' }}" wire:navigate>
                            <span class="header__data-system_icon">
                                <svg width="19" height="19">
                                    <use xlink:href="storage/image/sprite.svg#wishlist"></use>
                                </svg>
                                <span class="header__data-system_count" data-total-wishlist>{{ $wishlistTotal ? $wishlistTotal : null }}</span>
                            </span>
                            <span class="header__data-system_name">Избранное</span>
                        </a>
                    </div>
                    <div class="header__data-system">
                        <a href="{{ route('cart') }}" class="header__data-system_a{{ $cartTotal ? ' notnull' : '' }}" wire:navigate>
                            <span class="header__data-system_icon">
                                <svg width="21" height="21">
                                    <use xlink:href="storage/image/sprite.svg#cart"></use>
                                </svg>
                                <span class="header__data-system_count" data-total-cart>{{ $cartTotal ? $cartTotal : null }}</span>
                            </span>
                            <span class="header__data-system_name">Корзина</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="menucatalog" id="menucatalog">
            <livewire:menu-category lazy />
        </div>

    </div>
</header>
<main class="main" id="main">
