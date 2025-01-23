<div>
    
    <form wire:submit="save" class="accountsetting-form">
        <div class="fields">

            <div class="field">
                <div class="field__block <?php $__errorArgs = ['field.inn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <input type="text" wire:model="field.inn" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'inn'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'inn'})" name="inn" placeholder="ИНН или наименование организации (только ИП, ООО)" value="<?php echo e($user->inn); ?>" class="field__input" autocomplete="off">
                    <label class="field__label">ИНН или наименование организации (только ИП, ООО)</label>
                    <?php $__errorArgs = ['field.inn'];
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
          
            <div class="field field--three">
                <div class="field__block <?php $__errorArgs = ['field.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <input type="name" wire:model="field.name" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'name'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'name'})"  name="name" placeholder="ФИО" value="<?php echo e($user->name); ?>" class="field__input" autocomplete="off" required>
                    <label class="field__label">ФИО</label>
                    <?php $__errorArgs = ['field.name'];
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

            <div class="field field--three">
                <div class="field__block <?php $__errorArgs = ['field.phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <input type="tel" wire:model="field.phone" name="phone" placeholder="Ваш телефон" value="<?php echo e($user->phone); ?>" class="field__input" autocomplete="off" required>
                    <label class="field__label">Ваш телефон</label>
                    <?php $__errorArgs = ['field.phone'];
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

            <div class="field field--three">
                <div class="field__block <?php $__errorArgs = ['field.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <input type="email" wire:model="field.email" name="email" placeholder="E-mail" value="<?php echo e($user->email); ?>" class="field__input" autocomplete="off" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'email'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'email'})" required>
                    <label class="field__label">E-mail</label>
                    <?php $__errorArgs = ['field.email'];
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

            <div class="field field--three">
                <div class="field__block <?php $__errorArgs = ['field.city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <input type="text" wire:model="field.city" name="city" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'city'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'city'})" placeholder="Город" value="<?php echo e($user->city); ?>" class="field__input" autocomplete="off" required>
                    <label class="field__label">Город</label>
                    <?php $__errorArgs = ['field.city'];
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
    
            <div class="field field--threereverse">
                <div class="field__block <?php $__errorArgs = ['field.address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <input type="text" wire:model="field.address" name="address" placeholder="Улица, дом, кв" value="<?php echo e($user->address); ?>" class="field__input" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'address'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'address'})" autocomplete="off">
                    <label class="field__label">Улица, дом, кв</label>
                    <?php $__errorArgs = ['field.address'];
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
                <hr class="hr">
                <div class="alert alert--info">Для смены пароля от личного кабинета используйте поля ниже</div>
            </div>

            <div class="field field--three">
                <div class="field__block <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <input type="password" wire:model="password" name="password" placeholder="Новый пароль" value="" class="field__input" autocomplete="off">
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

            <div class="field field--three">
                <div class="field__block">
                    <input type="password" wire:model="password_confirmation" name="password_confirmation" placeholder="Повторите пароль" value="" class="field__input">
                    <label class="field__label">Повторите пароль</label>
                </div>
            </div>

            <div class="field field--button">
                <button type="submit" class="btn field__button field__button--wa">Сохранить настройки
                    <div wire:loading>
                        <span class="loader"></span>
                    </div>
                </button>
            </div>

        </div>
    </form>


</div>

    <?php
        $__scriptKey = '0-14';
        ob_start();
    ?>
<script>
    maskTelephone()
 
</script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?><?php /**PATH /var/www/resources/views/user/setting.blade.php ENDPATH**/ ?>