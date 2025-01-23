<div>
    <div class="popup__header">
        <div class="popup__header-title">
            <span>Ценовые группы товаров</span>
        </div>

        <div class="popup__header-title">
            <div class="popup__header-title">
                <?php $__currentLoopData = $discount_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button type="button" class="popup__header-btn <?php if($discount_group_id === $key): ?> active <?php endif; ?>" x-on:click="Livewire.dispatch('showModal', {key: 'price-group', params: {discount_group_id: '<?php echo e($key); ?>'}})">Группа <?php echo e($key); ?></button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div class="popup__body">
        <?php if($discount_group_value['percent'] != $discount_group_value['new_percent']): ?>
            <div class="alert alert--info">Текущая Ваша скидка <strong><?php echo e($discount_group_value['percent']); ?>%</strong>, добавьте товаров на сумму <strong><?php echo formatPrice($discount_group_value['new_price'] - $discount_group_value['price'], 'руб'); ?></strong> для активации скидки <strong><?php echo e($discount_group_value['new_percent']); ?>%</strong></div>
        <?php endif; ?>
        
        <div class="skidkainfo">
            <?php $__currentLoopData = $discount_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amout => $percent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="skidkainfo__item <?php if($discount_group_value['percent'] == $percent): ?> active <?php endif; ?>">
                    <span><?php echo e($percent); ?>%</span>
                    <span>от <?php echo formatPrice($amout, 'руб'); ?></span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /var/www/resources/views/components/modals/price-group.blade.php ENDPATH**/ ?>