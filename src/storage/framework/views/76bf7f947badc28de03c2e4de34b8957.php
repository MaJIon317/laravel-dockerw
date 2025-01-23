<?php $__env->startSection('title', __('admin/admins.titles')); ?>

<?php $__env->startSection('buttons'); ?>
    <a href="<?php echo e(route('admin.admins.create')); ?>" class="btn btn-primary"><?php echo e(__('admin/admins.add')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Роль</th>
                <th scope="col">ФИО</th>
                <th scope="col">E-mail</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($admin->id); ?></th>
                    <td><?php echo e($admin->role->name); ?></td>
                    <td><?php echo e($admin->name); ?></td>
                    <td><?php echo e($admin->email); ?></td>
                    <td class="text-end">
                        <a href="<?php echo e(route('admin.admins.edit', $admin)); ?>" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="<?php echo e(route('admin.admins.destroy', $admin)); ?>" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить администратора?')">
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

<?php echo e($admins->links('vendor.pagination.bootstrap-5')); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/admins.blade.php ENDPATH**/ ?>