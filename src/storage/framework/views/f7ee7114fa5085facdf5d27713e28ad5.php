<section class="section section--home">
    <div class="container">
        <div class="description">
            <?php if($article->banner): ?>
                <div class="description-image">
                    <span>
                        <img src="<?php echo e(resize($article->banner, 1660, 415)); ?>" alt="<?php echo e($article->title); ?>">
                    </span>
                </div>
            <?php endif; ?>
            <div class="description-editor"><?php echo $article->description; ?></div>
        </div>
    </div>
</section><?php /**PATH /var/www/resources/views/article.blade.php ENDPATH**/ ?>