<?php $__env->startSection('title', __('admin/email-constructors.title')); ?>

<?php $__env->startSection('buttons'); ?>
    <button type="submit" class="btn btn-primary" form="form-default"><?php echo e(__('admin/header.save')); ?></button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form method="post" enctype="multipart/form-data" action="<?php echo e($action); ?>" id="form-default">
    <?php echo csrf_field(); ?>

    <?php if(isset($emailConstructor)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    
    <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'name','value' => old('name') ?? $emailConstructor->name ?? null,'label' => 'Название','placeholder' => 'Название','toltip' => 'Отображается только в административной панели','error' => $errors->first('name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'name','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('name') ?? $emailConstructor->name ?? null),'label' => 'Название','placeholder' => 'Название','toltip' => 'Отображается только в административной панели','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('name'))]); ?>
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

    <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'subject','value' => old('subject') ?? $emailConstructor->subject ?? null,'label' => 'Заголовок письма','placeholder' => 'Заголовок письма','error' => $errors->first('subject')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'subject','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('subject') ?? $emailConstructor->subject ?? null),'label' => 'Заголовок письма','placeholder' => 'Заголовок письма','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('subject'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['name' => 'text','value' => old('text') ?? $emailConstructor->text ?? null,'label' => 'Текстовое содержимое письма','placeholder' => 'Введите текст','toltip' => 'Отображается где недоступен HTML','error' => $errors->first('text')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'text','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('text') ?? $emailConstructor->text ?? null),'label' => 'Текстовое содержимое письма','placeholder' => 'Введите текст','toltip' => 'Отображается где недоступен HTML','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('text'))]); ?>
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

    <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'tags','value' => old('tags') ?? $emailConstructor->tags ?? null,'label' => 'Теги','placeholder' => 'Теги','toltip' => 'Указывать через запятую','error' => $errors->first('tags')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'tags','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('tags') ?? $emailConstructor->tags ?? null),'label' => 'Теги','placeholder' => 'Теги','toltip' => 'Указывать через запятую','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('tags'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['name' => 'html','id' => 'input-html','value' => old('html') ?? $emailConstructor->html ?? null,'error' => $errors->first('html'),'class' => 'd-none']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'html','id' => 'input-html','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('html') ?? $emailConstructor->html ?? null),'error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('html')),'class' => 'd-none']); ?>
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

    <?php if (isset($component)) { $__componentOriginalc490dc6616c06302941647735bdb8987 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc490dc6616c06302941647735bdb8987 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['name' => 'json','id' => 'input-json','value' => old('json') ?? $emailConstructor->json ?? null,'error' => $errors->first('json'),'class' => 'd-none']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'json','id' => 'input-json','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('json') ?? $emailConstructor->json ?? null),'error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('json')),'class' => 'd-none']); ?>
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
 
</form>

<fieldset>
    <legend>HTML содержимое письма</legend>

    <?php if(!config('settings.unlayer_project_id') || !config('settings.unlayer_template_id')): ?>
        <div class="alert alert-danger">В общих <a href="<?php echo e(route('admin.settings.index')); ?>#unlayer-tab" target="_blank">настройках</a> во вкладке <strong>unlayer.com</strong> производите настройки</div>
    <?php else: ?>
        <div id="editor-container" class="form-control" data-projectId="<?php echo e(config('settings.unlayer_project_id')); ?>" data-templateId="<?php echo e(config('settings.unlayer_template_id')); ?>" data-mergeTags="<?php echo e(json_encode(config('email_constructor.merge_tags'), true)); ?>"></div>
    <?php endif; ?>
</fieldset>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/email-constructor-form.blade.php ENDPATH**/ ?>