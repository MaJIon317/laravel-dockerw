<?php if(isset($categories) && (count($categories) > 0)): ?>
    <ul class="categorylist__items">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="categorylist__item-li">
                <a href="<?php echo e(route('category', $category->slug)); ?>" class="categorylist__item<?php echo e(request()->is('*category*' . $category->slug . '*') ? ' active' : ''); ?>" wire:navigate>
                    <span class="categorylist__item-name"><?php echo e($category->title); ?></span>
                    <span class="categorylist__item-count"><?php echo e($category->products_count); ?></span>
                </a>

                <?php if(count($category->children) > 0): ?>
                    <?php if (isset($component)) { $__componentOriginal3e2122a43095086c515a77f546a1f934 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e2122a43095086c515a77f546a1f934 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.category','data' => ['categories' => $category->children]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('category'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->children)]); ?>
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
                <?php endif; ?>
                <!-- Recursion -->
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php else: ?>
    <?php echo e(__('No categories found')); ?>

<?php endif; ?>
<?php /**PATH /var/www/resources/views/components/category.blade.php ENDPATH**/ ?>