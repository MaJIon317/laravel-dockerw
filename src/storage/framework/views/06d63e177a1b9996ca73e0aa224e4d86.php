<?php $__env->startSection('title', __('admin/feedbacks.titles')); ?>

<?php $__env->startSection('buttons'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Тип</th>
                <th scope="col">Клиент</th>
                <th scope="col">E-mail</th>
                <th scope="col">Телефон</th>
                <th scope="col">Комментарий</th>
                <th scope="col">Решение</th>
                <th scope="col" class="text-center">Статус</th>
                <th scope="col">Отправлено</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($user = $feedback->user ?? null); ?>
                <tr>
                    <th scope="row">
                        <a href="<?php echo e($feedback->senturl); ?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="С какой страницы отправлена форма">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                    </th>
                    <td><?php echo e($feedback->code); ?></td>
                    <td>
                        <?php if($user): ?>
                            <a href="<?php echo e(route('admin.users.edit', $user)); ?>" target="_blank"><?php echo e($feedback->name ? $feedback->name : ($user ? $user->name : '-')); ?></a> 
                        <?php else: ?>
                            <?php echo e($feedback->name ? $feedback->name : ($user ? $user->name : '-')); ?>

                        <?php endif; ?>
                    </td>
                    <td><?php echo e($feedback->email ? $feedback->email : ($user ? $user->email : '-')); ?></td>
                    <td><?php echo e($feedback->phone ? $feedback->phone : ($user ? $user->phone : '-')); ?></td>
                    <td><?php echo e($feedback->comment); ?></td>
                    <td><?php echo e($feedback->decision); ?></td>
                    <td class="text-center"><?php echo e(__('admin/feedbacks.status.' . $feedback->status)); ?></td>
                    <td><?php echo e($feedback->created_at->diffForHumans()); ?></td>
                    <td class="text-end">
                        <form action="<?php echo e(route('admin.feedbacks.destroy', $feedback)); ?>" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить администратора?')">
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

<?php echo e($feedbacks->links('vendor.pagination.bootstrap-5')); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/feedbacks.blade.php ENDPATH**/ ?>