<?php $__env->startSection('title', __('admin/faqs.title')); ?>

<?php $__env->startSection('buttons'); ?>
    <button type="submit" class="btn btn-primary" form="form-default"><?php echo e(__('admin/header.save')); ?></button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form method="post" enctype="multipart/form-data" action="<?php echo e($action); ?>" id="form-default">
    <?php echo csrf_field(); ?>

    <?php if(isset($faq)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
 
    <!-- Content tab -->
    <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'question','value' => old('question') ?? $faq->question ?? null,'label' => 'Вопрос','placeholder' => 'Вопрос','error' => $errors->first('question')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'question','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('question') ?? $faq->question ?? null),'label' => 'Вопрос','placeholder' => 'Вопрос','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('question'))]); ?>
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
    
    <?php if (isset($component)) { $__componentOriginalc490dc6616c06302941647735bdb8987 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc490dc6616c06302941647735bdb8987 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['type' => 'text','name' => 'answer','class' => 'editor','value' => old('answer') ?? $faq->answer ?? null,'label' => 'Ответ','placeholder' => 'Ответ','error' => $errors->first('answer')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'answer','class' => 'editor','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('answer') ?? $faq->answer ?? null),'label' => 'Ответ','placeholder' => 'Ответ','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('answer'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc490dc6616c06302941647735bdb8987)): ?>
<?php $attributes = $__attributesOriginalc490dc6616c06302941647735bdb8987; ?>
<?php unset($__attributesOriginalc490dc6616c06302941647735bdb8987); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc490dc6616c06302941647735bdb8987)): ?>
<?php $component = $__componentOriginalc490dc6616c06302941647735bdb8987; ?>
<?php unset($__componentOriginalc490dc6616c06302941647735bdb8987); ?>
<?php endif; ?>

    <!-- END Content tab -->

</form>

<?php echo app('Illuminate\Foundation\Vite')('resources/js/admin/editor.js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/faq-form.blade.php ENDPATH**/ ?>