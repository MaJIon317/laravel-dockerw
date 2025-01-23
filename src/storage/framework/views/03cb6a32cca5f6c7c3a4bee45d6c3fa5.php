<header class="header" id="header">
    <div class="container">
        
        <div class="header__menu">
            <ul class="header__menu-ul">
                <?php if(config('settings.menu')): ?>
                    <?php $__currentLoopData = config('settings.menu'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="header__menu-li">
                            <a href="<?php echo e($item['link']); ?>" class="header__menu-a" wire:navigate>
                                <span class="header__menu-name"><?php echo e($item['name']); ?></span>
                                <?php if(isset($item['items']) && !empty($item['items'])): ?>
                                    <span class="header__menu-arrow">
                                        <svg width="10" height="6">
                                            <use xlink:href="storage/image/sprite.svg#arrow"></use>
                                        </svg>
                                    </span>
                                <?php endif; ?>
                            </a>
                            <?php if(isset($item['items']) && !empty($item['items'])): ?>
                                <ul class="header__menu-child">
                                    <?php $__currentLoopData = $item['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="header__menu-child_li">
                                            <a href="<?php echo e($child['link']); ?>" class="header__menu-child_a" wire:navigate>
                                                <span class="header__menu-child_name"><?php echo e($child['name']); ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

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
                        <?php $__currentLoopData = $discount_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="header__menu-child_li">
                                <button type="button" title="<?php echo e($discount_group->title); ?>" class="header__menu-child_a" x-on:click="Livewire.dispatch('showModal', {key: 'price-group', params: {discount_group_id: '<?php echo e($discount_group->id); ?>'}})">
                                    <span class="header__menu-child_name"><?php echo e(__('discount_group.title', ['title' => $discount_group->title])); ?></span>
                                </button>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>

                <li class="header__menu-li">
                    <a href="<?php echo e(route('information', 'delivery')); ?>" class="header__menu-a" wire:navigate>
                        <span class="header__menu-icon header__menu-icon--color">
                            <svg width="18" height="16">
                                <use xlink:href="storage/image/sprite.svg#trolley"></use>
                            </svg>
                        </span>
                        <span class="header__menu-name">Минимальная сумма заказа <?php echo e(number_format(config('settings.order_min'), 0, ',', ' ')); ?> руб</span>
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
                <?php if(url()->current() == route('home')): ?>
                    <div class="header__data-logo">
                        <img src="storage/image/logos/logo.svg" alt="<?php echo e(config('settings.name')); ?>" class="header__data-logo_img">
                    </div>
                <?php else: ?>
                    <a href="<?php echo e(route('home')); ?>" class="header__data-logo" wire:navigate>
                        <img src="storage/image/logos/logo.svg" alt="<?php echo e(config('settings.name')); ?>" class="header__data-logo_img">
                    </a>
                <?php endif; ?>
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
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('section.search_livewire', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2198766049-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
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
                        <a href="tel:+<?php echo e(preg_replace('/[^0-9]/', '', config('settings.phone_federal'))); ?>" class="header__data-phone_a"><?php echo e(config('settings.phone_federal')); ?></a>
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
                                <a href="tel:+<?php echo e(preg_replace('/[^0-9]/', '', config('settings.phone_federal'))); ?>" class="header__data-phoneother_a">
                                    <span class="header__data-phoneother_icon">
                                        <svg width="18" height="18">
                                            <use xlink:href="storage/image/sprite.svg#phone"></use>
                                        </svg>
                                    </span>
                                    <span class="header__data-phoneother_phone">
                                        <span class="header__data-phone_a header__data-phoneother_name"><?php echo e(config('settings.phone_federal')); ?></span>
                                        <span class="header__data-phone_info header__data-phoneother_detail">Бесплатно по РФ</span>
                                    </span>
                                </a>
                            </div>
                            <div class="header__data-phoneother_item">
                                <a href="tel:+<?php echo e(preg_replace('/[^0-9]/', '', config('settings.phone'))); ?>" class="header__data-phoneother_a">
                                    <span class="header__data-phoneother_icon">
                                        <svg width="18" height="18">
                                            <use xlink:href="storage/image/sprite.svg#phone"></use>
                                        </svg>
                                    </span>
                                    <span class="header__data-phoneother_phone">
                                        <span class="header__data-phone_a header__data-phoneother_name"><?php echo e(config('settings.phone')); ?></span>
                                    </span>
                                </a>
                            </div>
                            <div class="header__data-phoneother_item">
                                <div class="header__data-phoneother_work">
                                    Обработка заказов: <?php echo e(config('settings.mode')); ?>

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
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('dashboard')); ?>" class="header__data-system_a" wire:navigate>
                                <span class="header__data-system_icon">
                                    <svg width="24" height="24">
                                        <use xlink:href="storage/image/sprite.svg#user-auth"></use>
                                    </svg>
                                </span>
                                <span class="header__data-system_name">Профиль</span>
                            </a>
                        <?php else: ?>
                            <button type="button" class="header__data-system_a" title="Профиль" x-on:click="Livewire.dispatch('showModal', {key: 'login', params: {size: 'sm'}})">
                                <span class="header__data-system_icon">
                                    <svg width="24" height="24">
                                        <use xlink:href="storage/image/sprite.svg#user"></use>
                                    </svg>
                                </span>
                                <span class="header__data-system_name">Профиль</span>
                            </button>
                        <?php endif; ?>
                    </div>
                    <div class="header__data-system">
                        <a href="<?php echo e(route('wishlist')); ?>" class="header__data-system_a<?php echo e($wishlistTotal ? ' notnull' : ''); ?>" wire:navigate>
                            <span class="header__data-system_icon">
                                <svg width="19" height="19">
                                    <use xlink:href="storage/image/sprite.svg#wishlist"></use>
                                </svg>
                                <span class="header__data-system_count" data-total-wishlist><?php echo e($wishlistTotal ? $wishlistTotal : null); ?></span>
                            </span>
                            <span class="header__data-system_name">Избранное</span>
                        </a>
                    </div>
                    <div class="header__data-system">
                        <a href="<?php echo e(route('cart')); ?>" class="header__data-system_a<?php echo e($cartTotal ? ' notnull' : ''); ?>" wire:navigate>
                            <span class="header__data-system_icon">
                                <svg width="21" height="21">
                                    <use xlink:href="storage/image/sprite.svg#cart"></use>
                                </svg>
                                <span class="header__data-system_count" data-total-cart><?php echo e($cartTotal ? $cartTotal : null); ?></span>
                            </span>
                            <span class="header__data-system_name">Корзина</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="menucatalog" id="menucatalog">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('menu-category', ['lazy' => true]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2198766049-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

    </div>
</header>
<main class="main" id="main">
<?php /**PATH /var/www/resources/views/partials/header.blade.php ENDPATH**/ ?>