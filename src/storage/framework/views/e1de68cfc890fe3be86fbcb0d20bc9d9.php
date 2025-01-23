<section class="section section--top section--newspage">
    <div class="container">
        <?php if(count($articles) > 0): ?>
            <div class="newspage">
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="newspage-item">
                        <div class="sectionpromotion__item-block">
                            <div class="sectionpromotion__item-image">
                                <a href="<?php echo e(route('article', $article->slug)); ?>" class="sectionpromotion__item-a" wire:navigate>
                                    <img src="<?php echo e(resize($article->image, 310, 200)); ?>" alt="<?php echo e($article->title); ?>" class="sectionpromotion__item-img">
                                </a>
                            </div>
                            <div class="sectionpromotion__item-date"><?php echo e(\Carbon\Carbon::parse($article->publish_date)->diffForHumans()); ?></div>
                            <h5 class="sectionpromotion__item-name">
                                <a href="<?php echo e(route('article', $article->slug)); ?>" wire:navigate><?php echo e($article->title); ?></a>
                            </h5>
                            <div class="sectionpromotion__item-description"><?php echo \Illuminate\Support\Str::limit(strip_tags($article->description), 100, $end='...'); ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php echo e($articles->onEachSide(1)->links(data: ['scrollTo' => '.breadcrumbs'])); ?>

        <?php else: ?>
            <div class="alert alert--info"><?php echo __('article.null'); ?></div>
        <?php endif; ?>
    </div>
</section><?php /**PATH /var/www/resources/views/articles.blade.php ENDPATH**/ ?>