<?php
    $marketplaces = array(
        'ozon' => 'Ozon',
        'wb' => 'Wildberries',
    );

?>



<?php $__env->startSection('title', __('admin/products.title')); ?>

<?php $__env->startSection('buttons'); ?>
    <button type="submit" class="btn btn-primary" form="form-default"><?php echo e(__('admin/header.save')); ?></button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form method="post" enctype="multipart/form-data" action="<?php echo e($action); ?>" id="form-default">
    <?php echo csrf_field(); ?>

    <?php if(isset($product)): ?>
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
            <button class="nav-link" id="marketplace-tab" data-bs-toggle="tab" data-bs-target="#marketplace" type="button" role="tab" aria-controls="marketplace" aria-selected="false">Маркетплейсы</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="lable-tab" data-bs-toggle="tab" data-bs-target="#lable" type="button" role="tab" aria-controls="lable" aria-selected="false">Лейблы</button>
        </li>

    </ul>
    <div class="tab-content" id="defaultTabContent">
        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'article','value' => old('article') ?? $product->article ?? null,'label' => 'Артикул','placeholder' => 'Артикул','error' => $errors->first('article')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'article','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('article') ?? $product->article ?? null),'label' => 'Артикул','placeholder' => 'Артикул','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('article'))]); ?>
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

            <?php

                $items = array();

                foreach($categories as $item) {
                    $items[$item->id] = $item->title;
                }

            ?>

            <?php if (isset($component)) { $__componentOriginal56a5e31ada8f232acfaa0a09be4158e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56a5e31ada8f232acfaa0a09be4158e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.select','data' => ['name' => 'category_id','values' => $items,'value' => old('category_id') ?? $product->category_id ?? null,'default' => 'Выбрать категорию товара','label' => 'Категория','error' => $errors->first('category_id')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'category_id','values' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($items),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('category_id') ?? $product->category_id ?? null),'default' => 'Выбрать категорию товара','label' => 'Категория','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('category_id'))]); ?>
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

            <?php

                $items = array();

                foreach($discount_groups as $item) {
                    $items[$item->id] = __('admin/products.discount_group', [
                        'title' => $item->title
                    ]);
                }

            ?>

            <?php if (isset($component)) { $__componentOriginal56a5e31ada8f232acfaa0a09be4158e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56a5e31ada8f232acfaa0a09be4158e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.select','data' => ['name' => 'discount_group_id','values' => $items,'value' => old('discount_group_id') ?? $product->discount_group_id ?? null,'default' => 'Выбрать группу скидок','label' => 'Группа скидок','error' => $errors->first('discount_group_id')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'discount_group_id','values' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($items),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('discount_group_id') ?? $product->discount_group_id ?? null),'default' => 'Выбрать группу скидок','label' => 'Группа скидок','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('discount_group_id'))]); ?>
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

            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'price','value' => old('price') ?? $product->price ?? null,'label' => 'Базовая цена','placeholder' => 'Базовая цена','error' => $errors->first('price')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'price','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('price') ?? $product->price ?? null),'label' => 'Базовая цена','placeholder' => 'Базовая цена','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('price'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'discount','value' => old('discount') ?? $product->discount ?? null,'label' => 'Цена со скидкой','placeholder' => 'Цена со скидкой','error' => $errors->first('discount')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'discount','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('discount') ?? $product->discount ?? null),'label' => 'Цена со скидкой','placeholder' => 'Цена со скидкой','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('discount'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'number','name' => 'minimum','value' => old('minimum') ?? $product->minimum ?? null,'label' => 'Минимальная партия','placeholder' => 'Минимальная партия','error' => $errors->first('minimum')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','name' => 'minimum','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('minimum') ?? $product->minimum ?? null),'label' => 'Минимальная партия','placeholder' => 'Минимальная партия','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('minimum'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'number','name' => 'stock','value' => old('stock') ?? $product->stock ?? null,'label' => 'Остаток на складе','placeholder' => 'Остаток на складе','error' => $errors->first('stock')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','name' => 'stock','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('stock') ?? $product->stock ?? null),'label' => 'Остаток на складе','placeholder' => 'Остаток на складе','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('stock'))]); ?>
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
                 
         
            <!-- Content tab -->

            <div class="mb-3">
                <labe class="form-label">Изображения</label>
                
                <?php ($images_row = 0); ?>
                            
                <div class="row gap-3">
                    <?php if($product->images): ?>
                        <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-auto position-relative" data-sort-item>
                                <div class="div">
                                    <?php if (isset($component)) { $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.image','data' => ['name' => 'images['.e($images_row).']','value' => $image,'path' => 'products']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'images['.e($images_row).']','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($image),'path' => 'products']); ?>
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

                                    <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>
                                </div>
                            </div>
                            <?php ($images_row++); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="col-100 text-end mt-3">
                    <button type="button" class="btn btn-primary" onclick="addImage(this)"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>
             
            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'title','value' => old('title') ?? $product->title ?? null,'label' => 'Наименование','placeholder' => 'Наименование','error' => $errors->first('title')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'title','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('title') ?? $product->title ?? null),'label' => 'Наименование','placeholder' => 'Наименование','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('title'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['type' => 'text','name' => 'description','class' => 'editor','value' => old('description') ?? $product->description ?? null,'label' => 'Описание','placeholder' => 'Описание','error' => $errors->first('description')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'description','class' => 'editor','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('description') ?? $product->description ?? null),'label' => 'Описание','placeholder' => 'Описание','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('description'))]); ?>
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
 
            <?php if (isset($component)) { $__componentOriginalffcba3288e043ebd460b02d6158f8b61 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalffcba3288e043ebd460b02d6158f8b61 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.checkbox','data' => ['type' => 'checkbox','name' => 'status','value' => 1,'label' => 'Статус','placeholder' => 'Статус','error' => $errors->first('status'),'checked' => (old('status') || ($product->status ?? null))]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox','name' => 'status','value' => 1,'label' => 'Статус','placeholder' => 'Статус','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('status')),'checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((old('status') || ($product->status ?? null)))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'meta_title','value' => old('meta_title') ?? $product->meta_title ?? null,'label' => 'Заголовок','placeholder' => 'Заголовок','toltip' => 'Если оставить пусты, тогда заголовок будет скопирован с наименования','error' => $errors->first('meta_title')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'meta_title','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_title') ?? $product->meta_title ?? null),'label' => 'Заголовок','placeholder' => 'Заголовок','toltip' => 'Если оставить пусты, тогда заголовок будет скопирован с наименования','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('meta_title'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['type' => 'text','name' => 'meta_description','value' => old('meta_description') ?? $product->meta_description ?? null,'label' => 'Описание','placeholder' => 'Описание','error' => $errors->first('meta_description')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'meta_description','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_description') ?? $product->meta_description ?? null),'label' => 'Описание','placeholder' => 'Описание','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('meta_description'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['type' => 'text','name' => 'meta_keywords','value' => old('meta_keywords') ?? $product->meta_keywords ?? null,'label' => 'Ключевые слова','placeholder' => 'Ключевые слова','error' => $errors->first('meta_keywords')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'meta_keywords','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_keywords') ?? $product->meta_keywords ?? null),'label' => 'Ключевые слова','placeholder' => 'Ключевые слова','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('meta_keywords'))]); ?>
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

        <div class="tab-pane fade" id="marketplace" role="tabpanel" aria-labelledby="marketplace-tab">
            <!-- Content tab -->

            <?php $__currentLoopData = $marketplaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marketplace_key => $marketplace): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'marketplace['.e($marketplace_key).']','value' => old('marketplace.' . $marketplace_key) ?? isset($product->marketplace[$marketplace_key]) ? $product->marketplace[$marketplace_key] : null,'label' => ''.e($marketplace).'','placeholder' => ''.e($marketplace).'','error' => $errors->first('marketplace')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'marketplace['.e($marketplace_key).']','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('marketplace.' . $marketplace_key) ?? isset($product->marketplace[$marketplace_key]) ? $product->marketplace[$marketplace_key] : null),'label' => ''.e($marketplace).'','placeholder' => ''.e($marketplace).'','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('marketplace'))]); ?>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

             <!-- END Content tab -->
        </div>

        <div class="tab-pane fade" id="lable" role="tabpanel" aria-labelledby="lable-tab">
            <!-- Content tab -->

            <?php if (isset($component)) { $__componentOriginalffcba3288e043ebd460b02d6158f8b61 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalffcba3288e043ebd460b02d6158f8b61 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.checkbox','data' => ['type' => 'checkbox','name' => 'hit','value' => 1,'label' => 'Хит продаж','placeholder' => 'Хит продаж','error' => $errors->first('hit'),'checked' => (old('hit') || ($product->hit ?? null))]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox','name' => 'hit','value' => 1,'label' => 'Хит продаж','placeholder' => 'Хит продаж','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('hit')),'checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((old('hit') || ($product->hit ?? null)))]); ?>
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
    </div>

