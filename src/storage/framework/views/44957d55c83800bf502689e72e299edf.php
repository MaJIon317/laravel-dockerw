<?php 

    $section_home_slider_count = 0;

    $sectioHomes = array(
        array(
            'name' => 'Слайдер (1075 х 400 px)',
            'value' => 'slider',
        ),
        array(
            'name' => 'Баннер 1 (300 х 400 px)',
            'value' => 'banner_1',
        ),
        array(
            'name' => 'Баннер 2 (528 х 180 px)',
            'value' => 'banner_2',
        ),
        array(
            'name' => 'Баннер 3 (528 х 180 px)',
            'value' => 'banner_3',
        ),
        array(
            'name' => 'Баннер 4 (300 х 180 px)',
            'value' => 'banner_4',
        ),
    );

    $pages = [
        'home' => 'Главная', 
        'catalog' => 'Каталог', 
        'newses' => 'Новости',
        'articles' => 'Статьи',
        'compilation_new' => 'Новинки',
        'compilation_hit' => 'Хиты продаж',
        'contact' => 'Контакты',
        'unsubscribe' => 'Отписка от рассылки',
    ];

    $checked_properties = isset(old('1c_exchange')['property_to_attribute']) ? old('1c_exchange')['property_to_attribute'] : ($settings->get('1c_exchange')['property_to_attribute'] ?? []);

    $log_types = array(
        'debug' => __('Detailed information for debugging purposes, such as variable values, function calls, or SQL queries.'),
        'info' => __('General information that is useful for understanding the normal flow of an application, such as user actions, system events, or performance metrics.'),
        'notice' => __('Important information that is not an error, but that may require attention, such as configuration changes, outdated features, or problems with external services.'),
        'warning' => __('Potential issues that may affect the functionality or performance of the application, but are not critical or fatal, such as validation errors, missing resources, or slow responses.'),
        'error' => __('Actual errors that prevent the application from performing its intended task, such as exceptions, database errors, or network failures.'),
        'critical' => __('Serious errors that require immediate attention and may cause the application to crash or make it unavailable, such as memory leaks, disk crashes, or security breaches.'),
        'alert' => __('Urgent errors that require human intervention and may affect other systems or services that depend on the application, such as payment failures, data corruption, or system overload.'),
        'emergency' => __('Catastrophic errors that make the application completely unusable and may require a reboot or system restore, such as kernel panic, hardware failures, or power outages.'),
    );

?>




<?php $__env->startSection('title', __('admin/settings.titles')); ?>

