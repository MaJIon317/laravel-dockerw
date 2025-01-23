<?php $__env->startSection('title', __('admin/coupons.show', ['coupon' => $coupon->code])); ?>

<?php $__env->startSection('content'); ?>

<div class="alert alert-info">В разработке</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/coupon-show.blade.php ENDPATH**/ ?>