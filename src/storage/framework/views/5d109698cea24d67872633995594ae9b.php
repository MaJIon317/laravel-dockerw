<div class="container menucatalog__container" x-data="menucatalog">
    <div class="menucatalog__block">
        <div class="menucatalog__general">
            <ul class="menucatalog__general-ul scrollbar">

                <li class="menucatalog__general-li">
                    <a href="<?php echo e(route('compilation', 'new')); ?>" class="menucatalog__general-a" wire:navigate>
                        <span class="menucatalog__general-icon">
                            <img src="<?php echo e(resize('menu/new.svg', 18, 18)); ?>" alt="Новинки">
                        </span>
                        <span class="menucatalog__general-name">Новинки</span>
                    </a>
                </li>
 
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="menucatalog__general-li">
                        <?php if($category->children->isNotEmpty()): ?>
                            <button type="button" data-menucatalog-general="<?php echo e($category->id); ?>" class="menucatalog__general-a">
                        <?php else: ?>
                            <a href="<?php echo e(route('category', $category->slug)); ?>" class="menucatalog__general-a" wire:navigate>
                        <?php endif; ?>
                            <span class="menucatalog__general-icon">
                                <img src="<?php echo e(resize($category->icon, 18, 18)); ?>" alt="<?php echo e($category->title); ?>">
                            </span>
                            <span class="menucatalog__general-name"><?php echo e($category->title); ?></span>
                            <?php if($category->children->isNotEmpty()): ?>
                                <span class="menucatalog__general-child"></span>
                            <?php endif; ?>
                        </<?php echo e($category->children->isNotEmpty() ? 'button' : 'a'); ?>>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <div class="menucatalog__children scrollbar">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($category->children->isNotEmpty()): ?>
                    <div class="menucatalog__children-item" id="menucatalog__children-<?php echo e($category->id); ?>">
                        <div class="menucatalog__children-title">
                            <button class="btn btn--sm menucatalog__children-back" data-menucatalog-back="<?php echo e($category->id); ?>">Назад</button>
                            <?php echo e($category->title); ?>

                        </div>
                        <ul class="menucatalog__children-ul">
                        <?php $__currentLoopData = $category->children->chunk(ceil($category->children->count() / 3)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $three): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="menucatalog__children-lis">
                        <ul class="menucatalog__children-child_uls">
                            <?php $__currentLoopData = $three; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="menucatalog__children-li">
                                    <a href="<?php echo e(route('category', $children->slug)); ?>" class="menucatalog__children-a" wire:navigate><?php echo e($children->title); ?></a>
                                    <?php if($children->children->isNotEmpty()): ?>
                                        <ul class="menucatalog__children-child_ul">
                                            
                                            <?php $__currentLoopData = $children->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="menucatalog__children-child_li">
                                                    <a href="<?php echo e(route('category', $child->slug)); ?>" class="menucatalog__children-child_a" wire:navigate><?php echo e($child->title); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="menucatalog__banner">
            <?php $__currentLoopData = config('settings.menu_banner'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="menucatalog__banner-item">
                    <a href="<?php echo e($item['link']); ?>" class="menucatalog__banner-a" wire:navigate>
                        <img src="<?php echo e(resize($item['image'], 300, 185)); ?>" alt="." class="menucatalog__banner-img">
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

    <?php
        $__scriptKey = '0-5';
        ob_start();
    ?>
<script>
    Alpine.data('menucatalog', (id = 'menucatalog') => {
        let menu = document.getElementById(id),
            items = document.querySelectorAll('[data-menucatalog-general]'),
            back = document.querySelectorAll('[data-menucatalog-back]');
    
        for (var i = 0; i < items.length; i++) {
            if (document.documentElement.clientWidth > 768) {
                items.item(i).onmouseover = function(item) {
                    menucatalog(items, item);
                }
            } else {
                items.item(i).onclick = function(item) {
                    item.preventDefault();
                    
                    menucatalog(items, item);
                }
            }
        }

        for (var i = 0; i < back.length; i++) {
            back.item(i).onclick = function(item) {
                document.querySelector('[data-menucatalog-general="' + item.target.getAttribute('data-menucatalog-back') + '"').classList.remove('active');
                document.getElementById('menucatalog__children-' + item.target.getAttribute('data-menucatalog-back')).classList.remove('active');
            }
        }

        function menucatalog(items, item) { 
            for (var i2 = 0; i2 < items.length; i2++) {
                items.item(i2).classList.remove('active'),
        
                document.getElementById('menucatalog__children-' + items.item(i2).getAttribute('data-menucatalog-general')).classList.remove('active');
            }
        
            item.target.classList.add('active'),
            document.getElementById('menucatalog__children-' + item.target.getAttribute('data-menucatalog-general')).classList.add('active');
        }
    })
</script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?><?php /**PATH /var/www/resources/views/components/menu-category.blade.php ENDPATH**/ ?>