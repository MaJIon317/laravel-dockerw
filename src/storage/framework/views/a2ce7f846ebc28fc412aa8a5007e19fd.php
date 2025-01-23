<?php $__env->startSection('title', __('admin/coupons.title')); ?>

<?php $__env->startSection('buttons'); ?>
    <button type="submit" class="btn btn-primary" form="form-default"><?php echo e(__('admin/header.save')); ?></button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form method="post" enctype="multipart/form-data" action="<?php echo e($action); ?>" id="form-default">
    <?php echo csrf_field(); ?>

    <?php if(isset($coupon)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    
    <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'code','value' => old('code') ?? $coupon->code ?? null,'label' => 'Код купона','placeholder' => 'Код купона','error' => $errors->first('code')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'code','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('code') ?? $coupon->code ?? null),'label' => 'Код купона','placeholder' => 'Код купона','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('code'))]); ?>
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
    
    <?php if (isset($component)) { $__componentOriginalffcba3288e043ebd460b02d6158f8b61 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalffcba3288e043ebd460b02d6158f8b61 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.checkbox','data' => ['type' => 'checkbox','name' => 'percent','value' => 1,'label' => 'Скидка в процентах (%)','placeholder' => 'Скидка в процентах (%)','error' => $errors->first('percent'),'checked' => (old('percent') || ($coupon->percent ?? null))]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox','name' => 'percent','value' => 1,'label' => 'Скидка в процентах (%)','placeholder' => 'Скидка в процентах (%)','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('percent')),'checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((old('percent') || ($coupon->percent ?? null)))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalffcba3288e043ebd460b02d6158f8b61)): ?>
<?php $attributes = $__attributesOriginalffcba3288e043ebd460b02d6158f8b61; ?>
<?php unset($__attributesOriginalffcba3288e043ebd460b02d6158f8b61); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalffcba3288e043ebd460b02d6158f8b61)): ?>
<?php $component = $__componentOriginalffcba3288e043ebd460b02d6158f8b61; ?>
<?php unset($__componentOriginalffcba3288e043ebd460b02d6158f8b61); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'nubmer','name' => 'discount','value' => old('discount') ?? $coupon->discount ?? null,'label' => 'Скидка','placeholder' => 'Скидка','error' => $errors->first('discount')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'nubmer','name' => 'discount','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('discount') ?? $coupon->discount ?? null),'label' => 'Скидка','placeholder' => 'Скидка','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('discount'))]); ?>
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
        <div class="col-auto">
            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'datetime-local','name' => 'publish_start','value' => old('publish_start') ?? $coupon->publish_start ?? null,'label' => 'Действует от','error' => $errors->first('publish_start')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'datetime-local','name' => 'publish_start','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('publish_start') ?? $coupon->publish_start ?? null),'label' => 'Действует от','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('publish_start'))]); ?>
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
        </div>
        <div class="col-auto">
            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'datetime-local','name' => 'publish_end','value' => old('publish_end') ?? $coupon->publish_end ?? null,'label' => 'Действует до','error' => $errors->first('publish_end')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'datetime-local','name' => 'publish_end','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('publish_end') ?? $coupon->publish_end ?? null),'label' => 'Действует до','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('publish_end'))]); ?>
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
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'nubmer','name' => 'count_uses','value' => old('count_uses') ?? $coupon->count_uses ?? null,'label' => 'Максимальное кол-во использований','placeholder' => 'Максимальное кол-во использований','error' => $errors->first('count_uses')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'nubmer','name' => 'count_uses','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('count_uses') ?? $coupon->count_uses ?? null),'label' => 'Максимальное кол-во использований','placeholder' => 'Максимальное кол-во использований','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('count_uses'))]); ?>
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
     
    <?php if (isset($component)) { $__componentOriginalffcba3288e043ebd460b02d6158f8b61 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalffcba3288e043ebd460b02d6158f8b61 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.checkbox','data' => ['type' => 'checkbox','name' => 'status','value' => 1,'label' => 'Статус','placeholder' => 'Статус','error' => $errors->first('status'),'checked' => (old('status') || ($coupon->status ?? null))]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox','name' => 'status','value' => 1,'label' => 'Статус','placeholder' => 'Статус','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('status')),'checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((old('status') || ($coupon->status ?? null)))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalffcba3288e043ebd460b02d6158f8b61)): ?>
<?php $attributes = $__attributesOriginalffcba3288e043ebd460b02d6158f8b61; ?>
<?php unset($__attributesOriginalffcba3288e043ebd460b02d6158f8b61); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalffcba3288e043ebd460b02d6158f8b61)): ?>
<?php $component = $__componentOriginalffcba3288e043ebd460b02d6158f8b61; ?>
<?php unset($__componentOriginalffcba3288e043ebd460b02d6158f8b61); ?>
<?php endif; ?>
 
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/coupon-form.blade.php ENDPATH**/ ?>