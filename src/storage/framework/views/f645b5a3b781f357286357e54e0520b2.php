<div>

   <div class="popup__header">
      <div class="popup__header-title">
            <button type="button" class="popup__header-btn active" x-on:click="Livewire.dispatch('showModal', {key: 'register', params: {size: 'sm'}})">Регистрация</button>
            <button type="button" class="popup__header-btn" x-on:click="Livewire.dispatch('showModal', {key: 'login', params: {size: 'sm'}})">Вход</button>
      </div>

      
   </div>
   <div class="popup__body">
      
        <form wire:submit="action">
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
                        <input type="text" wire:model="name" name="name" placeholder="Фамилия Имя Отчество" value=""autocomplete="off"  class="field__input" required="">
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
                    <div class="field__block <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <input type="email" wire:model="email" placeholder="E-mail" value="" class="field__input" autocomplete="off" required="">
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
                    <div class="field__block <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <input type="tel" wire:model="phone" name="phone" placeholder="+7 (978) 123-45-67" value="" autocomplete="off" class="field__input" required="">
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
                    <div class="field__block <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <input type="password" wire:model="password" placeholder="Пароль" value="" class="field__input" autocomplete="off" required="">
                        <label class="field__label">Пароль</label>
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

                <div class="field field--button">
                    <button type="submit" class="btn field__button">Зарегистрироваться</button>
                    <div class="field__aggre">Нажав «Зарегистрироваться», вы подтверждаете, что ознакомились и согласны с условиями соглашения на <a href="<?php echo e(route('information', 'terms')); ?>" target="_blank"><strong>обработку персональных данных</strong></a> и <a href="<?php echo e(route('information', 'policy')); ?>" target="_blank"><strong>пользовательского соглашения</strong></a></div>
                </div>

            </div>
        </form>

   </div>

</div>

    <?php
        $__scriptKey = '0-11';
        ob_start();
    ?>
<script>
    maskTelephone()
</script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?><?php /**PATH /var/www/resources/views/components/modals/register.blade.php ENDPATH**/ ?>