<?php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
?>

<div>
    <?php if($paginator->hasPages()): ?>
        <div class="pagination">
            <?php if(!$paginator->onFirstPage()): ?>
                <button type="button" wire:click="previousPage('<?php echo e($paginator->getPageName()); ?>')" x-on:click="<?php echo e($scrollIntoViewJsSnippet); ?>" wire:loading.attr="disabled" dusk="previousPage<?php echo e($paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName()); ?>.before" class="pagination__a pagination__prev">
                    <svg width="8" height="12">
                        <use xlink:href="storage/image/sprite.svg#arrow-left"></use>
                    </svg>
                </button>
            <?php endif; ?>
         
            <div class="pagination__ul">
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php if(is_string($element)): ?>
                        <div class="pagination__li">
                            <span class="pagination__a">...</span>
                            
                        </div>
                    <?php endif; ?>
         
                    
                    <?php if(is_array($element)): ?>
                        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="pagination__li" wire:key="paginator-<?php echo e($paginator->getPageName()); ?>-page<?php echo e($page); ?>">
                                <?php if($page == $paginator->currentPage()): ?>
                                    <span class="pagination__a active"><?php echo e($page); ?></span>
                                <?php else: ?>
                                    <button type="button" wire:click="gotoPage(<?php echo e($page); ?>, '<?php echo e($paginator->getPageName()); ?>')" x-on:click="<?php echo e($scrollIntoViewJsSnippet); ?>" class="pagination__a"><?php echo e($page); ?></button>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if($paginator->hasMorePages()): ?>
                <button type="button" wire:click="nextPage('<?php echo e($paginator->getPageName()); ?>')" x-on:click="<?php echo e($scrollIntoViewJsSnippet); ?>" dusk="nextPage<?php echo e($paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName()); ?>.after" class="pagination__a pagination__prev" aria-label="<?php echo e(__('pagination.next')); ?>">
                    <svg width="8" height="12">
                        <use xlink:href="storage/image/sprite.svg#arrow-right"></use>
                    </svg>
                </button>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div><?php /**PATH /var/www/resources/views/vendor/livewire/webdement.blade.php ENDPATH**/ ?>