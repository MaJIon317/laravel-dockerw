<?php $__env->startSection('title', __('admin/coupons.titles')); ?>

<?php $__env->startSection('buttons'); ?>
    <a href="<?php echo e(route('admin.coupons.create')); ?>" class="btn btn-primary"><?php echo e(__('admin/coupons.add')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Код</th>
                <th scope="col">Использовано</th>
                <th scope="col">Действует (от / до)</th>
                <th scope="col" class="text-center">Статус</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($coupon->id); ?></th>
                    <td><?php echo e($coupon->code); ?> <small class="badge bg-info text-dark"><?php if($coupon->percent): ?> -<?php echo e((float)$coupon->discount); ?>% <?php else: ?> -<?php echo e(formatPrice($coupon->discount, 'руб')); ?> <?php endif; ?></small></td>
                    <td><?php echo e($coupon->history->count()); ?> / <?php echo $coupon->count_uses ?? '&infin;'; ?></td>
                    <td><?php echo $coupon->publish_start ?? '&infin;'; ?> / <?php echo $coupon->publish_end ?? '&infin;'; ?></td>
                    <td class="text-center"><?php echo e(__('admin/coupons.status.' . $coupon->status)); ?></td>
                    <td class="text-end">
                        <a href="<?php echo e(route('admin.coupons.show', $coupon)); ?>" title="Детали" class="btn btn-secondary"><i class="fa-solid fa-sitemap"></i></a>

                        <a href="<?php echo e(route('admin.coupons.edit', $coupon)); ?>" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="<?php echo e(route('admin.coupons.destroy', $coupon)); ?>" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить купон?')">
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

<?php echo e($coupons->links('vendor.pagination.bootstrap-5')); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/coupons.blade.php ENDPATH**/ ?>