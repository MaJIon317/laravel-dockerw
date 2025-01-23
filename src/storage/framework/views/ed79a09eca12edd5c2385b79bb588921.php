<section class="section section--advantage">
    <div class="container">
        <div class="sectionwork">
            <h2 class="sectionwork__title">Как мы работаем</h2>
            <div class="sectionwork__block">
                <?php ($count = 1); ?>
                <?php $__currentLoopData = config('settings.section_work'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="sectionwork__item">
                        <div class="sectionwork__item-block">
                            <div class="sectionwork__item-step"><?php echo e($count); ?> шаг</div>
                            <h5 class="sectionwork__item-title"><?php echo e($item['title']); ?></h5>
                            <p class="sectionwork__item-description"><?php echo e($item['description']); ?></p>
                        </div>
                    </div>
                    <?php ($count++); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section><?php /**PATH /var/www/resources/views/components/section/work.blade.php ENDPATH**/ ?>