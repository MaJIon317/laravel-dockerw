<section class="section section--advantage section--bg">
    <div class="container">
        <div class="sectionadvantage">
            <h2 class="sectionadvantage__title">Кратко о нас в цифрах</h2>
            <div class="sectionadvantage__block">
                <?php $__currentLoopData = config('settings.section_advantage'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="sectionadvantage__item">
                        <div class="sectionadvantage__item-block">
                            <div class="sectionadvantage__item-top">
                                <h3 class="sectionadvantage__item-title"><?php echo e($item['title']); ?></h3>
                                <img src="<?php echo e(resize($item['image'], 60, 60)); ?>" alt="<?php echo e($item['title']); ?>" class="sectionadvantage__item-icon">
                            </div>
                            <p class="sectionadvantage__item-description"><?php echo e($item['description']); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section><?php /**PATH /var/www/resources/views/components/section/advantage.blade.php ENDPATH**/ ?>