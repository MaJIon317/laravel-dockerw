<?php if($filter->hasValues()): ?>
<div class="sort__item">
    <div class="sort__item-title"><?php echo $filter->label(); ?></div>
    <div class="sort__item-text">
        <?php
            $text = null;

            foreach($filter->values() as $value) {
                if ($filter->requestValue() && (is_array($filter->requestValue()) ? in_array($value['value'], $filter->requestValue()) : $value['value'] == $filter->requestValue())) {
                    $text[] = $value['label'];
                }
            }
        ?>

        <?php echo implode(', ', $text ?? ['Выбрать']); ?>

    </div>
    <div class="sort__item-items">
        <?php $__currentLoopData = $filter->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <label class="sort__item-item" for="<?php echo e($filter->id($value['value'])); ?>">
                <input 
                    id="<?php echo e($filter->id($value['value'])); ?>"
                    wire:model.blur="<?php echo e($filter->name()); ?>"
                    name="<?php echo e($filter->name()); ?>"
                    value="<?php echo e($value['value']); ?>"
                    type="radio"
                    <?php if($filter->requestValue() && (is_array($filter->requestValue()) ? in_array($value['value'], $filter->requestValue()) : $value['value'] == $filter->requestValue())): echo 'checked'; endif; ?>
                    data-value="<?php echo e($value['label']); ?>"
                >
                <span class="sort__item-input_text"><?php echo e($value['label']); ?></span>
            </label>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php else: ?>
cheoc
<?php endif; ?><?php /**PATH /var/www/resources/views/filters/radio.blade.php ENDPATH**/ ?>