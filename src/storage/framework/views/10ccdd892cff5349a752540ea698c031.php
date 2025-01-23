<section class="section section--top section--forgottenpage">
    <div class="container">
        <div class="forgottenpage">
            <form wire:submit="action" class="forgottenpage-form">
                <div class="fields">

                    <div class="field">
                        <div class="field__block <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <input type="password" wire:model="password" placeholder="Новый пароль" value="" class="field__input" autocomplete="off" required="">
                            <label class="field__label">Новый пароль</label>
                            <?php $__errorArgs = ['password'];
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
                        <div class="field__block <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <input type="password" wire:model="password_confirmation" placeholder="Повторите пароль" value="" class="field__input" autocomplete="off" required="">
                            <label class="field__label">Повторите пароль</label>
                            <?php $__errorArgs = ['password_confirmation'];
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
                        <button type="submit" class="btn field__button">Сохранить пароль</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section><?php /**PATH /var/www/resources/views/user/reset.blade.php ENDPATH**/ ?>