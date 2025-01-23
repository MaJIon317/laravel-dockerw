<?php $__env->startSection('title', __('admin/news.titles')); ?>

<?php $__env->startSection('buttons'); ?>
    <a href="<?php echo e(route('admin.news.create')); ?>" class="btn btn-primary"><?php echo e(__('admin/news.add')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Изображение</th>
                <th scope="col">Наименование</th>
                <th scope="col">Опубликовать</th>
                <th scope="col" class="text-center">Статус</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($new->id); ?></th>
                    <td><img src="<?php echo e(resize($new->image, 50, 50)); ?>" alt="."></td>
                    <td><?php echo e($new->title); ?></td>
                    <td><?php echo $new->publish_date ?? 'сразу'; ?></td>
                    <td class="text-center"><?php echo e(__('admin/news.status.' . $new->status)); ?></td>
                    <td class="text-end">
                        <a href="<?php echo e(route('news', $new->slug)); ?>" title="Детали" class="btn btn-secondary" target="_blank"><i class="fa-regular fa-eye"></i></a>

                        <a href="<?php echo e(route('admin.news.edit', $new)); ?>" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="<?php echo e(route('admin.news.destroy', $new)); ?>" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить новость?')">
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

<?php echo e($news->links('vendor.pagination.bootstrap-5')); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/news.blade.php ENDPATH**/ ?>