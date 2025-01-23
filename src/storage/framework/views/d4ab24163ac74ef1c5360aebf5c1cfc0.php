<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name',
    'label',
    'toltip',
    'default',
    'required',
    'value',
    'values',
    'error',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'name',
    'label',
    'toltip',
    'default',
    'required',
    'value',
    'values',
    'error',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="mb-3">
    <?php if(isset($label)): ?>
        <label for="input-<?php echo e($name ?? ''); ?>" class="form-label">
            <?php if(isset($toltip)): ?>
                <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="<?php echo e($toltip); ?>"><?php echo e($label); ?></span>
            <?php else: ?>
                <?php echo e($label); ?>

            <?php endif; ?>
        </label>
    <?php endif; ?> 
    <select name="<?php echo e($name ?? ''); ?>"
        <?php echo e($attributes->class([
            'form-select',
            'is-invalid' => isset($error) && !empty($error)
        ])); ?>

        id="input-<?php echo e($name ?? ''); ?>"
        <?php if(isset($required)): ?> required <?php endif; ?>
        >

        <?php if(isset($default)): ?>
            <option value=""><?php echo e($default); ?></option>
        <?php endif; ?>

        <?php if(isset($values)): ?>
            <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values_v => $values_n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($values_v); ?>" <?php if(@isset($value) && $values_v == $value): ?> selected <?php endif; ?>><?php echo e($values_n); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </select>
    <?php if(isset($error) && !empty($error)): ?>
        <div class="invalid-feedback"><?php echo e($error); ?></div>
    <?php endif; ?>
</div><?php /**PATH /var/www/resources/views/components/input/admin/select.blade.php ENDPATH**/ ?>