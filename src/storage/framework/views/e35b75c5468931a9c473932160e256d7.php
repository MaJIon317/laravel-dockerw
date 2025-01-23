<ul class="account_menu-ul">
 
    <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="account_menu-li">
            <a href="<?php echo e(route($route)); ?>" class="account_menu-a<?php echo e(Route::currentRouteName() == $route ? ' active' : null); ?>" wire:navigate>
                <span class="account_menu-icon">
                    <svg width="20" height="20">
                        <use xlink:href="storage/image/sprite.svg#<?php echo e(str_replace('.', '-', $route)); ?>"></use>
                    </svg>
                </span>
                <span class="account_menu-name"><?php echo e($value['name']); ?></span>
                <?php if($value['description']): ?>
                    <span class="account_menu-description"><?php echo e($value['description']); ?></span>
                <?php endif; ?>
            </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <li class="account_menu-li">
        <button type="button" wire:click.prevent="logout" class="account_menu-a">
            <span class="account_menu-icon">
                <svg width="20" height="20">
                    <use xlink:href="storage/image/sprite.svg#logout"></use>
                </svg>
            </span>
            <span class="account_menu-name"><?php echo e(__('user.menu_logout')); ?></span>
        </button>
    </li>
</ul><?php /**PATH /var/www/resources/views/user/menu.blade.php ENDPATH**/ ?>