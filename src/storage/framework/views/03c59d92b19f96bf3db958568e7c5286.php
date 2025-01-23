<div>
   
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                <i class="fa-regular fa-envelope"></i>
                Почтовая рассылка
            </span>

            <!--[if BLOCK]><![endif]--><?php if($emailConstructors->count()): ?>
                <select wire:model.change="email_constuctor" class="form-select">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $emailConstructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($element->id); ?>" <?php if($emailConstructor == $element): ?> selected <?php endif; ?>><?php echo e($element->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        </div>
        <div class="card-body">
            <!--[if BLOCK]><![endif]--><?php if($emailConstructor): ?>
                <div class="row">
                    <div class="col col-sm-8">
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.email-constructor-stats', ['emailConstructor' => $emailConstructor]);

$__html = app('livewire')->mount($__name, $__params, ''.e(now()).'', $__slots ?? [], get_defined_vars());

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

$__html = app('livewire')->mount($__name, $__params, ''.e(now()).'', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-info"><?php echo e(__('Couldn\'t find the data')); ?></div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>

</div>
<?php /**PATH /var/www/resources/views/admin/dasboard/email-constructor.blade.php ENDPATH**/ ?>