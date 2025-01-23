<div>

   <div class="popup__header">
      <div class="popup__header-title">
            <button type="button" class="popup__header-btn" x-on:click="Livewire.dispatch('showModal', {key: 'register', params: {size: 'sm'}})">Регистрация</button>
            <button type="button" class="popup__header-btn active" x-on:click="Livewire.dispatch('showModal', {key: 'login', params: {size: 'sm'}})">Вход</button>
      </div>
   </div>
   <div class="popup__body">

      <form wire:submit="action">
            <div class="fields">

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
                  <div class="field__block @error('password') field__block--error @enderror">
                        <input type="password" wire:model="password" placeholder="Пароль" value="" class="field__input" autocomplete="off" required="">
                        <label class="field__label">Пароль</label>
                        @error('password')
                           <div class="field__error">
                                 <span class="field__error-error">{{ $message }}</span>
                           </div>
                        @enderror
                        @if (session()->has('error'))
                           <div class="field__error">
                                 <span class="field__error-error">{{ session('error') }}</span>
                           </div>
                        @endif
                  </div>
                  <button type="button" class="field__block-link" x-on:click="Livewire.dispatch('showModal', {key: 'forgotten', params: {size: 'sm'}})">Забыли пароль?</button>
               </div>

               <div class="field field--checkbox">
                  <div class="field__block">
                        <label>
                           <input type="checkbox" wire:model="someone" name="checkbox" value="1">
                           <span>чужой компьютер</span>
                        </label>
                  </div>
               </div>

               <div class="field field--button">
                  <button type="submit" class="btn field__button">Войти</button>
               
               </div>

            </div>
      </form>

   </div>

</div>
