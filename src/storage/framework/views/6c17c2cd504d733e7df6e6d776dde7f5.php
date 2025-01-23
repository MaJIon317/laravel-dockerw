<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="<?php echo e(route('admin.dashboard')); ?>">Миллион Открыток</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
     
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?php echo e(route('admin.admins.edit', auth()->guard('admin')->user())); ?>">Settings</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route_key => $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!$route['children']): ?>
                            <a class="nav-link <?php if(isset($route['active']) && !empty($route['active'])): ?> active <?php endif; ?>" href="<?php echo e($route['href']); ?>">
                                <?php if($route['icon']): ?>
                                <div class="sb-nav-link-icon">
                                  <i class="fas <?php echo e($route['icon']); ?>"></i>
                                </div>
                                <?php endif; ?>
                                <?php echo e($route['name']); ?>

                            </a>
                        <?php else: ?>
                            <a class="nav-link <?php if(isset($route['active']) && !empty($route['active'])): ?> active <?php endif; ?> collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts<?php echo e($route_key); ?>" aria-expanded="false" aria-controls="collapseLayouts<?php echo e($route_key); ?>">
                                <?php if($route['icon']): ?>
                                <div class="sb-nav-link-icon">
                                  <i class="<?php echo e($route['icon']); ?>"></i>
                                </div>
                                <?php endif; ?>
                                <?php echo e($route['name']); ?>

                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?php if(isset($route['active']) && !empty($route['active'])): ?> show <?php endif; ?>" id="collapseLayouts<?php echo e($route_key); ?>" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <?php $__currentLoopData = $route['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <a class="nav-link <?php if(isset($children['active']) && !empty($children['active'])): ?> active <?php endif; ?>" href="<?php echo e($children['href']); ?>"><?php echo e($children['name']); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </nav>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
                </div>
            </div>
  
            <div class="sb-sidenav-footer">
                <div class="small">Вы авторизованы как:</div>
                <?php echo e(auth()->guard('admin')->user()->name); ?>

            </div>
      
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main class="mb-4">
            <div class="container-fluid px-4 mb-4">
                <div class="row align-items-center mt-4 mb-3">
                    <div class="col">
                        <h1 class="mt-0 mb-0"><?php echo $__env->yieldContent('title'); ?></h1>
                    </div>
                    <div class="col-auto text-end">
                        <?php echo $__env->yieldContent('buttons'); ?>
                    </div>
                </div>

                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle me-2" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                        </svg>
                        <div>
                            <?php echo e(Session::get('success')); ?>

                        </div>
                    </div>
                <?php endif; ?>

                <?php if(Session::has('error')): ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle me-2" viewBox="0 0 16 16">
                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                        </svg>
                        <div>
                            <?php echo e(Session::get('error')); ?>

                        </div>
                    </div>
                <?php endif; ?>
                
                <?php /**PATH /var/www/resources/views/admin/partials/header.blade.php ENDPATH**/ ?>