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
                    <div class="field__block @error('email') field__block--error @enderror">
                        <input type="email" wire:model="email" placeholder="E-mail" value="" class="field__input" required="">
                        <label class="field__label">E-mail</label>
                        @error('email')
                        <div class="field__error">
                                <span class="field__error-error">{{ $message }}</span>
                        </div>
                        @enderror 
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
