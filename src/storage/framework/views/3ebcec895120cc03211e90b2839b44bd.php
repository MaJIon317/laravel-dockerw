<?php $__env->startSection('title', __('admin/email-constructors.titles')); ?>

<?php $__env->startSection('buttons'); ?>
    <a href="<?php echo e(route('admin.email-constructor.create')); ?>" class="btn btn-primary"><?php echo e(__('admin/email-constructors.add')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $emailConstructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emailConstructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($emailConstructor->name); ?></td>
                    <td class="text-end">
                        <a href="<?php echo e(route('admin.email-constructor.show', $emailConstructor)); ?>" target="_blank" class="btn btn-secondary">
                            <i class="fa-regular fa-eye"></i>
                        </a>

                        <a href="<?php echo e(route('admin.email-constructor.edit', $emailConstructor)); ?>" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="<?php echo e(route('admin.email-constructor.destroy', $emailConstructor)); ?>" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить купон?')">
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

<?php echo e($emailConstructors->links('vendor.pagination.bootstrap-5')); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/email-constructors.blade.php ENDPATH**/ ?>