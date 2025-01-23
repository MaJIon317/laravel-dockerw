<section class="section section--categorypage">
    <div class="container">
        <?php if(count($products) > 0): ?>
            <div class="categorypage categorypage--grid">
                <!-- Product card -->
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="categorypage__item">
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('productCard', ['product' => $product]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3226916120-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- Product card -->
            </div>
        <?php else: ?>
            <div class="alert alert--info"><?php echo __('wishlist.null'); ?></div>
        <?php endif; ?>

    </div>
</section><?php /**PATH /var/www/resources/views/wishlist.blade.php ENDPATH**/ ?>