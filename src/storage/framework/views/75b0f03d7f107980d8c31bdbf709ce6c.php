<div>
    <?php if($orders && count($orders) > 0): ?>    
        <div class="accountorder">
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.components.order', ['order' => $order]);

$__html = app('livewire')->mount($__name, $__params, ''.e($order->id).'', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?> 
    <div class="alert alert--danger">Не удалось найти заказы</div>
    <?php endif; ?>
 
</div>

 
<?php /**PATH /var/www/resources/views/user/components/orders.blade.php ENDPATH**/ ?>