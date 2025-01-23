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
        <title><?php echo e($meta_title ?? $title ?? config('settings.meta_title', 'Page Title')); ?></title>
        <meta name="description" content="<?php echo e($meta_description ?? config('settings.meta_description', 'Page Description')); ?>">
        <meta name="keywords" content="<?php echo e($meta_keywords ?? config('settings.meta_keyword', 'Page Keywords')); ?>">

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
      
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('offline');

$__html = app('livewire')->mount($__name, $__params, 'lw-3881489093-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        <section class="section section--top section--account">
            <div class="container">
                <div class="account">
                    <div class="account__row">
                        <div class="account__left">
                            <div class="account_menu">
                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.menu');

$__html = app('livewire')->mount($__name, $__params, 'lw-3881489093-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                            </div>
                        </div>
                        <div class="account__right">
                            <div class="account__title">
                                <?php if(isset($back)): ?>
                                    <a href="<?php echo e($back['link']); ?>" class="account__title-back btn--dark" wire:navigate>
                                        <svg width="12" height="12">
                                            <use xlink:href="storage/image/sprite.svg#arrow-left"></use>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if(isset($title)): ?>
                                    <h1><?php echo $title; ?></h1>
                                <?php endif; ?>
                            </div>

                            <?php echo e($slot); ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
        
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('modals');

$__html = app('livewire')->mount($__name, $__params, 'lw-3881489093-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    </body>
</html><?php /**PATH /var/www/resources/views/layouts/user.blade.php ENDPATH**/ ?>