</main> 
<footer class="footer" id="footer">
    <div class="container">
        <div class="footer__top">
            <div class="footer__top-item footer__logo">
                <?php if(url()->current() == route('home')): ?>
                    <div class="footer__logo-a">
                        <img src="storage/image/logos/logo-footer.svg" alt="<?php echo e(config('settings.name')); ?>" class="footer__logo-img">
                    </div>
                <?php else: ?>
                    <a href="<?php echo e(route('home')); ?>" class="footer__logo-a" wire:navigate>
                        <img src="storage/image/logos/logo-footer.svg" alt="<?php echo e(config('settings.name')); ?>" class="footer__logo-img">
                    </a>
                <?php endif; ?>
            </div>
            <div class="footer__top-item footer__link">
                <a href="<?php echo e(route('compilation', 'new')); ?>" class="btn btn--white footer__link-a" wire:navigate>Новинки</a>
                <a href="<?php echo e(route('compilation', 'hit')); ?>" class="btn btn--white footer__link-a" wire:navigate>Хиты продаж</a>
            </div>
            <?php if(config('settings.yandex_review')): ?>
                <div class="footer__top-item footer__market">
                    <div class="footer__market-top">
                        <span class="footer__market-icon">
                            <svg width="12" height="17">
                                <use xlink:href="storage/image/sprite.svg#yandex"></use>
                            </svg>
                        </span>
                        <span class="footer__market-rating">4,9</span>
                        <span class="footer__market-stars">
                            <span class="footer__market-star footer__market-star--active">
                                <svg width="17" height="17">
                                    <use xlink:href="storage/image/sprite.svg#star"></use>
                                </svg>
                            </span>
                            <span class="footer__market-star footer__market-star--active">
                                <svg width="17" height="17">
                                    <use xlink:href="storage/image/sprite.svg#star"></use>
                                </svg>
                            </span>
                            <span class="footer__market-star footer__market-star--active">
                                <svg width="17" height="17">
                                    <use xlink:href="storage/image/sprite.svg#star"></use>
                                </svg>
                            </span>
                            <span class="footer__market-star footer__market-star--active">
                                <svg width="17" height="17">
                                    <use xlink:href="storage/image/sprite.svg#star"></use>
                                </svg>
                            </span>
                            <span class="footer__market-star footer__market-star--active">
                                <svg width="17" height="17">
                                    <use xlink:href="storage/image/sprite.svg#star"></use>
                                </svg>
                            </span>
                        </span>
                    </div>
                    <a href="<?php echo e(config('settings.yandex_review')); ?>" class="footer__market-description" target="_blank" rel="nofollow">Поставить оценку в Яндексе</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="footer__data">
            <div class="footer__menu">
                <?php if(config('settings.footer_menu')): ?>
                    <?php $__currentLoopData = config('settings.footer_menu'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="footer__menu-item">
                            <div class="footer__menu-title"><?php echo e($item['name']); ?></div>
                            <?php if(isset($item['items']) && !empty($item['items'])): ?>
                                <ul class="footer__menu-ul">
                                    <?php $__currentLoopData = $item['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="footer__menu-li">
                                            <a href="<?php echo e($element['link']); ?>" class="footer__menu-a"><?php echo e($element['name']); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <div class="footer__menu-item">
                    <div class="footer__menu-title">Праздники</div>
                    <ul class="footer__menu-ul">
                        <li class="footer__menu-li">
                            <a href="#" class="footer__menu-a">1 сентября</a>
                        </li>
                        <li class="footer__menu-li">
                            <a href="#" class="footer__menu-a">Праздник осени</a>
                        </li>
                        <li class="footer__menu-li">
                            <a href="#" class="footer__menu-a">День воспитателя - 27 сентября</a>
                        </li>
                        <li class="footer__menu-li">
                            <a href="#" class="footer__menu-a">День учителя - 5 октября</a>
                        </li>
                        <li class="footer__menu-li">
                            <a href="#" class="footer__menu-a">Хэллоуин - 31 октября</a>
                        </li>
                        <li class="footer__menu-li">
                            <a href="#" class="footer__menu-a">День матери</a>
                        </li>
                        <li class="footer__menu-li">
                            <a href="#" class="footer__menu-a">Новый год</a>
                        </li>
                        <li class="footer__menu-li">
                            <a href="#" class="footer__menu-a">9 мая</a>
                        </li>
                    </ul>
                </div>
      
                <div class="footer__menu-item">
                    <div class="footer__menu-title">Контактная информация</div>
                    <div class="footer__menu-ul">
                        <div class="footer__menu-li">
                            <span class="footer__menu-name">
                                <svg width="16" height="16">
                                    <use xlink:href="storage/image/sprite.svg#phone"></use>
                                </svg>
                            </span>
                            <a href="tel:<?php echo e(preg_replace('/[^0-9]/', '', config('settings.phone_federal'))); ?>" class="footer__menu-a" target="_blank" rel="nofollow"><?php echo e(config('settings.phone_federal')); ?></a>
                            <span class="footer__menu-description">(бесплатно по РФ)</span>
                        </div>
                        <div class="footer__menu-li">
                            <span class="footer__menu-name">
                                <svg width="16" height="16">
                                    <use xlink:href="storage/image/sprite.svg#phone"></use>
                                </svg>
                            </span>
                            <a href="tel:<?php echo e(preg_replace('/[^0-9]/', '', config('settings.phone'))); ?>" class="footer__menu-a" target="_blank" rel="nofollow"><?php echo e(config('settings.phone')); ?></a>
                        </div>
                        <div class="footer__menu-li">
                            <span class="footer__menu-name">
                                <svg width="16" height="16">
                                    <use xlink:href="storage/image/sprite.svg#mail"></use>
                                </svg>
                            </span>
                            <a href="mailto:<?php echo e(config('settings.email')); ?>" class="footer__menu-a" target="_blank" rel="nofollow"><?php echo e(config('settings.email')); ?></a>
                        </div>
                        <div class="footer__menu-li">
                            <span class="footer__menu-a" target="_blank" rel="nofollow"><?php echo e(config('settings.address')); ?></span>
                        </div>
                    </div>

                    <?php if(config('settings.socials')): ?>
                        <div class="footer__social">
                            <?php $__currentLoopData = config('settings.socials'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($item['key'])): ?>
                                    <a href="<?php echo e($item['link']); ?>" class="footer__social-a" target="_blank" rel="nofollow" title="<?php echo e($item['key']); ?>">
                                        <svg width="21" height="18">
                                            <use xlink:href="storage/image/sprite.svg#<?php echo e($item['key']); ?>"></use>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                
                </div>
                
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="footer__bottom-items">
                <div class="footer__bottom-item">
                    <div class="footer__bottom-text">© 1996-<?php echo e(date('Y')); ?> Оптовый интернет-магазин</div>
                    <div class="footer__bottom-text">
                        <a href="<?php echo e(route('information', 'terms')); ?>" class="footer__bottom-a" wire:navigate>Политика конфиденциальности</a>
                        <a href="<?php echo e(route('information', 'policy')); ?>" class="footer__bottom-a" wire:navigate>Соглашение</a>
                    </div>
                </div>
                <div class="footer__bottom-item">
                    <div class="footer__bottom-text">Все цены и условия, указанные на данном<br>сайте, не являются публичной офертой.</div>
                </div>
                <div class="footer__bottom-item">
                    <div class="footer__bottom-text">Мы принимаем к оплате:</div>
                    <div class="footer__bottom-payment">
                        <span class="footer__bottom-payment_item">
                            <svg width="39" height="13">
                                <use xlink:href="storage/image/sprite.svg#visa"></use>
                            </svg>
                        </span>
                        <span class="footer__bottom-payment_item">
                            <svg width="22" height="14">
                                <use xlink:href="storage/image/sprite.svg#mastercard"></use>
                            </svg>
                        </span>
                        <span class="footer__bottom-payment_item">
                            <svg width="46" height="13">
                                <use xlink:href="storage/image/sprite.svg#mir"></use>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer><?php /**PATH /var/www/resources/views/partials/footer.blade.php ENDPATH**/ ?>