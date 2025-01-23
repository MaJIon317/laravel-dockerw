<!DOCTYPE html>
<html lang="ru">
    <head>
        <base href="<?php echo e(route('admin.dashboard')); ?>">
        <meta charset="utf-8">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
        <title><?php echo $__env->yieldContent('title'); ?></title>
 
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/admin/style.css'); ?>
    </head>
    <body class="sb-nav-fixed">
        <?php if (empty(trim($__env->yieldContent('header_hidden')))): ?>
            <?php if (isset($component)) { $__componentOriginal45d9cbba1e84739af2366cafaf311004 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45d9cbba1e84739af2366cafaf311004 = $attributes; } ?>
<?php $component = App\View\Components\Admin\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Admin\Header::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45d9cbba1e84739af2366cafaf311004)): ?>
<?php $attributes = $__attributesOriginal45d9cbba1e84739af2366cafaf311004; ?>
<?php unset($__attributesOriginal45d9cbba1e84739af2366cafaf311004); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45d9cbba1e84739af2366cafaf311004)): ?>
<?php $component = $__componentOriginal45d9cbba1e84739af2366cafaf311004; ?>
<?php unset($__componentOriginal45d9cbba1e84739af2366cafaf311004); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>

        <?php if (empty(trim($__env->yieldContent('header_hidden')))): ?>
            <?php echo $__env->make('admin.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php echo app('Illuminate\Foundation\Vite')('resources/js/admin/script.js'); ?>
    </body>
</html><?php /**PATH /var/www/resources/views/layouts/admin.blade.php ENDPATH**/ ?>