<?php
    $key = isset($attributes['key']) ? $attributes['key'] : null;
    $title = isset($attributes['title']) ? $attributes['title'] : null;
    $values = isset($attributes['values']) ? $attributes['values'] : [];
    $class = isset($attributes['class']) ? $attributes['class'] : '';
?>

<?php if($values): ?>
    <div class="sort__item <?php echo e($class); ?>">
        <?php if($title): ?>
            <div class="sort__item-title"><?php echo $title; ?></div>
        <?php endif; ?>
 
        <div class="sort__item-prices">
            <label class="sort__item-price">
                <span><?php echo e($values['min']->title ?? ''); ?></span>
                <input type="number" wire:model="<?php echo e($key ?? ''); ?>.min" name="<?php echo e($key ?? ''); ?>.min" value="<?php echo e($values['min']->checked ?? ''); ?>" min="<?php echo e($values['min']->value ?? ''); ?>" max="<?php echo e($values['max']->value ?? ''); ?>" placeholder="<?php echo e($values['min']->value ?? ''); ?>">
            </label>

            <label class="sort__item-price">
                <span><?php echo e($values['max']->title ?? ''); ?></span>
                <input type="number" wire:model="<?php echo e($key ?? ''); ?>.max" name="<?php echo e($key ?? ''); ?>.max" value="<?php echo e($values['max']->checked ?? ''); ?>" min="<?php echo e($values['min']->value ?? ''); ?>" max="<?php echo e($values['max']->value ?? ''); ?>" placeholder="<?php echo e($values['max']->value ?? ''); ?>">
            </label>
        </div>
    </div>
<?php endif; ?>
 <?php /**PATH /var/www/resources/views/components/fields/input-price.blade.php ENDPATH**/ ?>