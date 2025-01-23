<?php $__env->startSection('title', __('admin/categories.title')); ?>

<?php $__env->startSection('buttons'); ?>
    <button type="submit" class="btn btn-primary" form="form-default"><?php echo e(__('admin/header.save')); ?></button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form method="post" enctype="multipart/form-data" action="<?php echo e($action); ?>" id="form-default">
    <?php echo csrf_field(); ?>

    <?php if(isset($category)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    
    <ul class="nav nav-tabs mb-3" id="defaultTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">Основные</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="meta-tab" data-bs-toggle="tab" data-bs-target="#meta" type="button" role="tab" aria-controls="meta" aria-selected="false">Meta данные</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="filters-tab" data-bs-toggle="tab" data-bs-target="#filters" type="button" role="tab" aria-controls="filters" aria-selected="false">Фильтры</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="sorts-tab" data-bs-toggle="tab" data-bs-target="#sorts" type="button" role="tab" aria-controls="sorts" aria-selected="false">Сортировка</button>
        </li>
    </ul>
    <div class="tab-content" id="defaultTabContent">
        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                
            <?php

                $items = array();

                foreach($categories as $item) {
                    $items[$item->id] = $item->title;
                }

            ?>

            <?php if (isset($component)) { $__componentOriginal56a5e31ada8f232acfaa0a09be4158e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56a5e31ada8f232acfaa0a09be4158e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.select','data' => ['name' => 'parent_id','values' => $items,'value' => old('parent_id') ?? $category->parent_id ?? null,'default' => 'Выбрать категорию','label' => 'Родительская категория','error' => $errors->first('parent_id')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'parent_id','values' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($items),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('parent_id') ?? $category->parent_id ?? null),'default' => 'Выбрать категорию','label' => 'Родительская категория','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('parent_id'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56a5e31ada8f232acfaa0a09be4158e9)): ?>
<?php $attributes = $__attributesOriginal56a5e31ada8f232acfaa0a09be4158e9; ?>
<?php unset($__attributesOriginal56a5e31ada8f232acfaa0a09be4158e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56a5e31ada8f232acfaa0a09be4158e9)): ?>
<?php $component = $__componentOriginal56a5e31ada8f232acfaa0a09be4158e9; ?>
<?php unset($__componentOriginal56a5e31ada8f232acfaa0a09be4158e9); ?>
<?php endif; ?>
            
            <!-- Content tab -->
            <div class="row">
                <div class="col-auto">
                    <?php if (isset($component)) { $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.image','data' => ['name' => 'icon','value' => old('icon') ?? $category->icon ?? null,'path' => 'categories','label' => 'Иконка','error' => $errors->first('icon')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'icon','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('icon') ?? $category->icon ?? null),'path' => 'categories','label' => 'Иконка','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('icon'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.image','data' => ['name' => 'banner','value' => old('banner') ?? $category->banner ?? null,'path' => 'categories','label' => 'Баннер','error' => $errors->first('banner')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'banner','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('banner') ?? $category->banner ?? null),'path' => 'categories','label' => 'Баннер','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('banner'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'title','value' => old('title') ?? $category->title ?? null,'label' => 'Наименование','placeholder' => 'Наименование','error' => $errors->first('title')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'title','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('title') ?? $category->title ?? null),'label' => 'Наименование','placeholder' => 'Наименование','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('title'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['type' => 'text','name' => 'description','class' => 'editor','value' => old('description') ?? $category->description ?? null,'label' => 'Описание','placeholder' => 'Описание','error' => $errors->first('description')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'description','class' => 'editor','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('description') ?? $category->description ?? null),'label' => 'Описание','placeholder' => 'Описание','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('description'))]); ?>
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
        <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-tab">
            <!-- Content tab -->

            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'meta_title','value' => old('meta_title') ?? $category->meta_title ?? null,'label' => 'Заголовок','placeholder' => 'Заголовок','toltip' => 'Если оставить пусты, тогда заголовок будет скопирован с наименования','error' => $errors->first('meta_title')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'meta_title','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_title') ?? $category->meta_title ?? null),'label' => 'Заголовок','placeholder' => 'Заголовок','toltip' => 'Если оставить пусты, тогда заголовок будет скопирован с наименования','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('meta_title'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['type' => 'text','name' => 'meta_description','value' => old('meta_description') ?? $category->meta_description ?? null,'label' => 'Описание','placeholder' => 'Описание','error' => $errors->first('meta_description')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'meta_description','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_description') ?? $category->meta_description ?? null),'label' => 'Описание','placeholder' => 'Описание','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('meta_description'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['type' => 'text','name' => 'meta_keywords','value' => old('meta_keywords') ?? $category->meta_keywords ?? null,'label' => 'Ключевые слова','placeholder' => 'Ключевые слова','error' => $errors->first('meta_keywords')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'meta_keywords','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_keywords') ?? $category->meta_keywords ?? null),'label' => 'Ключевые слова','placeholder' => 'Ключевые слова','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('meta_keywords'))]); ?>
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

        <div class="tab-pane fade" id="filters" role="tabpanel" aria-labelledby="filters-tab">
            <!-- Content tab -->
                <div class="alert alert-info">Если не выбран ни один фильтр, тогда будет выведен список фильтров по-умолчанию на странице категории</div>

                <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginalffcba3288e043ebd460b02d6158f8b61 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalffcba3288e043ebd460b02d6158f8b61 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.checkbox','data' => ['id' => 'filters-'.e($filter->id).'','name' => 'filter_category['.e($filter->id).']','value' => $filter->id,'placeholder' => 'Статус','label' => ''.e($filter->name).'','checked' => in_array($filter->id, old('filter_category') ? old('filter_category') : ($filter_category ?? null))]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'filters-'.e($filter->id).'','name' => 'filter_category['.e($filter->id).']','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($filter->id),'placeholder' => 'Статус','label' => ''.e($filter->name).'','checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(in_array($filter->id, old('filter_category') ? old('filter_category') : ($filter_category ?? null)))]); ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <!-- END Content tab -->
        </div>

        <div class="tab-pane fade" id="sorts" role="tabpanel" aria-labelledby="sorts-tab">
            <!-- Content tab -->
                <div class="alert alert-info">Если не выбрана ни одна сортировка, тогда будет выведен список сортировки по-умолчанию на странице категории</div>

                <?php $__currentLoopData = config('general.category_sorts.all'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginalffcba3288e043ebd460b02d6158f8b61 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalffcba3288e043ebd460b02d6158f8b61 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.checkbox','data' => ['id' => 'sorts-'.e($sort).'','name' => 'sorts[]','value' => $sort,'label' => ''.e(__('sort.' . $sort)).'','placeholder' => 'Статус','checked' => old('sorts.' . $sort) ?? isset($category->sorts) && in_array($sort, $category->sorts) ?? null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'sorts-'.e($sort).'','name' => 'sorts[]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort),'label' => ''.e(__('sort.' . $sort)).'','placeholder' => 'Статус','checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('sorts.' . $sort) ?? isset($category->sorts) && in_array($sort, $category->sorts) ?? null)]); ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <!-- END Content tab -->
        </div>

    </div>

</form>

<?php echo app('Illuminate\Foundation\Vite')('resources/js/admin/editor.js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/category-form.blade.php ENDPATH**/ ?>