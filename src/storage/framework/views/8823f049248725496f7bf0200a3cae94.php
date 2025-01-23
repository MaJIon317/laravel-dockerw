<?php $__env->startSection('title', __('admin/orders.titles')); ?>

 
<?php $__env->startSection('content'); ?>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Клиент</th>
                <th scope="col">Сумма</th>
                <th scope="col">Оплата</th>
                <th scope="col">Оплаченный</th>
                <th scope="col">Доставка</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата заказа</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($order->id); ?></th>
                    <td scope="row"><?php echo e($order->user->name); ?></td>
                    <td scope="row"><?php echo e(formatPrice($order->total, 'руб')); ?></td>
                    <td scope="row"><?php echo e(__('order.payment.' . $order->payment)); ?></td>
                    <td scope="row"><?php echo e(__('order.paid.' . $order->is_paid)); ?></td>
                    <td scope="row"><?php echo e(__('order.delivery.' . $order->delivery)); ?></td>
                    <td scope="row">
                        <span class="statustext statustext--<?php echo e($order->status); ?>"><?php echo e(__('order.status.' . $order->status)); ?></span>
                    </td>
                    <td><?php echo e($order->created_at->diffForHumans()); ?></td>
                    <td class="text-end">
                        <a href="<?php echo e(route('admin.orders.show', $order)); ?>" title="Детали" class="btn btn-primary"><i class="fa-regular fa-eye"></i></a>

                        <a href="<?php echo e(route('admin.orders.edit', $order)); ?>" title="Редактировать" class="btn btn-secondary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="<?php echo e(route('admin.orders.destroy', $order)); ?>" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить купон?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger m-0">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php echo e($orders->links('vendor.pagination.bootstrap-5')); ?>



<style>
    .statustext {
        position: relative
    }

    .statustext--new {
        color: var(--body-color-bold)
    }

    .statustext--processing {
        color: #f79e1b
    }

    .statustext--delivery {
        color: #3034ff
    }

    .statustext--delivered {
        color: #000294
    }

    .statustext--completed {
        color: #03af03
    }

    .statustext--cancelled {
        color: red
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/orders.blade.php ENDPATH**/ ?>