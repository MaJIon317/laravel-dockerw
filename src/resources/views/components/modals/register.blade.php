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
                    <div class="field__block @error('name') field__block--error @enderror">
                        <input type="text" wire:model="name" name="name" placeholder="Фамилия Имя Отчество" value=""autocomplete="off"  class="field__input" required="">
                        <label class="field__label">ФИО</label>
                        @error('name')
                           <div class="field__error">
                                 <span class="field__error-error">{{ $message }}</span>
                           </div>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <div class="field__block @error('email') field__block--error @enderror">
                        <input type="email" wire:model="email" placeholder="E-mail" value="" class="field__input" autocomplete="off" required="">
                        <label class="field__label">E-mail</label>
                        @error('email')
                           <div class="field__error">
                                 <span class="field__error-error">{{ $message }}</span>
                           </div>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <div class="field__block @error('phone') field__block--error @enderror">
                        <input type="tel" wire:model="phone" name="phone" placeholder="+7 (978) 123-45-67" value="" autocomplete="off" class="field__input" required="">
                        <label class="field__label">Телефон</label>
                        @error('phone')
                           <div class="field__error">
                                 <span class="field__error-error">{{ $message }}</span>
                           </div>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <div class="field__block @error('password') field__block--error @enderror">
                        <input type="password" wire:model="password" placeholder="Пароль" value="" class="field__input" autocomplete="off" required="">
                        <label class="field__label">Пароль</label>
                        @error('password')
                           <div class="field__error">
                                 <span class="field__error-error">{{ $message }}</span>
                           </div>
                        @enderror
                    </div>
                </div>

                <div class="field field--button">
                    <button type="submit" class="btn field__button">Зарегистрироваться</button>
                    <div class="field__aggre">Нажав «Зарегистрироваться», вы подтверждаете, что ознакомились и согласны с условиями соглашения на <a href="{{ route('information', 'terms') }}" target="_blank"><strong>обработку персональных данных</strong></a> и <a href="{{ route('information', 'policy') }}" target="_blank"><strong>пользовательского соглашения</strong></a></div>
                </div>

            </div>
        </form>

   </div>

</div>

@script
<script>
    maskTelephone()
</script>
@endscript