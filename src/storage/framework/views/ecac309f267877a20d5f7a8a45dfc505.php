<div>
    <section class="section section--categorypage">
        <div class="container">
            <?php if($category->banner): ?>
                <div class="categorypage__banner">
                    <img src="<?php echo e(resize($category->banner, 1660, 310)); ?>" alt="<?php echo e($category->title); ?>" class="categorypage__banner-img">
                </div>
            <?php endif; ?>

            <?php if($childrens && count($childrens) > 0): ?>
                <div class="categorypage__category">
                    <h3 class="categorypage__category-title">Выберите подкатегорию</h3>
                    <div class="categorypage__category-items">
                        <?php $__currentLoopData = $childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('category', $children->slug)); ?>" class="categorypage__category-item" wire:navigate><?php echo $children->title; ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
 
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split(Filter::class, [
                'category' => $category, 
                'slug' => $slug, 
                'build' => 'category'
                ]);

$__html = app('livewire')->mount($__name, $__params, $category->id, $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
 
        </div>
    </section>
 
    <section class="section section--about section--bg">
        <div class="container">
            <div class="sectionabout">
                <h3 class="sectionabout_hello">Товары из раздела</h3>
                <div class="sectionabout__block">
                    <div class="sectionabout__info">
                        <h2 class="sectionabout__info-title"><?php echo $category->title; ?></h2>
                        <div class="sectionabout__info-description"><?php echo $category->description; ?></div>
                       
                    </div>
                    <div class="sectionabout__image">
                        <div class="sectionabout__image-a">
                            <img src="<?php echo e(resize(config('settings.image'), 500, 350)); ?>" alt="<?php echo config('settings.name'); ?>" class="sectionabout__image-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('section.feedback', ['code' => 'collback','senturl' => ''.e(url()->current()).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-1296400403-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div><?php /**PATH /var/www/resources/views/category.blade.php ENDPATH**/ ?>