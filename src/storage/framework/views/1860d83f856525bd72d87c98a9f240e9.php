<section class="section section--about">
    <div class="container">
        <div class="sectionabout">
            <h3 class="sectionabout_hello">Добро пожаловать на наш сайт!</h3>
            <div class="sectionabout__block">
                <div class="sectionabout__info">
                    <h2 class="sectionabout__info-title"><?php echo config('settings.name'); ?></h2>
                    <p class="sectionabout__info-description"><?php echo config('settings.description'); ?></p>
                </div>
                <div class="sectionabout__image">
                    <div class="sectionabout__image-a">
                        <img src="<?php echo e(resize(config('settings.image'), 500, 350)); ?>" alt="<?php echo config('settings.name'); ?>" class="sectionabout__image-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH /var/www/resources/views/components/section/about.blade.php ENDPATH**/ ?>