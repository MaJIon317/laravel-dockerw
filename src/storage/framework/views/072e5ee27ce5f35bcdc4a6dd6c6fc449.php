<?php $__env->startSection('title', __('admin/admin-roles.title')); ?>

<?php $__env->startSection('buttons'); ?>
    <button type="submit" class="btn btn-primary" form="form-default"><?php echo e(__('admin/header.save')); ?></button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form method="post" enctype="multipart/form-data" action="<?php echo e($action); ?>" id="form-default">
    <?php echo csrf_field(); ?>

    <?php if(isset($adminRole)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'name','value' => old('name') ?? $adminRole->name ?? null,'label' => 'Наименование','placeholder' => 'Наименование','error' => $errors->first('name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'name','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('name') ?? $adminRole->name ?? null),'label' => 'Наименование','placeholder' => 'Наименование','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('name'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0 form-label <?php if($errors->has('permission.assets')): ?> is-invalid <?php endif; ?> ">Разрешён просмотр</h5>
                    <?php if($errors->has('permission.assets')): ?>
                        <div class="invalid-feedback"><?php echo e($errors->first('permission.assets')); ?></div>
                    <?php endif; ?>
                    <div class="card-text mt-3 mb-3" style="max-height: 400px; overflow: auto;">
                        <?php
                            $checkeds = (old('permission') && isset(old('permission')['assets'])) ? old('permission')['assets'] : (old('permission') ? [] : ($adminRole->permission['assets'] ?? []));
                        ?>
                        <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permission[assets][]" value="<?php echo e($route); ?>" id="input-assets-<?php echo e($route); ?>"
                                    <?php if(in_array($route, $checkeds)): ?> checked <?php endif; ?>
                                >
                                <label class="form-check-label" for="input-assets-<?php echo e($route); ?>"><?php echo e($route); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                    <input type="checkbox" class="btn-check" id="btn-check-assets" autocomplete="off">
                    <label class="btn btn-primary" for="btn-check-assets">Выбрать / Снять Все</label>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0 form-label <?php if($errors->has('permission.modify')): ?> is-invalid <?php endif; ?>">Разрешено внесение изменений</h5>
                    <?php if($errors->has('permission.modify')): ?>
                        <div class="invalid-feedback"><?php echo e($errors->first('permission.modify')); ?></div>
                    <?php endif; ?>
                    <div class="card-text mt-3 mb-3" style="max-height: 400px; overflow: auto;">
                        <?php
                            $checkeds = (old('permission') && isset(old('permission')['modify'])) ? old('permission')['modify'] : (old('permission') ? [] : ($adminRole->permission['modify'] ?? []));
                        ?>
                        <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permission[modify][]" value="<?php echo e($route); ?>" id="input-modify-<?php echo e($route); ?>"
                                    <?php if(in_array($route, $checkeds)): ?> checked <?php endif; ?>
                                >
                                <label class="form-check-label" for="input-modify-<?php echo e($route); ?>"><?php echo e($route); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                    <input type="checkbox" class="btn-check" id="btn-check-modify" autocomplete="off">
                    <label class="btn btn-primary" for="btn-check-modify">Выбрать / Снять Все</label>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    const elements = document.querySelectorAll('.btn-check')

    elements.forEach(element => {
        element.addEventListener('click', event => {
            var inputs = element.previousElementSibling.querySelectorAll('input[type="checkbox"]')

            Array.prototype.forEach.call(inputs, function(cb) {
                cb.checked = event.target.checked;
            });
        })
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/admin-role-form.blade.php ENDPATH**/ ?>