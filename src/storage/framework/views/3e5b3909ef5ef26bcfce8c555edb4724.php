<section class="section section--top section--newspage">
    <div class="container">
        <?php if(count($newses) > 0): ?>
            <div class="newspage">
                <?php $__currentLoopData = $newses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="newspage-item">
                        <div class="sectionpromotion__item-block">
                            <div class="sectionpromotion__item-image">
                                <a href="<?php echo e(route('news', $news->slug)); ?>" class="sectionpromotion__item-a" wire:navigate>
                                    <img src="<?php echo e(resize($news->image, 310, 200)); ?>" alt="<?php echo e($news->title); ?>" class="sectionpromotion__item-img">
                                </a>
                            </div>
                            <div class="sectionpromotion__item-date"><?php echo e(\Carbon\Carbon::parse($news->publish_date)->diffForHumans()); ?></div>
                            <h5 class="sectionpromotion__item-name">
                                <a href="<?php echo e(route('news', $news->slug)); ?>" wire:navigate><?php echo e($news->title); ?></a>
                            </h5>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php echo e($newses->onEachSide(1)->links(data: ['scrollTo' => '.breadcrumbs'])); ?>

        <?php else: ?>
            <div class="alert alert--info"><?php echo __('news.null'); ?></div>
        <?php endif; ?>
    </div>
</section><?php /**PATH /var/www/resources/views/newses.blade.php ENDPATH**/ ?>