<?php ($breadcrumbs = $__data[0] ?? []); ?>


<?php if(!empty($breadcrumbs) && \Illuminate\Support\Arr::accessible($breadcrumbs)): ?>
    <div class="breadcrumbs">
        <ul itemscope="" itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs__ul">
            <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="breadcrumbs__li">
                <a itemprop="item" title="<?php echo e(__('home.breadcrumb')); ?>" href="<?php echo e(route('home')); ?>" class="breadcrumbs__a" wire:navigate>
                    <span itemprop="name" class="breadcrumbs__name"><?php echo e(__('home.breadcrumb')); ?></span>
                    <meta itemprop="position" content="0">
                </a>
            </li>
            <?php ($count = 1); ?>
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!empty($label) || !empty($link)): ?>
                    <?php if(is_array($link)): ?>
                        <?php $__currentLoopData = $link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label2 => $link2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($label2) || !empty($link2)): ?>
                                <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="breadcrumbs__li">
                                    <?php if(is_int($label2) && !is_int($link2)): ?>
                                        <span itemprop="name" class="breadcrumbs__name"><?php echo e($link2); ?></span>
                                        <meta itemprop="position" content="<?php echo e($count); ?>">
                                    <?php else: ?>
                                        <a itemprop="item" title="<?php echo e($label2); ?>" href="<?php echo e($link2); ?>" class="breadcrumbs__a" wire:navigate>
                                            <span itemprop="name" class="breadcrumbs__name"><?php echo e($label2); ?></span>
                                            <meta itemprop="position" content="<?php echo e($count); ?>">
                                        </a>
                                    <?php endif; ?>
                                </li>
                                <?php ($count++); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="breadcrumbs__li">
                            <?php if(is_int($label) && !is_int($link)): ?>
                                <span itemprop="name" class="breadcrumbs__name"><?php echo e($link); ?></span>
                                <meta itemprop="position" content="<?php echo e($count); ?>">
                            <?php else: ?>
                                <a itemprop="item" title="<?php echo e($label); ?>" href="<?php echo e($link); ?>" class="breadcrumbs__a" wire:navigate>
                                    <span itemprop="name" class="breadcrumbs__name"><?php echo e($label); ?></span>
                                    <meta itemprop="position" content="<?php echo e($count); ?>">
                                </a>
                            <?php endif; ?>
                        </li>
                        <?php ($count++); ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/resources/views/partials/breadcrumbs.blade.php ENDPATH**/ ?>