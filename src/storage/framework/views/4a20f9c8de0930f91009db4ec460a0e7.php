<div>

    <div class="account__item">
        <div class="account__item-item">
            <div class="account__item-body">

                <div class="accountorderinfo">
                    <div class="accountorderinfo__left">
                        <div class="accountorderinfo__items">
            
                            <div class="accountorderinfo__item">
                                <?php $__currentLoopData = $order->totals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="accountorderinfo__item-row">
                                        <span class="accountorderinfo__item-name"><?php echo e(__('order.total_' . $total->code)); ?></span>
                                        <span class="accountorderinfo__item-value"><?php echo e(formatPrice($total->value, 'руб')); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
 
                        <h4 class="account__item-title">Доставка</h4>

                        <div class="accountorderinfo__items">
                            <div class="accountorderinfo__item">
                                <?php
                                    $recipient = array();

                                    foreach (['inn', 'name'] as $field) {
                                        if (isset($order->{$field}) && !empty($order->{$field})) {
                                            $recipient[] = $order->{$field};
                                        }
                                    }

                                    $recipient = implode(', ', $recipient);
                                ?>
                                <?php if($recipient): ?>
                                    <div class="accountorderinfo__item-row">
                                        <span class="accountorderinfo__item-name">Получатель</span>
                                        <span class="accountorderinfo__item-value"><?php echo $recipient; ?></span>
                                    </div>
                                <?php endif; ?>
                                <div class="accountorderinfo__item-row">
                                    <span class="accountorderinfo__item-name">Телефон</span>
                                    <span class="accountorderinfo__item-value"><?php echo $order->phone; ?></span>
                                </div>
                                <div class="accountorderinfo__item-row">
                                    <span class="accountorderinfo__item-name">Почта</span>
                                    <span class="accountorderinfo__item-value"><?php echo $order->email; ?></span>
                                </div>
                                <?php
                                    $recipient = array();

                                    foreach (['city', 'address'] as $field) {
                                        if (isset($order->{$field}) && !empty($order->{$field})) {
                                            $recipient[] = $order->{$field};
                                        }
                                    }

                                    $recipient = implode(', ', $recipient);
                                ?>
                                <?php if($recipient): ?>
                                    <div class="accountorderinfo__item-row">
                                        <span class="accountorderinfo__item-name">Адрес</span>
                                        <span class="accountorderinfo__item-value"><?php echo $recipient; ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <h4 class="account__item-title">Заказанные товары</h4>

                        <div class="accountorderinfo__items">
                            <div class="accountorderinfo__item">
                                <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="accountorderinfo__item-row">
                                        <a href="<?php echo e(route('product', $product->product->slug)); ?>" class="accountorderinfo__item-name" wire:navigate><?php echo e($product->product->title); ?> (<?php echo e($product->quantity); ?> шт.)</a>
                                        <span class="accountorderinfo__item-value"><?php echo e(formatPrice($product->price)); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        </div>

                    </div>
                    <div class="accountorderinfo__right">
                        <div class="accountorderinfo__status">
                            <h4 class="accountorderinfo__status-title">Статусы заказа</h4>
                            <div class="accountorderinfo__status-items">
                                <?php $__currentLoopData = config('general.order_statuses'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $order_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="accountorderinfo__status-item  <?php if($order_status == $order->status): ?> accountorderinfo__status-item--active <?php endif; ?>">
                                        <span class="accountorderinfo__status-count"><?php echo e($count + 1); ?></span>
                                        <span class="accountorderinfo__status-name"><?php echo e(__('order.status_' . $order_status)); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="accountorderinfo__buttons">
                            <?php if($order->status == 'new'): ?>
                                <button type="button" class="btn btn--sm btn--dark" wire:click="cancelOrder" wire:confirm="Вы действительно хотите отменить заказ?">Отменить</button>
                            <?php endif; ?>

                            <button type="button" class="btn btn--sm btn--white" wire:click="exportWithBarcodes">Заказ со штрихкодами</button>
                            <button type="button" class="btn btn--sm btn--white" wire:click="exportMissingProduct">Отсутствующие товары</button>
 
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>
<?php /**PATH /var/www/resources/views/user/order.blade.php ENDPATH**/ ?>