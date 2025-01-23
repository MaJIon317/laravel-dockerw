<div>
        
    <section class="section section--top section--cartpage">
        <div class="container">
            <div class="cartpage">
                <div class="cartpage__card">
       
                    <!-- Form -->
                    <form wire:submit="create" class="accountsetting-form" id="form-checkout">
                        <div class="fields">

                            <div class="field">
                                <div class="field__block <?php $__errorArgs = ['inn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <input type="text" wire:model="inn" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'inn'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'inn'})" name="inn" placeholder="ИНН или наименование организации (только ИП, ООО)" value="<?php echo e($inn); ?>" class="field__input" autocomplete="off">
                                    <label class="field__label">ИНН или наименование организации (только ИП, ООО)</label>
                                    <?php $__errorArgs = ['inn'];
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
                            
                            <legend>Контактные данные</legend>

                            <div class="field field--three">
                                <div class="field__block <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <input type="name" wire:model="name" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'name'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'name'})"  name="name" placeholder="ФИО" value="<?php echo e($name); ?>" class="field__input" autocomplete="off" required>
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

                            <div class="field field--three">
                                <div class="field__block <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <input type="tel" wire:model="phone" name="phone" placeholder="Ваш телефон" value="<?php echo e($phone); ?>" class="field__input" autocomplete="off" required>
                                    <label class="field__label">Ваш телефон</label>
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
 
                            <div class="field field--three">
                                <div class="field__block <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <input type="email" wire:model="email" name="email" placeholder="E-mail" value="<?php echo e($email); ?>" class="field__input" autocomplete="off" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'email'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'email'})" required>
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

                            <legend>Получение заказа</legend>

                            <div class="field field--three">
                                <div class="field__block <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <input type="text" wire:model="city" name="city" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'city'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'city'})" placeholder="Город" value="<?php echo e($city); ?>" class="field__input" autocomplete="off" required>
                                    <label class="field__label">Город</label>
                                    <?php $__errorArgs = ['city'];
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
                                <div class="field__block <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <input type="text" wire:model="address" name="address" placeholder="Улица, дом, кв" value="<?php echo e($address); ?>" class="field__input" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'address'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'address'})" autocomplete="off">
                                    <label class="field__label">Улица, дом, кв</label>
                                    <?php $__errorArgs = ['address'];
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

                            <input type="hidden" wire:model="delivery" name="delivery" value="<?php echo e($delivery); ?>" autocomplete="off">
                            <input type="hidden" wire:model="payment" name="payment" value="<?php echo e($payment); ?>" autocomplete="off">
 
                        </div>
                    </form>
                    <!-- End Form -->
                    
                </div>
                <div class="cartpage__total">
                
                    <div class="cartpage__total-item cartpage__total-item--db cartpage__total-item--sticky">
                            <div class="cartpage__total-title">Общая стоимость</div>
                                
                            <div class="cartpage__total-variant">
                                <?php $__currentLoopData = $totals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="cartpage__total-variant_item cartpage__total-variant_item--<?php echo e($key); ?>">
                                        <span class="cartpage__total-variant_name"><?php echo $total->name; ?></span>
                                        <span class="cartpage__total-variant_value"><?php echo $total->value; ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="cartpage__total-button">
                                <?php if(count($this->notCheckout) > 0): ?>
                                    <button type="button" class="btn disabled">Подтвердить заказ</button>
                                <?php else: ?>
                                    <button type="submit" form="form-checkout" class="btn">Подтвердить заказ</button>
                                <?php endif; ?>
                                
                                <div class="cartpage__total-aggre">Нажимая кнопку, Вы соглашаетесь на <a href="<?php echo e(route('information', 'policy')); ?>" target="_blank">обработку персональных данных</a></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

    <?php
        $__scriptKey = '0-3';
        ob_start();
    ?>
<script>
    maskTelephone()
</script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
<?php /**PATH /var/www/resources/views/cart/checkout.blade.php ENDPATH**/ ?>