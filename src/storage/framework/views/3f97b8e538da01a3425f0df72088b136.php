<?php $__env->startSection('title', __('admin/orders.show', ['count' => $order->id, 'created_at' => $order->created_at->diffForHumans()])); ?>

<?php $__env->startSection('content'); ?>


<!-- Main content -->
<div class="row">
    <div class="col-lg-8">
      <!-- Details -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="mb-3 d-flex justify-content-between">
            <div>
                <small class="me-3"><?php echo e($order->created_at); ?></small>
                <small class="me-3">#<?php echo e($order->id); ?></small>
                <small class="me-3" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Способ оплаты"><i class="fa-regular fa-credit-card"></i> <?php echo e(__('order.payment.' . $order->payment)); ?></small>
                <small class="me-3" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Способ доставки"><i class="fa-solid fa-truck"></i> <?php echo e(__('order.delivery.' . $order->delivery)); ?></small>
                <small class="me-3" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Статус заказа"><i class="fa-solid fa-flag-usa"></i> <?php echo e(__('order.status.' . $order->status)); ?></small>
            </div>
            <div class="d-flex">
              <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i class="fa-solid fa-file-arrow-down"></i> <span class="text">Счет-фактура</span></button>
              <div class="dropdown">
                <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">Заказ со штрихкодами</a></li>
                  <li><a class="dropdown-item" href="#">Отсутствующие товары</a></li>
                </ul>
              </div>
            </div>
          </div>
          <table class="table table-borderless">
            <tbody>
                <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>
                  <div class="d-flex mb-2">
                    <div class="flex-shrink-0">
                      <img src="<?php echo e(resize(Arr::first($product->product->images), 35, 35)); ?>" alt="." width="35" class="img-fluid">
                    </div>
                    <div class="flex-lg-grow-1 ms-3">
                      <h6 class="small mb-0"><a href="<?php echo e(route('product', $product->product->slug)); ?>" target="_blank" class="text-reset"><?php echo e($product->product->title); ?></a></h6>
                      
                    </div>
                  </div>
                </td>
                <td><?php echo e($product->quantity); ?> шт.</td>
                <td class="text-end"><?php echo e(formatPrice($product->total, 'руб')); ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <?php $__currentLoopData = $order->totals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td colspan="2"><?php echo e(__('order.total.' . $total->code)); ?></td>
                <td class="text-end"><?php echo e(formatPrice($total->value, 'руб')); ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tfoot>
          </table>
        </div>
      </div>
      <!-- Payment -->
      <div class="card mb-4">
        <div class="card-body">
            <h3 class="h6">История заказа</h3>

            <table class="table">
            <tbody>
                <?php $__currentLoopData = $order->history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e(__('order.status.' . $history->status)); ?></td>
                <td><?php echo e($history->created_at->diffForHumans()); ?></td>
                <td><?php echo e($history->comment ?? '-'); ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            
          </table>

        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <!-- Customer Notes -->
       <?php if($order->comment): ?>
      <div class="card mb-4">
        <div class="card-body">
          <h3 class="h5">Комментарий клиента</h3>
          <p><?php echo e($order->comment); ?></p>
        </div>
      </div>
      <?php endif; ?>
      <div class="card mb-4">
        <!-- Shipping information -->
        <div class="card-body">
          <h3 class="h6">Информация о доставке</h3>
          <address><strong><?php echo e($order->name); ?></strong><br>
            <?php if($order->inn): ?> <abbr title="Телефон">ИНН:</abbr> <?php echo e($order->inn); ?><br><?php endif; ?>
            <abbr title="Телефон">Тел:</abbr> <?php echo e($order->phone); ?><br>
            <abbr title="E-mail">E-mail:</abbr> <?php echo e($order->email); ?><br>
            <abbr title="Адрес">Адрес:</abbr> <?php echo e($order->city); ?>, <?php echo e($order->address); ?>

            <abbr title="Адрес">Способ доставки:</abbr> <?php echo e(__('order.delivery.' . $order->delivery)); ?>

          </address>
        </div>
      </div>
      <div class="card mb-4">
        <!-- Shipping information -->
        <div class="card-body">
          <h3 class="h6">Информация об оплате</h3>
          <p><?php echo e(__('order.payment.' . $order->payment)); ?> <br>
              <?php echo e(formatPrice($order->total, 'руб')); ?> <span class="badge bg-<?php echo e($order->is_paid ? 'success' : 'danger'); ?> rounded-pill"><?php echo e(__('order.paid_full.' . $order->is_paid)); ?></span>
            </p>
        </div>
      </div>


    </div>
  </div>

 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/order-show.blade.php ENDPATH**/ ?>