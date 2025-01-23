<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'label',
    'toltip',
    'name',
    'value',
    'path',
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
    'name',
    'value',
    'path',
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
    <div class="form-label d-flex justify-content-between">
        <?php if(isset($toltip)): ?>
            <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="<?php echo e($toltip); ?>"><?php echo e($label); ?></span>
        <?php else: ?>
            <?php echo e($label); ?>

        <?php endif; ?>
        <?php if(isset($error) && !empty($error)): ?>
        <div class="position-relative d-flex">
            <div class="is-invalid"></div>
            <div class="invalid-feedback d-flex align-items-center m-0" data-bs-toggle="tooltip" data-bs-title="<?php echo e($error); ?>"><i class="fa-solid fa-circle-question"></i></div>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?> 
    <div class="d-flex flex-column" style="width: 100px;" data-image-upload>
        <input type="hidden" 
            name="<?php echo e($name ?? ''); ?>" 
            value="<?php echo e($value ?? ''); ?>"
            data-path="<?php echo e($path ?? 'demo'); ?>"
            <?php if(isset($required)): ?> required <?php endif; ?>
            >
        <img src="<?php echo e(resize($value ?? 'no-image.png', 100, 100)); ?>" data-image-original="<?php echo e(resize($value ?? 'no-image.png')); ?>" data-placeholder="<?php echo e(resize('no-image.png', 100, 100)); ?>" alt="." class="img-thumbnail">
        <div class="input-group flex-nowrap mt-1">
            <button type="button" class="btn btn-sm btn-primary w-100"><i class="fa-solid fa-upload"></i></button>
            <button type="button" class="btn btn-sm btn-danger"><i class="fa-regular fa-trash-can"></i></button>
        </div>
    </div>
</div>
<?php /**PATH /var/www/resources/views/components/input/admin/image.blade.php ENDPATH**/ ?>