<?php $__env->startSection('title', __('admin/news.title')); ?>

<?php $__env->startSection('buttons'); ?>
    <button type="submit" class="btn btn-primary" form="form-default"><?php echo e(__('admin/header.save')); ?></button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form method="post" enctype="multipart/form-data" action="<?php echo e($action); ?>" id="form-default">
    <?php echo csrf_field(); ?>

    <?php if(isset($news)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    
    <ul class="nav nav-tabs mb-3" id="defaultTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">Основные</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="meta-tab" data-bs-toggle="tab" data-bs-target="#meta" type="button" role="tab" aria-controls="meta" aria-selected="false">Meta данные</button>
        </li>
    </ul>
    <div class="tab-content" id="defaultTabContent">
        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
            
            <!-- Content tab -->
            <div class="row">
                <div class="col-auto">
                    <?php if (isset($component)) { $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.image','data' => ['name' => 'image','value' => old('image') ?? $news->image ?? null,'path' => 'news','label' => 'Изображение','error' => $errors->first('image')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'image','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('image') ?? $news->image ?? null),'path' => 'news','label' => 'Изображение','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('image'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $attributes = $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $component = $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>

                </div>
                <div class="col-auto">
                    <?php if (isset($component)) { $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.image','data' => ['name' => 'banner','value' => old('banner') ?? $news->banner ?? null,'path' => 'news','label' => 'Баннер','error' => $errors->first('banner')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'banner','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('banner') ?? $news->banner ?? null),'path' => 'news','label' => 'Баннер','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('banner'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $attributes = $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $component = $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>
                </div>
            </div>

            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'title','value' => old('title') ?? $news->title ?? null,'label' => 'Наименование','placeholder' => 'Наименование','error' => $errors->first('title')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'title','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('title') ?? $news->title ?? null),'label' => 'Наименование','placeholder' => 'Наименование','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('title'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['type' => 'text','name' => 'description','class' => 'editor','value' => old('description') ?? $news->description ?? null,'label' => 'Описание','placeholder' => 'Описание','error' => $errors->first('description')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'description','class' => 'editor','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('description') ?? $news->description ?? null),'label' => 'Описание','placeholder' => 'Описание','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('description'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'datetime-local','name' => 'publish_date','value' => old('publish_date') ?? $news->publish_date ?? null,'label' => 'Опубликовать','placeholder' => 'Опубликовать','toltip' => 'Вы можете указать дату и время, когда отобразить статью пользователям','error' => $errors->first('publish_date')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'datetime-local','name' => 'publish_date','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('publish_date') ?? $news->publish_date ?? null),'label' => 'Опубликовать','placeholder' => 'Опубликовать','toltip' => 'Вы можете указать дату и время, когда отобразить статью пользователям','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('publish_date'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.checkbox','data' => ['type' => 'checkbox','name' => 'status','value' => 1,'label' => 'Статус','placeholder' => 'Статус','error' => $errors->first('status'),'checked' => (old('status') || ($news->status ?? null))]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox','name' => 'status','value' => 1,'label' => 'Статус','placeholder' => 'Статус','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('status')),'checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((old('status') || ($news->status ?? null)))]); ?>
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
 
            <!-- END Content tab -->

        </div>
        <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-tab">
            <!-- Content tab -->

            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'meta_title','value' => old('meta_title') ?? $news->meta_title ?? null,'label' => 'Заголовок','placeholder' => 'Заголовок','toltip' => 'Если оставить пусты, тогда заголовок будет скопирован с наименования','error' => $errors->first('meta_title')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'meta_title','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_title') ?? $news->meta_title ?? null),'label' => 'Заголовок','placeholder' => 'Заголовок','toltip' => 'Если оставить пусты, тогда заголовок будет скопирован с наименования','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('meta_title'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['type' => 'text','name' => 'meta_description','value' => old('meta_description') ?? $news->meta_description ?? null,'label' => 'Описание','placeholder' => 'Описание','error' => $errors->first('meta_description')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'meta_description','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_description') ?? $news->meta_description ?? null),'label' => 'Описание','placeholder' => 'Описание','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('meta_description'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['type' => 'text','name' => 'meta_keywords','value' => old('meta_keywords') ?? $news->meta_keywords ?? null,'label' => 'Ключевые слова','placeholder' => 'Ключевые слова','error' => $errors->first('meta_keywords')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'meta_keywords','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_keywords') ?? $news->meta_keywords ?? null),'label' => 'Ключевые слова','placeholder' => 'Ключевые слова','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('meta_keywords'))]); ?>
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
        </div>
    </div>

</form>

<?php echo app('Illuminate\Foundation\Vite')('resources/js/admin/editor.js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/news-form.blade.php ENDPATH**/ ?>