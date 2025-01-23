<?php $__env->startSection('title', __('admin/categories.titles')); ?>

<?php $__env->startSection('buttons'); ?>
    <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary"><?php echo e(__('admin/categories.add')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($category->id); ?></th>
                    <td><?php echo e($category->title); ?></td>
                    <td class="text-end">
                        <a href="<?php echo e(route('category', $category->slug)); ?>" title="Детали" class="btn btn-secondary" target="_blank"><i class="fa-regular fa-eye"></i></a>

                        <a href="<?php echo e(route('admin.categories.edit', $category)); ?>" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="<?php echo e(route('admin.categories.destroy', $category)); ?>" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить статью?')">
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

<?php echo e($categories->links('vendor.pagination.bootstrap-5')); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/categories.blade.php ENDPATH**/ ?>