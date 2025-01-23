<div>
    
    <?php if($filteres && count($filteres) > 0): ?>
        <form class="sorts" id="filters" wire:submit>
            <div class="sort">
                <?php $__currentLoopData = $filteres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filtere): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $filtere->render(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </form>
    <?php endif; ?>
 
    <div class="productlistered">
        <?php if($products && count($products) > 0): ?>
            <div class="categorypage categorypage--<?php echo e(session()->get('card-view')); ?>">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="categorypage__item" wire:key="<?php echo e('category.' . $slug . '.' . $product->id); ?>">
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split(productCard::class, ['product' => $product]);

$__html = app('livewire')->mount($__name, $__params, 'category.' . $slug . '.' . $product->id, $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <?php echo e($products->onEachSide(1)->links(data: ['scrollTo' => '.breadcrumbs'])); ?>

        <?php else: ?>
            <div class="alert alert--info"><?php echo __('category.null'); ?></div>
        <?php endif; ?> 

        <div class="loading" wire:loading wire:loading.delay.shorter></div>
    </div>

</div>

    <?php
        $__scriptKey = '0-6';
        ob_start();
    ?>
<script>

    let views = document.querySelectorAll('[data-view]'),
        view_block = document.querySelector('.categorypage');

    views.forEach((item) => {
        item.onclick = function(event) {
            var element_block = event.target.closest('.sort__item--view')

            views.forEach((item2) => {
                item2.classList.remove('active')
            })

            event.target.classList.add('active')
    
            view_block.classList.remove('categorypage--grid', 'categorypage--list')
            view_block.classList.add('categorypage--' + item.getAttribute('data-view'))
    
            axios.post('/session/set', {
                name : 'card-view',
                value: item.getAttribute('data-view')
            })
        }
    });

</script> 
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?><?php /**PATH /var/www/resources/views/components/filter.blade.php ENDPATH**/ ?>