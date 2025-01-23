<?php
    $lang = str_replace('_', '-', app()->getLocale());
?>

<!DOCTYPE html>
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo e($lang); ?>" lang="<?php echo e($lang); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="<?php echo e(route('home')); ?>" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e($meta_title ?? $title ?? config('settings.meta.home.title', 'Page Title')); ?></title>
        <meta name="description" content="<?php echo e($meta_description ?? config('settings.meta.home.description', 'Page Description')); ?>">
        <meta name="keywords" content="<?php echo e($meta_keywords ?? config('settings.meta.home.keyword', 'Page Keywords')); ?>">

        <!-- Favicons -->

        <!-- END Favicons -->

        <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>

        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    </head>
    <body x-data="{}">
        <?php if (isset($component)) { $__componentOriginal2a2e454b2e62574a80c8110e5f128b60 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60 = $attributes; } ?>
<?php $component = App\View\Components\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Header::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $attributes = $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $component = $__componentOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>

        <?php if(isset($title) || isset($breadcrumbs) || isset($back)): ?>
            <section class="section section--breadcrumbs">
                <div class="container">
                    <?php if(isset($back)): ?>
                        <a href="<?php echo e($back['link']); ?>" class="btn btn--white btn--sm back" wire:navigate>
                            <svg width="16" height="8">
                                <use xlink:href="storage/image/sprite.svg#back"></use>
                            </svg>
                            <span><?php echo e($back['name']); ?></span>
                        </a>
                    <?php endif; ?>

                    <?php echo $__env->make('partials.breadcrumbs', [$breadcrumbs ?? []], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php if(isset($title)): ?>
                        <h1><?php echo $title; ?></h1>
                    <?php endif; ?>

                    <?php if(isset($description)): ?>
                        <div class="description"><?php echo $description; ?></div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if(session()->has('message')): ?>
            <div class="alert alert-success">
                <?php echo e(session('message')); ?>

            </div>
        <?php endif; ?>

        <?php if(session()->has('toast_success')): ?>
            <div id="toast__success" style="display: none;">
                <?php echo e(session('toast_success')); ?>

            </div>
        <?php endif; ?>

        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('offline');

$__html = app('livewire')->mount($__name, $__params, 'lw-824875460-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        <?php echo e($slot); ?>


        <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
        
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('modals');

$__html = app('livewire')->mount($__name, $__params, 'lw-824875460-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    </body>
</html>



<?php /**PATH /var/www/resources/views/layouts/app.blade.php ENDPATH**/ ?>