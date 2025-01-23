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

        <?php ($checked = $title); ?>

        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($value->checked) && $value->checked): ?>
                <?php ($checked = $value->title ?? $checked); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
        <div class="sort__item-text"><?php echo $checked; ?></div>
        <div class="sort__item-items">
            <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label class="sort__item-item">
                    <input type="radio" wire:model="<?php echo e($key ?? ''); ?>" name="<?php echo e($key ?? ''); ?>" value="<?php echo e($value->value ?? ''); ?>" data-value="<?php echo e($value->title ?? ''); ?>" <?php if(isset($value->checked) && $value->checked): ?> checked <?php endif; ?>>
                    <span class="sort__item-input_text"><?php echo e($value->title ?? ''); ?></span>
                </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
 <?php /**PATH /var/www/resources/views/components/fields/select-radio.blade.php ENDPATH**/ ?>