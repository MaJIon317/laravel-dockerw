<div>

    <?php if($order): ?>
        <div class="accountorder__item">
            <div class="accountorder__item-item accountorder__item-item--number">
                <a href="<?php echo e(route('dashboard.order.info', $order->id)); ?>" wire:navigate><?php echo e(__('order.title', [
                'order_id' => $order->id, 
                'created_at' => $order->created_at->format('d-m-y H:i')
            ])); ?></a>
            </div>
            <div class="accountorder__item-item accountorder__item-item--status">
                <div class="accountorder__document">
                    <div class="accountorder__document-icon">
                        <svg width="16" height="16">
                            <use xlink:href="storage/image/sprite.svg#download"></use>
                        </svg>
                    </div>
                    <div class="accountorder__document-items">
                        <div class="accountorder__document-item">
                            <button type="button" wire:click="exportWithBarcodes" class="a">Заказ со штрихкодами</button>
                        </div>
                        <div class="accountorder__document-item">
                            <button type="button" wire:click="exportMissingProduct" class="a">Отсутствующие товары</button>
                        </div>
                    </div>
                </div>
                <span class="statustext statustext--<?php echo e($order->status); ?>"><?php echo e(__('order.status_' . $order->status)); ?></span>
            </div>

            <?php
                $recipient = array();

                foreach (['city', 'address'] as $field) {
                    if (isset($order->{$field})) {
                        $recipient[] = $order->{$field};
                    }
                }

                $recipient = implode(', ', $recipient);
            ?>

            <div class="accountorder__item-item accountorder__item-item--address">
                <div class="accountorder__item-item_title">Доставка</div>
                <div class="accountorder__item-item_desc"><?php echo $recipient; ?></div>
            </div>
            <div class="accountorder__item-item accountorder__item-item--product">
                <div class="accountorder__item-item_title">Товаров в заказе</div>
                <div class="accountorder__item-item_desc"><?php echo e($order->products->count()); ?> шт. на сумму <?php echo e(formatPrice($order->total, 'руб')); ?></div>
            </div>
            <div class="accountorder__item-item accountorder__item-item--repeat">
                <button type="button" class="btn btn--white btn--sm w-100" wire:click="repeat(<?php echo e($order->id); ?>)">
                    <svg width="16" height="16">
                        <use xlink:href="storage/image/sprite.svg#repeat"></use>
                    </svg>
                    <span>Повторить</span>
                </button>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/resources/views/user/components/order.blade.php ENDPATH**/ ?>