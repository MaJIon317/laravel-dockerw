<section class="section section--home">
    <div class="container">
        <div class="description">
            <?php if($news->banner): ?>
                <div class="description-image">
                    <span>
                        <img src="<?php echo e(resize($news->banner, 1660, 415)); ?>" alt="<?php echo e($news->title); ?>">
                    </span>
                </div>
            <?php endif; ?>
            <div class="description-editor"><?php echo $news->description; ?></div>
        </div>
    </div>
</section><?php /**PATH /var/www/resources/views/news.blade.php ENDPATH**/ ?>