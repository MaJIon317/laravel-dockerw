<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'id',
    'label',
    'toltip',
    'name',
    'value',
    'placeholder',
    'required',
    'checked',
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
    'id',
    'label',
    'toltip',
    'name',
    'value',
    'placeholder',
    'required',
    'checked',
    'error',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="mb-3 form-check form-switch">
    <input 
    <?php echo e($attributes->class([
        'form-check-input',
        'is-invalid' => isset($error) && !empty($error)
    ])); ?>

    type="checkbox"
    <?php if(isset($name)): ?> name="<?php echo e($name); ?>" <?php endif; ?> 
    value="<?php echo e($value ?? ''); ?>" 
    <?php if(isset($placeholder)): ?> placeholder="<?php echo e($placeholder); ?>" <?php endif; ?> 
    <?php if(isset($required)): ?> required <?php endif; ?>
    <?php if(isset($checked) && $checked): ?> checked <?php endif; ?>
    <?php if(isset($id)): ?> id="<?php echo e($id); ?>" <?php else: ?> id="input-<?php echo e($name ?? ''); ?>" <?php endif; ?>
    >

    <?php if(isset($label)): ?>
    <label class="form-check-label" <?php if(isset($id)): ?> for="<?php echo e($id); ?>" <?php else: ?> for="input-<?php echo e($name ?? ''); ?>" <?php endif; ?>>
        <?php if(isset($toltip)): ?>
            <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="<?php echo e($toltip); ?>"><?php echo e($label); ?></span>
        <?php else: ?>
            <?php echo e($label); ?>

        <?php endif; ?>
    </label>
    <?php endif; ?> 

    <?php if(isset($error) && !empty($error)): ?>
        <div class="invalid-feedback"><?php echo e($error); ?></div>
    <?php endif; ?>
</div>

<?php /**PATH /var/www/resources/views/components/input/admin/checkbox.blade.php ENDPATH**/ ?>