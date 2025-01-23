<div>

   <div class="popup__header">
      <div class="popup__header-title">
            <button type="button" class="popup__header-btn" x-on:click="Livewire.dispatch('showModal', {key: 'login'})">Вход</button>
            <button type="button" class="popup__header-btn active" x-on:click="Livewire.dispatch('showModal', {key: 'forgotten'})">Восстановить пароль</button>
        </div>
   </div>
   <div class="popup__body">
      
        <form wire:submit="action">
            <div class="fields">
 
                <div class="field">
                    <div class="field__block <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <input type="email" wire:model="email" placeholder="E-mail" value="" class="field__input" required="">
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

                <div class="field field--button">
                    <button type="submit" class="btn field__button">Восстановить пароль</button>
                    <div class="field__aggre">После нажатия на кнопку «Восстановить пароль», на ваш E-mail будет отправлена инструкция по восстановлению пароля</div>
                </div>

            </div>
        </form>

   </div>

</div>
<?php /**PATH /var/www/resources/views/components/modals/forgotten.blade.php ENDPATH**/ ?>