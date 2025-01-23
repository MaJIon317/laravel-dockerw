<?php $__env->startSection('title', __('admin/users.titles')); ?>

<?php $__env->startSection('buttons'); ?>
    <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary"><?php echo e(__('admin/users.add')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="table-responsive">
    <table class="table table-hover align-middle" id="table-default">
        <thead>
            <tr>
                <th scope="col" style="width: 1px">#</th>
                <th scope="col" style="min-width: 110px;">ФИО</th>
                <th scope="col">E-mail</th>
                <th scope="col">Телефон</th>
                <th scope="col" class="text-center">Верификация</th>
                <th scope="col" width="110"></th>
            </tr>
           
            <tr id="filter" data-route="<?php echo e(route(\Request::route()->getName())); ?>">
                <th scope="col">#</th>
                <th scope="col" style="min-width: 110px;">
                    <input type="text" name="name" value="<?php echo e(request()->input('name')); ?>" class="form-control">
                </th>
                <th scope="col">
                    <input type="text" name="email" value="<?php echo e(request()->input('email')); ?>" class="form-control">
                </th>
                <th scope="col">
                    <input type="text" name="phone" value="<?php echo e(request()->input('phone')); ?>" class="form-control">
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($user->id); ?></th>
                    <td scope="row"><?php echo e($user->name); ?></td>
                    <td scope="row"><?php echo e($user->email); ?></td>
                    <td scope="row"><?php echo e($user->phone); ?></td>
                    <td scope="row" class="text-center"><?php echo e($user->email_verified_at ? \Carbon\Carbon::parse($user->email_verified_at)->diffForHumans() : '-'); ?></td>
                    <td class="text-end">
                        <a href="<?php echo e(route('admin.users.edit', $user)); ?>" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="<?php echo e(route('admin.users.destroy', $user)); ?>" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить пользователя?')">
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

<div class="paginationp">
    <?php echo e($users->links('vendor.pagination.bootstrap-5')); ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/users.blade.php ENDPATH**/ ?>