</form>

<?php echo app('Illuminate\Foundation\Vite')('resources/js/admin/editor.js'); ?>


<script>
    /* Banner menu */
    var images_row = <?php echo e($images_row); ?>;

    function addImage(_this)
    {
        html  = '<div class="col-auto position-relative" data-sort-item>';
        html += '   <div class="div">';
        html += '       <div class="mb-3">';
        html += '           <div class="d-flex flex-column" style="width: 100px;" data-image-upload>';
        html += '               <input type="hidden" name="images[' + images_row + ']" value="" data-path="products">';
        html += '               <img src="<?php echo e(resize('no-image.png', 100, 100)); ?>" data-placeholder="<?php echo e(resize('no-image.png', 100, 100)); ?>" alt="." class="img-thumbnail">';
        html += '               <div class="input-group flex-nowrap mt-1">';
        html += '                   <button type="button" class="btn btn-sm btn-primary w-100"><i class="fa-solid fa-upload"></i></button>';
        html += '                   <button type="button" class="btn btn-sm btn-danger"><i class="fa-regular fa-trash-can"></i></button>';
        html += '               </div>';
        html += '           </div>';
        html += '       </div>';
        html += '       <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>';
        html += '   </div>';
        html += '</div>';

        _this.parentNode.previousElementSibling.insertAdjacentHTML('beforeend', html)

        images_row++;

        imageUpload()
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/product-form.blade.php ENDPATH**/ ?>