<div>
    <section class="section section--categorypage">
        <div class="container">

            <?php if (isset($component)) { $__componentOriginal3e2122a43095086c515a77f546a1f934 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e2122a43095086c515a77f546a1f934 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.category','data' => ['categories' => $categories]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('category'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($categories)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e2122a43095086c515a77f546a1f934)): ?>
<?php $attributes = $__attributesOriginal3e2122a43095086c515a77f546a1f934; ?>
<?php unset($__attributesOriginal3e2122a43095086c515a77f546a1f934); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e2122a43095086c515a77f546a1f934)): ?>
<?php $component = $__componentOriginal3e2122a43095086c515a77f546a1f934; ?>
<?php unset($__componentOriginal3e2122a43095086c515a77f546a1f934); ?>
<?php endif; ?>

        </div>
    </section>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('section.feedback', ['code' => 'collback','senturl' => ''.e(url()->current()).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-3350685166-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
 
</div><?php /**PATH /var/www/resources/views/catalog.blade.php ENDPATH**/ ?>