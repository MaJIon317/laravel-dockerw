<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'label',
    'toltip',
    'type',
    'name',
    'value',
    'placeholder',
    'required',
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
    'label',
    'toltip',
    'type',
    'name',
    'value',
    'placeholder',
    'required',
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
    <label class="form-label" for="input-<?php echo e($name ?? ''); ?>">
        <?php if(isset($toltip)): ?>
            <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="<?php echo e($toltip); ?>"><?php echo e($label); ?></span>
        <?php else: ?>
            <?php echo e($label); ?>

        <?php endif; ?>
    </label>
    <?php endif; ?> 
    <input 
    <?php echo e($attributes->class([
        'form-control',
        'is-invalid' => isset($error) && !empty($error)
    ])); ?>

    <?php if(isset($type)): ?> type="<?php echo e($type); ?>" <?php endif; ?> 
    <?php if(isset($name)): ?> name="<?php echo e($name); ?>" <?php endif; ?> 
    value="<?php echo e($value ?? ''); ?>" 
    <?php if(isset($placeholder)): ?> placeholder="<?php echo e($placeholder); ?>" <?php endif; ?> 
    <?php if(isset($required)): ?> required <?php endif; ?>
    id="input-<?php echo e($name ?? ''); ?>"
    autocomplete="off"
        readonly
        onfocus="this.removeAttribute('readonly');"
        onblur="this.setAttribute('readonly', true);"
    >

    <?php if(isset($error) && !empty($error)): ?>
        <div class="invalid-feedback"><?php echo e($error); ?></div>
    <?php endif; ?>
</div>

<?php /**PATH /var/www/resources/views/components/input/admin/text.blade.php ENDPATH**/ ?>