<?php $__env->startSection('buttons'); ?>
    <button type="submit" class="btn btn-primary" form="form-default"><?php echo e(__('admin/header.save')); ?></button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form method="post" enctype="multipart/form-data" action="<?php echo e($action); ?>" id="form-default">
    <?php echo csrf_field(); ?>

    <?php if(isset($article)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    
    <ul class="nav nav-tabs mb-3" id="defaultTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">Основные</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="menu-tab" data-bs-toggle="tab" data-bs-target="#menu" type="button" role="tab" aria-controls="menu" aria-selected="false">Меню</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="integration-tab" data-bs-toggle="tab" data-bs-target="#integration" type="button" role="tab" aria-controls="integration" aria-selected="false">Интеграции</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="order-tab" data-bs-toggle="tab" data-bs-target="#order" type="button" role="tab" aria-controls="order" aria-selected="false">Заказ</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="menu-footer-tab" data-bs-toggle="tab" data-bs-target="#menu-footer" type="button" role="tab" aria-controls="menu-footer" aria-selected="false">Меню в подвале</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="menu-catalog-tab" data-bs-toggle="tab" data-bs-target="#menu-catalog" type="button" role="tab" aria-controls="menu-catalog" aria-selected="false">Меню каталога</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="socials-tab" data-bs-toggle="tab" data-bs-target="#socials" type="button" role="tab" aria-controls="socials" aria-selected="false">Соц сети</button>
        </li>
    
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="meta-tab" data-bs-toggle="tab" data-bs-target="#meta" type="button" role="tab" aria-controls="meta" aria-selected="false">Meta данные</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="section-tab" data-bs-toggle="tab" data-bs-target="#section" type="button" role="tab" aria-controls="section" aria-selected="false">Секции</button>
        </li>

        <li class="nav-item" role="1c-exchange">
            <button class="nav-link" id="1c-exchange-tab" data-bs-toggle="tab" data-bs-target="#1c-exchange" type="button" role="tab" aria-controls="1c-exchange" aria-selected="false">1c - синхронизация</button>
        </li>

        <li class="nav-item" role="unlayer">
            <button class="nav-link" id="unlayer-tab" data-bs-toggle="tab" data-bs-target="#unlayer" type="button" role="tab" aria-controls="unlayer" aria-selected="false">Unlayer.com</button>
        </li>

        
        <li class="nav-item" role="telegram">
            <button class="nav-link" id="telegram-tab" data-bs-toggle="tab" data-bs-target="#telegram" type="button" role="tab" aria-controls="telegram" aria-selected="false">Телеграм</button>
        </li>

    </ul> 
    <div class="tab-content" id="defaultTabContent">
        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'name','value' => old('name') ?? $settings->get('name') ?? null,'label' => 'Наименование','placeholder' => 'Наименование','toltip' => 'Коротко назовите ваш проект','error' => $errors->first('name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'name','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('name') ?? $settings->get('name') ?? null),'label' => 'Наименование','placeholder' => 'Наименование','toltip' => 'Коротко назовите ваш проект','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('name'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
                
            <?php if (isset($component)) { $__componentOriginalc490dc6616c06302941647735bdb8987 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc490dc6616c06302941647735bdb8987 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['name' => 'description','class' => 'editor','value' => old('description') ?? $settings->get('description') ?? null,'label' => 'Описание','placeholder' => 'Описание','toltip' => 'Подробно опишите ваш проект. Выводится во всех блоках «О нас»','error' => $errors->first('description')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'description','class' => 'editor','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('description') ?? $settings->get('description') ?? null),'label' => 'Описание','placeholder' => 'Описание','toltip' => 'Подробно опишите ваш проект. Выводится во всех блоках «О нас»','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('description'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc490dc6616c06302941647735bdb8987)): ?>
<?php $attributes = $__attributesOriginalc490dc6616c06302941647735bdb8987; ?>
<?php unset($__attributesOriginalc490dc6616c06302941647735bdb8987); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc490dc6616c06302941647735bdb8987)): ?>
<?php $component = $__componentOriginalc490dc6616c06302941647735bdb8987; ?>
<?php unset($__componentOriginalc490dc6616c06302941647735bdb8987); ?>
<?php endif; ?>  
 
            <!-- Content tab -->
            <div class="row">
                <div class="col-auto">
                    <?php if (isset($component)) { $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.image','data' => ['name' => 'image','value' => old('favicon') ?? $settings->get('favicon') ?? null,'path' => 'settings','label' => 'Иконка','toltip' => 'Favicon','error' => $errors->first('favicon')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'image','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('favicon') ?? $settings->get('favicon') ?? null),'path' => 'settings','label' => 'Иконка','toltip' => 'Favicon','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('favicon'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $attributes = $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $component = $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>
                </div>
                <div class="col-auto">
                    <?php if (isset($component)) { $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.image','data' => ['name' => 'image','value' => old('logo') ?? $settings->get('logo') ?? null,'path' => 'settings','label' => 'Логотип','toltip' => 'Будет выводиться на сайте, в печтаных формах и тд','error' => $errors->first('logo')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'image','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('logo') ?? $settings->get('logo') ?? null),'path' => 'settings','label' => 'Логотип','toltip' => 'Будет выводиться на сайте, в печтаных формах и тд','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('logo'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $attributes = $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $component = $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>

                </div>
                <div class="col-auto">
                    <?php if (isset($component)) { $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.image','data' => ['name' => 'image','value' => old('image') ?? $settings->get('image') ?? null,'path' => 'settings','label' => 'Картинка','toltip' => 'Желательно добавить изображение команды или компании. Выводится в блоках «О нас»','error' => $errors->first('image')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'image','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('image') ?? $settings->get('image') ?? null),'path' => 'settings','label' => 'Картинка','toltip' => 'Желательно добавить изображение команды или компании. Выводится в блоках «О нас»','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('image'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $attributes = $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $component = $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>
                </div>
            </div>

                 
            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'address','value' => old('address') ?? $settings->get('address') ?? null,'label' => 'Адрес','placeholder' => 'Адрес','error' => $errors->first('address')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'address','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('address') ?? $settings->get('address') ?? null),'label' => 'Адрес','placeholder' => 'Адрес','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('address'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
                
            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'geocode','value' => old('geocode') ?? $settings->get('geocode') ?? null,'label' => 'Координаты','placeholder' => 'Координаты','title' => 'Заполнять через запятую (долгота,ширина)','error' => $errors->first('geocode')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'geocode','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('geocode') ?? $settings->get('geocode') ?? null),'label' => 'Координаты','placeholder' => 'Координаты','title' => 'Заполнять через запятую (долгота,ширина)','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('geocode'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'mode','value' => old('mode') ?? $settings->get('mode') ?? null,'label' => 'Режим работы','placeholder' => 'Режим работы','error' => $errors->first('mode')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'mode','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('mode') ?? $settings->get('mode') ?? null),'label' => 'Режим работы','placeholder' => 'Режим работы','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('mode'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalc490dc6616c06302941647735bdb8987 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc490dc6616c06302941647735bdb8987 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['name' => 'mode_detail','value' => old('mode_detail') ?? $settings->get('mode_detail') ?? null,'label' => 'Режим работы по дням','placeholder' => 'Режим работы по дням','toltip' => 'Опишите режим работы по дням','error' => $errors->first('mode_detail')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'mode_detail','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('mode_detail') ?? $settings->get('mode_detail') ?? null),'label' => 'Режим работы по дням','placeholder' => 'Режим работы по дням','toltip' => 'Опишите режим работы по дням','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('mode_detail'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc490dc6616c06302941647735bdb8987)): ?>
<?php $attributes = $__attributesOriginalc490dc6616c06302941647735bdb8987; ?>
<?php unset($__attributesOriginalc490dc6616c06302941647735bdb8987); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc490dc6616c06302941647735bdb8987)): ?>
<?php $component = $__componentOriginalc490dc6616c06302941647735bdb8987; ?>
<?php unset($__componentOriginalc490dc6616c06302941647735bdb8987); ?>
<?php endif; ?> 

            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'phone','value' => old('phone') ?? $settings->get('phone') ?? null,'label' => 'Телефон (городской)','placeholder' => 'Телефон(городской)','error' => $errors->first('phone')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'phone','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('phone') ?? $settings->get('phone') ?? null),'label' => 'Телефон (городской)','placeholder' => 'Телефон(городской)','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('phone'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
                
            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'phone_federal','value' => old('phone_federal') ?? $settings->get('phone_federal') ?? null,'label' => 'Телефон (федеральный)','placeholder' => 'Телефон (федеральный)','error' => $errors->first('phone_federal')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'phone_federal','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('phone_federal') ?? $settings->get('phone_federal') ?? null),'label' => 'Телефон (федеральный)','placeholder' => 'Телефон (федеральный)','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('phone_federal'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'email','name' => 'email','value' => old('email') ?? $settings->get('email') ?? null,'label' => 'E-mail','placeholder' => 'E-mail','toltip' => 'Отображается на сайте клиентам','error' => $errors->first('email')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'email','name' => 'email','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('email') ?? $settings->get('email') ?? null),'label' => 'E-mail','placeholder' => 'E-mail','toltip' => 'Отображается на сайте клиентам','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('email'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
                 
            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'email','name' => 'email_send','value' => old('email_send') ?? $settings->get('email_send') ?? null,'label' => 'E-mail отправителя','placeholder' => 'E-mail отправителя','toltip' => 'Указывается в письмах клиентам. Обязательно при редактировании поля сообщить разработчику о смене E-mail отправителя','error' => $errors->first('email_send')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'email','name' => 'email_send','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('email_send') ?? $settings->get('email_send') ?? null),'label' => 'E-mail отправителя','placeholder' => 'E-mail отправителя','toltip' => 'Указывается в письмах клиентам. Обязательно при редактировании поля сообщить разработчику о смене E-mail отправителя','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('email_send'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
                 
                 
            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'page_limits','value' => old('page_limits') ?? $settings->get('page_limits') ?? null,'label' => 'Варианты кол-ва элементов','placeholder' => 'Варианты кол-ва элементов','toltip' => 'Указывать через запятую. Так же в списке должен быть вариант кол-ва элементов по-умолчанию','error' => $errors->first('page_limits')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'page_limits','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('page_limits') ?? $settings->get('page_limits') ?? null),'label' => 'Варианты кол-ва элементов','placeholder' => 'Варианты кол-ва элементов','toltip' => 'Указывать через запятую. Так же в списке должен быть вариант кол-ва элементов по-умолчанию','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('page_limits'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'number','name' => 'page_limit','value' => old('page_limit') ?? $settings->get('page_limit') ?? null,'label' => 'Кол-во элементов по-умолчанию','placeholder' => 'Кол-во элементов по-умолчанию','error' => $errors->first('page_limit')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','name' => 'page_limit','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('page_limit') ?? $settings->get('page_limit') ?? null),'label' => 'Кол-во элементов по-умолчанию','placeholder' => 'Кол-во элементов по-умолчанию','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('page_limit'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
 
 
 
            <!-- END Content tab -->

        </div>

        <div class="tab-pane fade" id="integration" role="tabpanel" aria-labelledby="integration-tab">
            <!-- Content tab -->

            <fieldset>
                <legend>Яндекс</legend>
               
                <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'yandex_token','value' => old('yandex_token') ?? $settings->get('yandex_token') ?? null,'label' => 'Токен карты','placeholder' => 'Токен карты','error' => $errors->first('yandex_token')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'yandex_token','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('yandex_token') ?? $settings->get('yandex_token') ?? null),'label' => 'Токен карты','placeholder' => 'Токен карты','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('yandex_token'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'yandex_review','value' => old('yandex_review') ?? $settings->get('yandex_review') ?? null,'label' => 'Ссылка на отзывы','placeholder' => 'Ссылка на отзывы','error' => $errors->first('yandex_review')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'yandex_review','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('yandex_review') ?? $settings->get('yandex_review') ?? null),'label' => 'Ссылка на отзывы','placeholder' => 'Ссылка на отзывы','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('yandex_review'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

            </fieldset>

            <fieldset>
                <legend>Dadata (подсказки)</legend>

                <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'dadata[key]','value' => old('dadata.key') ?? $settings->get('dadata')['key'] ?? null,'label' => 'API-ключ','placeholder' => 'API-ключ','error' => $errors->first('dadata.key')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'dadata[key]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('dadata.key') ?? $settings->get('dadata')['key'] ?? null),'label' => 'API-ключ','placeholder' => 'API-ключ','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('dadata.key'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'dadata[secret]','value' => old('dadata.secret') ?? $settings->get('dadata')['secret'] ?? null,'label' => 'Секретный ключ','placeholder' => 'Секретный ключ','error' => $errors->first('dadata.secret')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'dadata[secret]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('dadata.secret') ?? $settings->get('dadata')['secret'] ?? null),'label' => 'Секретный ключ','placeholder' => 'Секретный ключ','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('dadata.secret'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

            </fieldset>


            <!-- END Content tab -->
        </div>
    
        <div class="tab-pane fade" id="menu" role="tabpanel" aria-labelledby="menu-tab">
            <!-- Content tab -->

            <?php ($menu_count = 0); ?>
            <?php ($menu_count_children = 0); ?>
 
            <div class="row">
                <div class="col-100 d-flex flex-column gap-3">
                    <?php if($settings->get('menu')): ?>
                        <?php $__currentLoopData = $settings->get('menu'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex flex-column gap-2">
                                <div class="input-group">
                                    <button type="button" class="btn btn-secondory"> <i class="fa-solid fa-ellipsis-vertical"></i></button>
                                    <input type="text" name="menu[<?php echo e($menu_count); ?>][link]" value="<?php echo e($menu['link'] ?? ''); ?>" placeholder="Ссылка" class="form-control">
                                    <input type="text" name="menu[<?php echo e($menu_count); ?>][name]" value="<?php echo e($menu['name'] ?? ''); ?>" placeholder="Наименование" class="form-control">
                                    <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>
                                    <button type="button" class="btn btn-primary" onclick="addMenuChildren(this, <?php echo e($menu_count); ?>)"><i class="fa-solid fa-plus"></i></button>
                                </div>

                                <?php if(isset($menu['items']) && !empty($menu['items'])): ?>
                                    <?php $__currentLoopData = $menu['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="d-flex flex-column gap-2">
                                            <div class="input-group">
                                                <button type="button" class="btn btn-secondory"> <i class="fa-solid fa-ellipsis-vertical"></i> <i class="fa-solid fa-ellipsis-vertical"></i></button>
                                                <input type="text" name="menu[<?php echo e($menu_count); ?>][items][<?php echo e($menu_count_children); ?>][link]" value="<?php echo e($children['link'] ?? ''); ?>" placeholder="Ссылка" class="form-control">
                                                <input type="text" name="menu[<?php echo e($menu_count); ?>][items][<?php echo e($menu_count_children); ?>][name]" value="<?php echo e($children['name'] ?? ''); ?>" placeholder="Наименование" class="form-control">
                                                <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>
                                            </div>
                                        </div>  
                                        <?php ($menu_count_children++); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>

                            <?php ($menu_count++); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
 
                </div>
                <div class="col-100 text-end mt-3">
                    <button type="button" class="btn btn-primary" onclick="addMenu(this)"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>

            <!-- END Content tab -->
        </div>

        <div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
            <!-- Content tab -->

            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'number','name' => 'order_free','value' => old('order_free') ?? $settings->get('order_free') ?? null,'label' => 'Бесплатная доставка от суммы','placeholder' => 'Бесплатная доставка от суммы','error' => $errors->first('order_free')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','name' => 'order_free','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('order_free') ?? $settings->get('order_free') ?? null),'label' => 'Бесплатная доставка от суммы','placeholder' => 'Бесплатная доставка от суммы','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('order_free'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
  
            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'number','name' => 'order_min','value' => old('order_min') ?? $settings->get('order_min') ?? null,'label' => 'Минимальная сумма заказа','placeholder' => 'Минимальная сумма заказа','error' => $errors->first('order_min')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','name' => 'order_min','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('order_min') ?? $settings->get('order_min') ?? null),'label' => 'Минимальная сумма заказа','placeholder' => 'Минимальная сумма заказа','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('order_min'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

            <!-- END Content tab -->
        </div>

        <div class="tab-pane fade" id="menu-footer" role="tabpanel" aria-labelledby="menu-footer-tab">
            <!-- Content tab -->

            <?php ($footer_menu_count = 0); ?>
            <?php ($footer_menu_count_children = 0); ?>
 
            <div class="row">
                <div class="col-100 d-flex flex-column gap-3">
                    <?php if($settings->get('footer_menu')): ?>
                        <?php $__currentLoopData = $settings->get('footer_menu'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex flex-column gap-2">
                                <div class="input-group">
                                    <button type="button" class="btn btn-secondory"> <i class="fa-solid fa-ellipsis-vertical"></i></button>
                                    <input type="text" name="footer_menu[<?php echo e($footer_menu_count); ?>][link]" value="<?php echo e($menu['link'] ?? ''); ?>" placeholder="Ссылка" class="form-control">
                                    <input type="text" name="footer_menu[<?php echo e($footer_menu_count); ?>][name]" value="<?php echo e($menu['name'] ?? ''); ?>" placeholder="Наименование" class="form-control">
                                    <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>
                                    <button type="button" class="btn btn-primary" onclick="addMenuFooterChildren(this, <?php echo e($footer_menu_count); ?>)"><i class="fa-solid fa-plus"></i></button>
                                </div>

                                <?php if(isset($menu['items']) && !empty($menu['items'])): ?>
                                    <?php $__currentLoopData = $menu['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="d-flex flex-column gap-2">
                                            <div class="input-group">
                                                <button type="button" class="btn btn-secondory"> <i class="fa-solid fa-ellipsis-vertical"></i> <i class="fa-solid fa-ellipsis-vertical"></i></button>
                                                <input type="text" name="footer_menu[<?php echo e($footer_menu_count); ?>][items][<?php echo e($footer_menu_count_children); ?>][link]" value="<?php echo e($children['link'] ?? ''); ?>" placeholder="Ссылка" class="form-control">
                                                <input type="text" name="footer_menu[<?php echo e($footer_menu_count); ?>][items][<?php echo e($footer_menu_count_children); ?>][name]" value="<?php echo e($children['name'] ?? ''); ?>" placeholder="Наименование" class="form-control">
                                                <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>
                                            </div>
                                        </div>  
                                        <?php ($footer_menu_count_children++); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>

                            <?php ($footer_menu_count++); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
 
                </div>
                <div class="col-100 text-end mt-3">
                    <button type="button" class="btn btn-primary" onclick="addMenuFooter(this)"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>

            <!-- END Content tab -->
        </div>

        <div class="tab-pane fade" id="socials" role="tabpanel" aria-labelledby="socials-tab">
            <!-- Content tab -->

            <?php ($socials_count = 0); ?>
        
            <div class="row">
                <div class="col-100 d-flex flex-column gap-3">
                    <?php if($settings->get('socials')): ?>
                        <?php $__currentLoopData = $settings->get('socials'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex flex-column gap-2">
                                <div class="input-group">
                                    <button type="button" class="btn btn-secondory"> <i class="fa-solid fa-ellipsis-vertical"></i></button>
                                    <input type="hidden" name="socials[<?php echo e($socials_count); ?>][key]" value="<?php echo e($menu['key'] ?? ''); ?>">
                                    <input type="text" value="<?php echo e($menu['key'] ?? ''); ?>" placeholder="Ключ" class="form-control" disabled>
                                    <input type="text" name="socials[<?php echo e($socials_count); ?>][link]" value="<?php echo e($menu['link'] ?? ''); ?>" placeholder="Ссылка" class="form-control">
                                    <input type="text" name="socials[<?php echo e($socials_count); ?>][name]" value="<?php echo e($menu['name'] ?? ''); ?>" placeholder="Наименование" class="form-control">
                                    <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>
                                </div>
                            </div>
                            <?php ($socials_count++); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="col-100 text-end mt-3">
                    <button type="button" class="btn btn-primary" onclick="addSocials(this)"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>

            <!-- END Content tab -->
        </div>

        <div class="tab-pane fade" id="menu-catalog" role="tabpanel" aria-labelledby="menu-catalog-tab">
            <!-- Content tab -->

            <fieldset>
                <legend>Баннеры</legend>

                <?php ($menu_banner_count = 0); ?>
            
                <div class="row">
                    <div class="col-100 row gap-3">
                        <?php if($settings->get('menu_banner')): ?>
                            <?php $__currentLoopData = $settings->get('menu_banner'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-auto">
                                    <div class="div">
                                        <?php if (isset($component)) { $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.image','data' => ['name' => 'menu_banner['.e($menu_banner_count).'][image]','value' => $menu['link'] ?? '','path' => 'articles','label' => 'Картинка','error' => $errors->first('image')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'menu_banner['.e($menu_banner_count).'][image]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($menu['link'] ?? ''),'path' => 'articles','label' => 'Картинка','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('image'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $attributes = $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $component = $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>
                                            
                                        <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'menu_banner['.e($menu_banner_count).'][link]','value' => $menu['link'] ?? '','label' => 'Ссылка','placeholder' => 'Ссылка','error' => $errors->first('title')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'menu_banner['.e($menu_banner_count).'][link]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($menu['link'] ?? ''),'label' => 'Ссылка','placeholder' => 'Ссылка','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('title'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
                                        
                                        <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </div>
                                <?php ($menu_banner_count++); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-100 text-end mt-3">
                        <button type="button" class="btn btn-primary" onclick="addMenuBanner(this)"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
                
            </fieldset>


            <!-- END Content tab -->
        </div>

        <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-tab">
            <!-- Content tab -->

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col"><?php echo e(__('# Страница')); ?></th>
                            <th scope="col"><?php echo e(__('H1')); ?></th>
                            <th scope="col"><?php echo e(__('Meta заголовок')); ?></th>
                            <th scope="col"><?php echo e(__('Meta описание')); ?></th>
                            <th scope="col"><?php echo e(__('Meta ключевые слова')); ?></th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($page); ?></td>
                            <td>
                                <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['classblock' => 'mb-0 w-100','type' => 'text','name' => 'meta['.e($key).'][h1]','value' => isset(old('meta')[$key]['h1']) ? old('meta')[$key]['h1'] : (isset($settings->get('meta')[$key]['h1']) ? $settings->get('meta')[$key]['h1'] : ''),'placeholder' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['classblock' => 'mb-0 w-100','type' => 'text','name' => 'meta['.e($key).'][h1]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(isset(old('meta')[$key]['h1']) ? old('meta')[$key]['h1'] : (isset($settings->get('meta')[$key]['h1']) ? $settings->get('meta')[$key]['h1'] : '')),'placeholder' => '']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

                            </td>
                            <td>
                                <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['classblock' => 'mb-0 w-100','type' => 'text','name' => 'meta['.e($key).'][title]','value' => isset(old('meta')[$key]['title']) ? old('meta')[$key]['title'] : (isset($settings->get('meta')[$key]['title']) ? $settings->get('meta')[$key]['title'] : ''),'placeholder' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['classblock' => 'mb-0 w-100','type' => 'text','name' => 'meta['.e($key).'][title]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(isset(old('meta')[$key]['title']) ? old('meta')[$key]['title'] : (isset($settings->get('meta')[$key]['title']) ? $settings->get('meta')[$key]['title'] : '')),'placeholder' => '']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

                            </td>

                            <td>
                                <?php if (isset($component)) { $__componentOriginalc490dc6616c06302941647735bdb8987 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc490dc6616c06302941647735bdb8987 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['classblock' => 'mb-0 w-100','rows' => '2','name' => 'meta['.e($key).'][description]','value' => isset(old('meta')[$key]['description']) ? old('meta')[$key]['description'] : (isset($settings->get('meta')[$key]['description']) ? $settings->get('meta')[$key]['description'] : ''),'placeholder' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['classblock' => 'mb-0 w-100','rows' => '2','name' => 'meta['.e($key).'][description]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(isset(old('meta')[$key]['description']) ? old('meta')[$key]['description'] : (isset($settings->get('meta')[$key]['description']) ? $settings->get('meta')[$key]['description'] : '')),'placeholder' => '']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc490dc6616c06302941647735bdb8987)): ?>
<?php $attributes = $__attributesOriginalc490dc6616c06302941647735bdb8987; ?>
<?php unset($__attributesOriginalc490dc6616c06302941647735bdb8987); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc490dc6616c06302941647735bdb8987)): ?>
<?php $component = $__componentOriginalc490dc6616c06302941647735bdb8987; ?>
<?php unset($__componentOriginalc490dc6616c06302941647735bdb8987); ?>
<?php endif; ?>
                            </td>

                            <td>
                                <?php if (isset($component)) { $__componentOriginalc490dc6616c06302941647735bdb8987 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc490dc6616c06302941647735bdb8987 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['classblock' => 'mb-0 w-100','rows' => '2','name' => 'meta['.e($key).'][keyword]','value' => isset(old('meta')[$key]['keyword']) ? old('meta')[$key]['keyword'] : (isset($settings->get('meta')[$key]['keyword']) ? $settings->get('meta')[$key]['keyword'] : ''),'placeholder' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['classblock' => 'mb-0 w-100','rows' => '2','name' => 'meta['.e($key).'][keyword]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(isset(old('meta')[$key]['keyword']) ? old('meta')[$key]['keyword'] : (isset($settings->get('meta')[$key]['keyword']) ? $settings->get('meta')[$key]['keyword'] : '')),'placeholder' => '']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc490dc6616c06302941647735bdb8987)): ?>
<?php $attributes = $__attributesOriginalc490dc6616c06302941647735bdb8987; ?>
<?php unset($__attributesOriginalc490dc6616c06302941647735bdb8987); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc490dc6616c06302941647735bdb8987)): ?>
<?php $component = $__componentOriginalc490dc6616c06302941647735bdb8987; ?>
<?php unset($__componentOriginalc490dc6616c06302941647735bdb8987); ?>
<?php endif; ?>
                            </td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <!-- END Content tab -->
        </div>


        <div class="tab-pane fade" id="section" role="tabpanel" aria-labelledby="section-tab">
            <!-- Content tab -->

            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" style="min-width: max-content;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-sectioHome-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectioHome" type="button" role="tab" aria-controls="v-pills-sectioHome" aria-selected="true">Первый экран</button>
                    <button class="nav-link" id="v-pills-sectioAdvantage-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectioAdvantage" type="button" role="tab" aria-controls="v-pills-sectioAdvantage" aria-selected="false">Преимущества</button>
                    <button class="nav-link" id="v-pills-sectioWork-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectioWork" type="button" role="tab" aria-controls="v-pills-sectioWork" aria-selected="false">Как мы работаем</button>
                </div>
                <div class="tab-content w-100" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-sectioHome" role="tabpanel" aria-labelledby="v-pills-sectioHome-tab">
                    
                        <?php $__currentLoopData = $sectioHomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sectioHome): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <fieldset class="mb-3 pb-3 border-bottom">
                                <legend><?php echo e($sectioHome['name']); ?>

                                    <button type="button" class="btn btn-primary btn-sm" onclick="addSectioHomeBanner(this, '<?php echo e($sectioHome['value']); ?>')"><i class="fa-solid fa-plus"></i></button>
                                </legend>

                                <div class="row gap-3">
                                    <?php if($settings->get('section_home') && isset($settings->get('section_home')[$sectioHome['value']])): ?>
                                        <?php $__currentLoopData = $settings->get('section_home')[$sectioHome['value']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-auto position-relative" data-sort-item>
                                                <div class="div">
                                                    <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'section_home['.e($sectioHome['value']).']['.e($section_home_slider_count).'][title]','value' => $item['title'] ?? '','label' => 'Название','placeholder' => 'Название']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'section_home['.e($sectioHome['value']).']['.e($section_home_slider_count).'][title]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['title'] ?? ''),'label' => 'Название','placeholder' => 'Название']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

                                                    <?php if (isset($component)) { $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.image','data' => ['name' => 'section_home['.e($sectioHome['value']).']['.e($section_home_slider_count).'][image]','value' => $item['image'] ?? '','path' => 'settings','label' => 'Картинка']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'section_home['.e($sectioHome['value']).']['.e($section_home_slider_count).'][image]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['image'] ?? ''),'path' => 'settings','label' => 'Картинка']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $attributes = $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $component = $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>
                                                    
                                                    <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'section_home['.e($sectioHome['value']).']['.e($section_home_slider_count).'][link]','value' => $item['link'] ?? '','label' => 'Ссылка','placeholder' => 'Ссылка']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'section_home['.e($sectioHome['value']).']['.e($section_home_slider_count).'][link]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['link'] ?? ''),'label' => 'Ссылка','placeholder' => 'Ссылка']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

                                                    <?php if (isset($component)) { $__componentOriginalffcba3288e043ebd460b02d6158f8b61 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalffcba3288e043ebd460b02d6158f8b61 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.checkbox','data' => ['type' => 'checkbox','name' => 'section_home['.e($sectioHome['value']).']['.e($section_home_slider_count).'][status]','value' => 1,'label' => 'Статус','placeholder' => 'Статус','checked' => (old('section_home.' . $sectioHome['value'] . '.' . $section_home_slider_count . '.status') || ($settings->get('section_home')[$sectioHome['value']][$section_home_slider_count]['status'] ?? null))]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkbox','name' => 'section_home['.e($sectioHome['value']).']['.e($section_home_slider_count).'][status]','value' => 1,'label' => 'Статус','placeholder' => 'Статус','checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((old('section_home.' . $sectioHome['value'] . '.' . $section_home_slider_count . '.status') || ($settings->get('section_home')[$sectioHome['value']][$section_home_slider_count]['status'] ?? null)))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalffcba3288e043ebd460b02d6158f8b61)): ?>
<?php $attributes = $__attributesOriginalffcba3288e043ebd460b02d6158f8b61; ?>
<?php unset($__attributesOriginalffcba3288e043ebd460b02d6158f8b61); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalffcba3288e043ebd460b02d6158f8b61)): ?>
<?php $component = $__componentOriginalffcba3288e043ebd460b02d6158f8b61; ?>
<?php unset($__componentOriginalffcba3288e043ebd460b02d6158f8b61); ?>
<?php endif; ?>

                                                    <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>
                                                </div>
                                            </div>
                                            <?php ($section_home_slider_count++); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            
                            </fieldset>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                    <div class="tab-pane fade" id="v-pills-sectioAdvantage" role="tabpanel" aria-labelledby="v-pills-sectioAdvantage-tab">
                        <?php ($section_advantage_count = 0); ?>
                        
                        <div class="row gap-3">
                            <?php if($settings->get('section_advantage')): ?>
                                <?php $__currentLoopData = $settings->get('section_advantage'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-auto position-relative" data-sort-item>
                                        <div class="div">
                                            <?php if (isset($component)) { $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.image','data' => ['name' => 'section_advantage['.e($section_advantage_count).'][image]','value' => $item['image'] ?? '','path' => 'settings','label' => 'Картинка']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'section_advantage['.e($section_advantage_count).'][image]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['image'] ?? ''),'path' => 'settings','label' => 'Картинка']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $attributes = $__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__attributesOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1)): ?>
<?php $component = $__componentOriginal5e87b771125de6fceb414f3ebd6c12a1; ?>
<?php unset($__componentOriginal5e87b771125de6fceb414f3ebd6c12a1); ?>
<?php endif; ?>

                                            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'section_advantage['.e($section_advantage_count).'][title]','value' => $item['title'] ?? '','label' => 'Название','placeholder' => 'Название']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'section_advantage['.e($section_advantage_count).'][title]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['title'] ?? ''),'label' => 'Название','placeholder' => 'Название']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

                                            <?php if (isset($component)) { $__componentOriginalc490dc6616c06302941647735bdb8987 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc490dc6616c06302941647735bdb8987 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.textarea','data' => ['type' => 'text','rows' => '2','name' => 'section_advantage['.e($section_advantage_count).'][description]','value' => $item['description'] ?? '','label' => 'Описание','placeholder' => 'Описание']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','rows' => '2','name' => 'section_advantage['.e($section_advantage_count).'][description]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['description'] ?? ''),'label' => 'Описание','placeholder' => 'Описание']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc490dc6616c06302941647735bdb8987)): ?>
<?php $attributes = $__attributesOriginalc490dc6616c06302941647735bdb8987; ?>
<?php unset($__attributesOriginalc490dc6616c06302941647735bdb8987); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc490dc6616c06302941647735bdb8987)): ?>
<?php $component = $__componentOriginalc490dc6616c06302941647735bdb8987; ?>
<?php unset($__componentOriginalc490dc6616c06302941647735bdb8987); ?>
<?php endif; ?>
  
                                            <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>
                                        </div>
                                    </div>
                                    <?php ($section_advantage_count++); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-100 text-end mt-3">
                            <button type="button" class="btn btn-primary" onclick="addSectionAdvantage(this)"><i class="fa-solid fa-plus"></i></button>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="v-pills-sectioWork" role="tabpanel" aria-labelledby="v-pills-sectioWork-tab">

                        <?php ($section_work_count = 0); ?>
        
                        <div class="row">
                            <div class="col-100 d-flex flex-column gap-3">
                                <?php if($settings->get('section_work')): ?>
                                    <?php $__currentLoopData = $settings->get('section_work'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="d-flex flex-column gap-2">
                                            <div class="input-group">
                                                <input type="text" name="section_work[<?php echo e($section_work_count); ?>][title]" value="<?php echo e($item['title'] ?? ''); ?>" placeholder="Ссылка" class="form-control">
                                                <textarea name="section_work[<?php echo e($section_work_count); ?>][description]" placeholder="Описание" rows="1" class="form-control"><?php echo e($item['description'] ?? ''); ?></textarea>
                                                <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>
                                            </div>
                                        </div>
                                        <?php ($section_work_count++); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-100 text-end mt-3">
                                <button type="button" class="btn btn-primary" onclick="addSectionWork(this)"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- END Content tab -->
        </div>

        <div class="tab-pane fade" id="1c-exchange" role="tabpanel" aria-labelledby="1c-exchange-tab">
            <!-- Content tab -->

            <div class="mb-3">
                <label class="form-label">
                    <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Выберите свойства, которые должны добавляться к товару как характеристика">Свойство = характеристика</span>
                </label>
     
                <div class="card">
                    <div class="card-body">
                        <div class="card-text" style="max-height: 400px; overflow: auto;">
                            <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="1c_exchange[property_to_attribute][]" value="<?php echo e($property->exchange_1c); ?>" id="input-property_to_attribute-<?php echo e($property->exchange_1c); ?>"
                                        <?php if(in_array($property->exchange_1c, $checked_properties)): ?> checked <?php endif; ?>
                                    >
                                    <label class="form-check-label" for="input-property_to_attribute-<?php echo e($property->exchange_1c); ?>"><?php echo e($property->name); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        
                    </div>
                </div>
            </div>

            <fieldset>
                <legend>Связь статусов заказа</legend>
                <div class="alert alert-info" role="alert">Через запятую без пробелов и лишних символов можно связать два и более статуса заказа в 1С со статусом заказа на сайте. Не связанные статусы заказов не будут синхронизироваться.</div>
                <div class="alert alert-danger" role="alert">Обязательно наименование статуса в полях должны в точности соответствовать статусам заказа в 1С, иначе связь не будет найдена.<br><br>Внимание! Запрещено связывать одинаковые статусы заказов 1С с разными статусами заказов на сайте. В противном случае статусы будут синхронизироваться с первой связью статусов заказа.</div>

                <?php $__currentLoopData = config('general.order_statuses'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group row mb-3">
                        <label for="staticEmail" class="col-sm-2 col-form-label"><?php echo e(__(ucfirst($status))); ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="exchange_1c_statuses[<?php echo e($status); ?>]" value="<?php echo e(old('exchange_1c_statuses.' . $status) ?? $settings->get('exchange_1c_statuses')[$status] ?? null); ?>" placeholder="Наименование статуса в 1С" class="form-control">
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 
            </fieldset>
 
            <!-- END Content tab -->
        </div>

        <div class="tab-pane fade" id="unlayer" role="tabpanel" aria-labelledby="unlayer-tab">
            <!-- Content tab -->

            <div class="alert alert-info">Интеграция с <a href="https://unlayer.com/" target="_blank">unlayer.com</a> используется для функционала Конструктора e-mail писем</div>

            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'unlayer_api_key','value' => old('unlayer_api_key') ?? $settings->get('unlayer_api_key') ?? null,'label' => 'Api key','placeholder' => 'Api key','error' => $errors->first('unlayer_api_key')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'unlayer_api_key','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('unlayer_api_key') ?? $settings->get('unlayer_api_key') ?? null),'label' => 'Api key','placeholder' => 'Api key','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('unlayer_api_key'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'unlayer_project_id','value' => old('unlayer_project_id') ?? $settings->get('unlayer_project_id') ?? null,'label' => 'Project ID','placeholder' => 'Project ID','error' => $errors->first('unlayer_project_id')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'unlayer_project_id','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('unlayer_project_id') ?? $settings->get('unlayer_project_id') ?? null),'label' => 'Project ID','placeholder' => 'Project ID','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('unlayer_project_id'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'unlayer_template_id','value' => old('unlayer_template_id') ?? $settings->get('unlayer_template_id') ?? null,'label' => 'Template Id','placeholder' => 'Template Id','error' => $errors->first('unlayer_template_id')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'unlayer_template_id','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('unlayer_template_id') ?? $settings->get('unlayer_template_id') ?? null),'label' => 'Template Id','placeholder' => 'Template Id','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('unlayer_template_id'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
 
            <!-- END Content tab -->
        </div>

        

        <div class="tab-pane fade" id="telegram" role="tabpanel" aria-labelledby="log-tab">
            <!-- Content tab -->

            <fieldset>
                <legend>Логирование</legend>

                <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'password','name' => 'log_to_telegram[token]','value' => old('log_to_telegram.token') ?? ($settings->get('log_to_telegram') ? $settings->get('log_to_telegram')['token'] : null),'label' => 'Токен бота','placeholder' => 'Токен бота','error' => $errors->first('log_to_telegram.token')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'password','name' => 'log_to_telegram[token]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('log_to_telegram.token') ?? ($settings->get('log_to_telegram') ? $settings->get('log_to_telegram')['token'] : null)),'label' => 'Токен бота','placeholder' => 'Токен бота','error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->first('log_to_telegram.token'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

                    
                <div class="row">
                    <?php ($telegram_logger_row = 0); ?>

                    <?php if($settings->get('log_to_telegram') && !empty($settings->get('log_to_telegram')['chat'])): ?>
                        <?php $__currentLoopData = $settings->get('log_to_telegram')['chat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col col-sm-2 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                
                                        <?php if (isset($component)) { $__componentOriginal9a891a30d7412af52616e3394f53e72a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a891a30d7412af52616e3394f53e72a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.admin.text','data' => ['type' => 'text','name' => 'log_to_telegram[chat]['.e($telegram_logger_row).'][chat_id]','value' => old('log_to_telegram.chat.' . $telegram_logger_row . '.chat_id') ?? (isset($chat['chat_id']) ? $chat['chat_id'] : null),'label' => ''.__('User\'s Chat ID').'','placeholder' => ''.__('User\'s Chat ID').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.admin.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'log_to_telegram[chat]['.e($telegram_logger_row).'][chat_id]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('log_to_telegram.chat.' . $telegram_logger_row . '.chat_id') ?? (isset($chat['chat_id']) ? $chat['chat_id'] : null)),'label' => ''.__('User\'s Chat ID').'','placeholder' => ''.__('User\'s Chat ID').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $attributes = $__attributesOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__attributesOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a891a30d7412af52616e3394f53e72a)): ?>
<?php $component = $__componentOriginal9a891a30d7412af52616e3394f53e72a; ?>
<?php unset($__componentOriginal9a891a30d7412af52616e3394f53e72a); ?>
<?php endif; ?>

                                        
                                        <div class="form-label"><?php echo e(__('Send logs')); ?>:</div>
                                
                                        <?php $__currentLoopData = $log_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="log_to_telegram[chat][<?php echo e($telegram_logger_row); ?>][type][<?php echo e($key); ?>]" id="input-telegram-log-<?php echo e($telegram_logger_row); ?>-<?php echo e($key); ?>" <?php echo e($settings->get('log_to_telegram') && isset($settings->get('log_to_telegram')['chat'][$telegram_logger_row]['type'][$key]) ? ' checked' : ''); ?>>
                                                <label class="form-check-label" for="input-telegram-log-<?php echo e($telegram_logger_row); ?>-<?php echo e($key); ?>">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="<?php echo e($value); ?>"><?php echo e(ucfirst($key)); ?></span>
                                                </label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <hr>
                                        <a href="javascript:void(0)" onclick="this.closest('.col').remove();"><small><?php echo e(__('Delete')); ?></small></a>
                                    </div>
                                </div>
                            </div>
                            <?php ($telegram_logger_row++); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="col col-sm-2 mb-4">
                        <div class="card h-100">
                            <button type="button" class="buttonadd" onclick="addTelegramLogger(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-node-plus" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8M6.025 7.5a5 5 0 1 1 0 1H4A1.5 1.5 0 0 1 2.5 10h-1A1.5 1.5 0 0 1 0 8.5v-1A1.5 1.5 0 0 1 1.5 6h1A1.5 1.5 0 0 1 4 7.5zM11 5a.5.5 0 0 1 .5.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2A.5.5 0 0 1 11 5M1.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                </div>
 
            </fieldset>
 
            <!-- END Content tab -->
        </div>

    </div>

</form>

<?php echo app('Illuminate\Foundation\Vite')('resources/js/admin/editor.js'); ?>

<script>
    /* Menu */
    var menu_count = <?php echo e($menu_count); ?>;
    var menu_count_children = <?php echo e($menu_count_children); ?>;
 
    function addMenu(_this)
    {
        html = '<div class="d-flex flex-column gap-2">';
        html += '   <div class="input-group">';
        html += '       <button type="button" class="btn btn-secondory"> <i class="fa-solid fa-ellipsis-vertical"></i></button>';
        html += '       <input type="text" name="menu[' + menu_count + '][link]" value="" placeholder="Ссылка" class="form-control">';
        html += '       <input type="text" name="menu[' + menu_count + '][name]" value="" placeholder="Наименование" class="form-control">';
        html += '       <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>';
        html += '       <button type="button" class="btn btn-primary" onclick="addMenuChildren(this, ' + menu_count + ')"><i class="fa-solid fa-plus"></i></button>';
        html += '   </div>';
        html += '</div>';

        _this.parentNode.previousElementSibling.insertAdjacentHTML('beforeend', html)

        menu_count++;
    }

    function addMenuChildren(_this, parent)
    {
        html = '<div class="d-flex flex-column gap-2">';
        html += '   <div class="input-group">';
        html += '       <button type="button" class="btn btn-secondory"> <i class="fa-solid fa-ellipsis-vertical"></i> <i class="fa-solid fa-ellipsis-vertical"></i></button>';
        html += '       <input type="text" name="menu[' + parent + '][items][' + menu_count_children + '][link]" value="" placeholder="Ссылка" class="form-control">';
        html += '       <input type="text" name="menu[' + parent + '][items][' + menu_count_children + '][name]" value="" placeholder="Наименование" class="form-control">';
        html += '       <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>';
        html += '   </div>';
        html += '</div>';

        _this.parentNode.parentNode.insertAdjacentHTML('beforeend', html)

        menu_count_children++;
    }

    /* Menu footer */
    var footer_menu_count = <?php echo e($footer_menu_count); ?>;
    var footer_menu_count_children = <?php echo e($footer_menu_count_children); ?>;
 
    function addMenuFooter(_this)
    {
        html = '<div class="d-flex flex-column gap-2">';
        html += '   <div class="input-group">';
        html += '       <button type="button" class="btn btn-secondory"> <i class="fa-solid fa-ellipsis-vertical"></i></button>';
        html += '       <input type="text" name="footer_menu[' + footer_menu_count + '][link]" value="" placeholder="Ссылка" class="form-control">';
        html += '       <input type="text" name="footer_menu[' + footer_menu_count + '][name]" value="" placeholder="Наименование" class="form-control">';
        html += '       <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>';
        html += '       <button type="button" class="btn btn-primary" onclick="addMenuFooterChildren(this, ' + footer_menu_count + ')"><i class="fa-solid fa-plus"></i></button>';
        html += '   </div>';
        html += '</div>';

        _this.parentNode.previousElementSibling.insertAdjacentHTML('beforeend', html)

        footer_menu_count++;
    }

    function addMenuFooterChildren(_this, parent)
    {
        html = '<div class="d-flex flex-column gap-2">';
        html += '   <div class="input-group">';
        html += '       <button type="button" class="btn btn-secondory"> <i class="fa-solid fa-ellipsis-vertical"></i> <i class="fa-solid fa-ellipsis-vertical"></i></button>';
        html += '       <input type="text" name="footer_menu[' + parent + '][items][' + footer_menu_count_children + '][link]" value="" placeholder="Ссылка" class="form-control">';
        html += '       <input type="text" name="footer_menu[' + parent + '][items][' + footer_menu_count_children + '][name]" value="" placeholder="Наименование" class="form-control">';
        html += '       <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>';
        html += '   </div>';
        html += '</div>';

        _this.parentNode.parentNode.insertAdjacentHTML('beforeend', html)

        footer_menu_count_children++;
    }

    /* Socials */
    var socials_count = <?php echo e($socials_count); ?>;

    function addSocials(_this)
    {
        html = '<div class="d-flex flex-column gap-2">';
        html += '   <div class="input-group">';
        html += '       <button type="button" class="btn btn-secondory"> <i class="fa-solid fa-ellipsis-vertical"></i></button>';
        html += '       <input type="text" name="socials[' + socials_count + '][key]" value="" placeholder="Ключ" class="form-control">';
        html += '       <input type="text" name="socials[' + socials_count + '][link]" value="" placeholder="Ссылка" class="form-control">';
        html += '       <input type="text" name="socials[' + socials_count + '][name]" value="" placeholder="Наименование" class="form-control">';
        html += '       <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>';
        html += '   </div>';
        html += '</div>';

        _this.parentNode.previousElementSibling.insertAdjacentHTML('beforeend', html)

        socials_count++;
    }

    /* Banner menu */
    var menu_banner_count = <?php echo e($menu_banner_count); ?>;

    function addMenuBanner(_this)
    {
        html = '<div class="col-auto mb-4">';
        html += '   <div class="div">';
        html += '       <div class="mb-3">';
        html += '           <div class="form-label d-flex justify-content-between">Картинка</div>';
        html += '           <div class="d-flex flex-column" style="width: 100px;" data-image-upload>';
        html += '               <input type="hidden" name="menu_banner[' + menu_banner_count + '][image]" value=""data-path="settings">';
        html += '               <img src="<?php echo e(resize("no-image.png", 100, 100)); ?>" data-placeholder="<?php echo e(resize('no-image.png', 100, 100)); ?>" alt="." class="img-thumbnail">';
        html += '               <div class="input-group flex-nowrap mt-1">';
        html += '                   <button type="button" class="btn btn-sm btn-primary w-100"><i class="fa-solid fa-upload"></i></button>';
        html += '                   <button type="button" class="btn btn-sm btn-danger"><i class="fa-regular fa-trash-can"></i></button>';
        html += '               </div>';
        html += '           </div>';
        html += '       </div>';

        html += '       <div class="mb-3">';
        html += '           <label class="form-label" for="input-menu_banner[' + menu_banner_count + '][link]">Ссылка</label>';
        html += '           <input class="form-control" type="text" name="menu_banner[' + menu_banner_count + '][link]" value="" placeholder="Ссылка" id="input-menu_banner[' + menu_banner_count + '][link]" autocomplete="off">';
        html += '       </div>';

        html += '       <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>';
        html += '   </div>';
        html += '</div>';

        _this.parentNode.previousElementSibling.insertAdjacentHTML('beforeend', html)

        menu_banner_count++;

        imageUpload()
    }

    /* Section banner home */
    var section_home_slider_count = <?php echo e($section_home_slider_count); ?>


    function addSectioHomeBanner(_this, key)
    {
        html  = '<div class="col-auto position-relative" data-sort-item>';
        html += '   <div class="div">';
        html += '       <div class="mb-3">';
        html += '           <label class="form-label" for="input-section_home[' + key + '][' + section_home_slider_count + '][title]">Название</label>';
        html += '           <input class="form-control" type="text" name="section_home[' + key + '][' + section_home_slider_count + '][title]" value="" placeholder="Название" id="input-section_home[' + key + '][' + section_home_slider_count + '][title]" autocomplete="off">';
        html += '       </div>';

        html += '        <div class="mb-3">';
        html += '            <div class="form-label d-flex justify-content-between">Картинка</div>';
        html += '            <div class="d-flex flex-column" style="width: 100px;" data-image-upload="">';
        html += '                <input type="hidden" name="section_home[' + key + '][' + section_home_slider_count + '][image]" value="" data-path="settings">';
        html += '                <img src="<?php echo e(resize('no-image.png', 100, 100)); ?>" data-placeholder="<?php echo e(resize('no-image.png', 100, 100)); ?>" alt="." class="img-thumbnail">';
        html += '                <div class="input-group flex-nowrap mt-1">';
        html += '                    <button type="button" class="btn btn-sm btn-primary w-100"><i class="fa-solid fa-upload"></i></button>';
        html += '                    <button type="button" class="btn btn-sm btn-danger"><i class="fa-regular fa-trash-can"></i></button>';
        html += '                </div>';
        html += '            </div>';
        html += '        </div>';

        html += '       <div class="mb-3">';
        html += '           <label class="form-label" for="input-section_home[' + key + '][' + section_home_slider_count + '][link]">Название</label>';
        html += '           <input class="form-control" type="text" name="section_home[' + key + '][' + section_home_slider_count + '][link]" value="" placeholder="Название" id="input-section_home[' + key + '][' + section_home_slider_count + '][link]" autocomplete="off">';
        html += '       </div>';

        html += '       <div class="mb-3 form-check form-switch">';
        html += '           <input class="form-check-input" type="checkbox" name="input-section_home[' + key + '][' + section_home_slider_count + '][status]" value="1" placeholder="Статус" id="input-section_home[' + key + '][' + section_home_slider_count + '][status]">';
        html += '           <label class="form-check-label" for="input-section_home[' + key + '][' + section_home_slider_count + '][status]">Статус</label>';
        html += '       </div>';
            
        html += '       <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>';
        html += '   </div>';
        html += '</div>';

        _this.parentNode.nextElementSibling.insertAdjacentHTML('beforeend', html)

        section_home_slider_count++;

        imageUpload()
    }

    /* Section advantage */
    var section_advantage_count = <?php echo e($section_advantage_count); ?>


    function addSectionAdvantage(_this)
    {
        html  = '<div class="col-auto position-relative" data-sort-item>';
        html += '   <div class="div">';
        html += '       <div class="mb-3">';
        html += '           <div class="form-label d-flex justify-content-between">Картинка</div>';
        html += '           <div class="d-flex flex-column" style="width: 100px;" data-image-upload>';
        html += '               <input type="hidden" name="section_advantage[' + section_advantage_count + '][image]" value="" data-path="settings">';
        html += '               <img src="<?php echo e(resize('no-image.png', 100, 100)); ?>" data-placeholder="<?php echo e(resize('no-image.png', 100, 100)); ?>" alt="." class="img-thumbnail">';
        html += '               <div class="input-group flex-nowrap mt-1">';
        html += '                   <button type="button" class="btn btn-sm btn-primary w-100"><i class="fa-solid fa-upload"></i></button>';
        html += '                   <button type="button" class="btn btn-sm btn-danger"><i class="fa-regular fa-trash-can"></i></button>';
        html += '               </div>';
        html += '           </div>';
        html += '       </div>';

        html += '       <div class="mb-3">';
        html += '           <label class="form-label" for="input-section_advantage[' + section_advantage_count + '][title]">Название</label>';
        html += '           <input class="form-control" type="text" name="section_advantage[' + section_advantage_count + '][title]" value="Non minus." placeholder="Название" id="input-section_advantage[' + section_advantage_count + '][title]" autocomplete="off">';
        html += '       </div>';

        html += '       <div class="mb-3">';
        html += '           <label class="form-label" for="input-section_advantage[' + section_advantage_count + '][description]">Описание</label>';
        html += '           <textarea class="form-control" type="text" name="section_advantage[' + section_advantage_count + '][description]" placeholder="Описание" rows="2" id="input-section_advantage[' + section_advantage_count + '][description]"></textarea>';
        html += '       </div>';
        html += '       <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>';
        html += '   </div>';
        html += '</div>';

        _this.parentNode.previousElementSibling.insertAdjacentHTML('beforeend', html)

        section_advantage_count++;

        imageUpload()
    }

    /* Section work */
    var section_work_count = <?php echo e($section_work_count); ?>


    function addSectionWork(_this)
    {
        html  = '<div class="d-flex flex-column gap-2">';
        html += '   <div class="input-group">';
        html += '       <input type="text" name="section_work[' + section_work_count + '][title]" value="" placeholder="Ссылка" class="form-control">';
        html += '       <textarea name="section_work[' + section_work_count + '][description]" placeholder="Описание" rows="1" class="form-control"></textarea>';
        html += '       <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>';
        html += '   </div>';
        html += '</div>';

        _this.parentNode.previousElementSibling.insertAdjacentHTML('beforeend', html)

        section_work_count++;
    }

    /* Telegram logger */
    var telegram_logger_row = <?php echo e($telegram_logger_row); ?>


    function addTelegramLogger(_this)
    {
        html  = '<div class="col col-sm-2 mb-4">';
        html += '   <div class="card h-100">';
        html += '       <div class="card-body">';
        html += '           <div class="mb-3">';
        html += '               <label class="form-label" for="input-log_to_telegram[chat][' + telegram_logger_row + '][chat_id]"><?php echo e(__('User\'s Chat ID')); ?></label>';
        html += '               <input class="form-control" type="text" name="log_to_telegram[chat][' + telegram_logger_row + '][chat_id]" value="" placeholder="<?php echo e(__('User\'s Chat ID')); ?>" id="input-log_to_telegram[chat][' + telegram_logger_row + '][chat_id]" autocomplete="off" onfocus="this.removeAttribute(\'readonly\');" onblur="this.setAttribute(\'readonly\', true);" readonly="true">';
        html += '           </div>';

        html += '           <div class="form-label"><?php echo e(__('Send logs')); ?>:</div>';
                            <?php $__currentLoopData = $log_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        html += '           <div class="form-check form-switch">';
        html += '               <input class="form-check-input" type="checkbox" name="log_to_telegram[chat][' + telegram_logger_row + '][type][<?php echo e($key); ?>]" id="input-telegram-log-' + telegram_logger_row + '-<?php echo e($key); ?>" checked>';
        html += '               <label class="form-check-label" for="input-telegram-log-' + telegram_logger_row + '-<?php echo e($key); ?>">';
        html += '                   <span data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="<?php echo e($value); ?>"><?php echo e(ucfirst($key)); ?></span>';
        html += '               </label>';
        html += '           </div>';
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        html += '           <hr><a href="javascript:void(0)" onclick="this.closest(\'.col\').remove();"><small><?php echo e(__('Delete')); ?></small></a>';
 
        html += '       </div>';
        html += '   </div>';
        html += '</div>';
  
        const newElement = _this.closest('.col').insertAdjacentHTML('beforebegin', html)
        
        tooltip(newElement)

        telegram_logger_row++;
    }
 
</script>


<style>
    [data-sort-item].sort-item {
        position: relative;
    }
    [data-sort-item].sort-item::after {
        content: '';
        position: absolute;
        z-index: 2;
        left: -7px;
        top: -7px;
        right: -7px;
        bottom: -7px;
        border-radius: 10px;
        border: 1px solid #666;
        background-color: #fff6;
    }
    .buttonadd {
        width: 100%;
        height: 100%;
        border: none;
    }
    .buttonadd svg {
        width: 40%;
        height: auto;
        opacity: .2;
    }
</style>

 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/settings.blade.php ENDPATH**/ ?>