<?php $__env->startSection('title', __('admin/holidays.title')); ?>

<?php $__env->startSection('buttons'); ?>
    <button type="submit" class="btn btn-primary" form="form-default"><?php echo e(__('admin/header.save')); ?></button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form method="post" enctype="multipart/form-data" action="<?php echo e($action); ?>" id="form-default">
    <?php echo csrf_field(); ?>

    <?php if(isset($holiday)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    
    <!-- Content tab -->
    <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'title','value' => old('title') ?? $holiday->title ?? null,'label' => 'Наименование','placeholder' => 'Наименование','error' => $errors->first('title')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'title','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('title') ?? $holiday->title ?? null),'label' => 'Наименование','placeholder' => 'Наименование','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('title'))]); ?>
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
            <?php if (isset($component)) { $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.image','data' => ['name' => 'image','value' => old('image') ?? $holiday->image ?? null,'path' => 'holidays','label' => 'Изображение','error' => $errors->first('image')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'image','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('image') ?? $holiday->image ?? null),'path' => 'holidays','label' => 'Изображение','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('image'))]); ?>
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

        <?php

            $items = array();

            foreach($categories as $item) {
                $items[$item->id] = $item->title;
            }

        ?>

        <?php if (isset($component)) { $__componentOriginal56a5e31ada8f232acfaa0a09be4158e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56a5e31ada8f232acfaa0a09be4158e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.select','data' => ['name' => 'category_id','values' => $items,'value' => old('category_id') ?? $holiday->category_id ?? null,'default' => 'Выбрать категорию','label' => 'Категория','error' => $errors->first('category_id')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'category_id','values' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($items),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('category_id') ?? $holiday->category_id ?? null),'default' => 'Выбрать категорию','label' => 'Категория','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('category_id'))]); ?>
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

            $items = array(
                1 => 'Январь',
                2 => 'Февраль',
                3 => 'Март',
                4 => 'Апрель',
                5 => 'Май',
                6 => 'Июнь',
                7 => 'Июль',
                8 => 'Август',
                9 => 'Сентябрь',
                10 => 'Октябрь',
                11 => 'Ноябрь',
                12 => 'Декабрь'
            );

        ?>

    <?php if (isset($component)) { $__componentOriginal56a5e31ada8f232acfaa0a09be4158e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56a5e31ada8f232acfaa0a09be4158e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.select','data' => ['name' => 'month','values' => $items,'value' => old('month') ?? $holiday->month ?? null,'label' => 'Месяц','error' => $errors->first('month')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'month','values' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($items),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('month') ?? $holiday->month ?? null),'label' => 'Месяц','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('month'))]); ?>
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

        for($i = 1; $i <= 31; $i += 1) {
            $items[$i] = $i;
        }

    ?>

    <?php if (isset($component)) { $__componentOriginal56a5e31ada8f232acfaa0a09be4158e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56a5e31ada8f232acfaa0a09be4158e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.select','data' => ['name' => 'day','values' => $items,'value' => old('day') ?? $holiday->day ?? null,'label' => 'День','error' => $errors->first('day')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'day','values' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($items),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('day') ?? $holiday->day ?? null),'label' => 'День','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('day'))]); ?>
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

</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/holiday-form.blade.php ENDPATH**/ ?>