<div>
    <section class="section section--collback section--bg">
        <div class="sectioncollback">
            <div class="container">
                <div class="sectioncollback__block">
                    <div class="sectioncollback__contact">
                        <h3 class="sectioncollback__contact-title">Остались вопросы? Мы поможем!</h3>
                        <p class="sectioncollback__contact-description">Напишите свой вопрос, оставьте контактные данные и мы свяжемся с Вами! Не хотите ждать? Свяжитесь с нами по контактам указанным ниже!</p>
                        <div class="sectioncollback__contact-data">
                            <div class="sectioncollback__contact-item">
                                <span class="sectioncollback__contact-item_icon">
                                    <svg width="18" height="18">
                                        <use xlink:href="storage/image/sprite.svg#phone"></use>
                                    </svg>
                                </span>
                                <div class="sectioncollback__contact-item_detail">
                                    <a href="tel:<?php echo e(preg_replace('/[^0-9]/', '', config('settings.phone_federal'))); ?>" class="sectioncollback__contact-item_a" target="_blank" rel="nofollow"><?php echo e(config('settings.phone_federal')); ?></a>
                                    <span class="sectioncollback__contact-item_desc">Бесплатно по РФ</span>
                                </div>
                            </div>
                            <div class="sectioncollback__contact-item">
                                <span class="sectioncollback__contact-item_icon">
                                    <svg width="18" height="18">
                                        <use xlink:href="storage/image/sprite.svg#phone"></use>
                                    </svg>
                                </span>
                                <div class="sectioncollback__contact-item_detail">
                                    <a href="tel:<?php echo e(preg_replace('/[^0-9]/', '', config('settings.phone'))); ?>" class="sectioncollback__contact-item_a" target="_blank" rel="nofollow"><?php echo e(config('settings.phone')); ?></a>
                                </div>
                            </div>
                            <div class="sectioncollback__contact-item">
                                <span class="sectioncollback__contact-item_icon">
                                    <svg width="18" height="18">
                                        <use xlink:href="storage/image/sprite.svg#mail"></use>
                                    </svg>
                                </span>
                                <div class="sectioncollback__contact-item_detail">
                                    <a href="mailto:<?php echo e(config('settings.email')); ?>" class="sectioncollback__contact-item_a" target="_blank" rel="nofollow"><?php echo e(config('settings.email')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sectioncollback__form">
                        <form wire:submit="save" class="sectioncollback__form-form">
                            <h3 class="sectioncollback__form-title">Заполните форму и мы свяжемся с вами в ближайшее время</h3>
                            <div class="sectioncollback__form-fields">

                                <div class="fields">

                                    <div class="field">
                                        <div class="field__block <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <input type="text" wire:model="name" name="name" placeholder="Иванов Иван Иванович" value="" class="field__input" required>
                                            <label class="field__label">ФИО</label>
                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="field__error">
                                                    <span class="field__error-error"><?php echo e($message); ?></span>
                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="field__block <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <input type="tel" wire:model="phone" name="phone" placeholder="+7 (978) 123-45-67" value="" class="field__input">
                                            <label class="field__label">Телефон</label>
                                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="field__error">
                                                    <span class="field__error-error"><?php echo e($message); ?></span>
                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="field__block <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <input type="email" wire:model="email" name="email" placeholder="E-mail" value="" class="field__input">
                                            <label class="field__label">E-mail</label>
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="field__error">
                                                    <span class="field__error-error"><?php echo e($message); ?></span>
                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="field__block <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <textarea name="comment" wire:model="comment" placeholder="Ваш комментарий" cols="30" rows="4" class="field__input field__input--textarea"></textarea>
                                            <label class="field__label">Ваш комментарий</label>
                                            <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="field__error">
                                                    <span class="field__error-error"><?php echo e($message); ?></span>
                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                                        </div>
                                    </div>

                                    <div class="field field--button">
                                        <button type="submit" class="btn btn--dark field__button">Отправить форму</button>
                                        <div class="field__aggre">Отправляю форму, вы соглашаетесь с <a href="<?php echo e(route('information', 'policy')); ?>" wire:navigate>Пользовательским соглашением</a> и <a href="<?php echo e(route('information', 'terms')); ?>" wire:navigate>Политикой конфиденциальности</a></div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><?php /**PATH /var/www/resources/views/components/section/feedback/collback.blade.php ENDPATH**/ ?>