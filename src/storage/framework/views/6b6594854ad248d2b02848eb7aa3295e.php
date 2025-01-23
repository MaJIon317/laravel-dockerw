<div>

    <div class="account__item">
        <div class="account__item-item">
            <h4 class="account__item-title">Последние заказы</h4>
            <div class="account__item-body">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.components.orders', ['paginate' => false,'limit' => 3]);

$__html = app('livewire')->mount($__name, $__params, 'lw-16770875-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        </div>
    </div>

</div>
<?php /**PATH /var/www/resources/views/user/dashboard.blade.php ENDPATH**/ ?>