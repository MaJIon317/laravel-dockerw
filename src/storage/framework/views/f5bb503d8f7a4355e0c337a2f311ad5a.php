<?php $__env->startSection('title', __('Sending an email :name', ['name' => $emailConstructor->name])); ?>

<?php $__env->startSection('buttons'); ?>
    <button type="submit" class="btn btn-primary" form="form-default"><?php echo e(__('admin/header.save')); ?></button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<fieldset>
    
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.email-constructor-recipients', ['emailConstructor' => $emailConstructor]);

$__html = app('livewire')->mount($__name, $__params, ''.e(now()).'1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <hr>
    <h2 class="mt-4"><?php echo e(__('Statistics')); ?></h2>
    <div class="row mb-5">
        <div class="col col-sm-8">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.email-constructor-stats', ['emailConstructor' => $emailConstructor]);

$__html = app('livewire')->mount($__name, $__params, ''.e(now()).'2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        <div class="col col-sm-4">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.email-constructor-click-map', ['emailConstructor' => $emailConstructor]);

$__html = app('livewire')->mount($__name, $__params, ''.e(now()).'3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/email-constructor-show.blade.php ENDPATH**/ ?>