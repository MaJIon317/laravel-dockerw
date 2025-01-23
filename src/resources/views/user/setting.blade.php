<div>
    
    <form wire:submit="save" class="accountsetting-form">
        <div class="fields">

            <div class="field">
                <div class="field__block @error('field.inn') field__block--error @enderror">
                    <input type="text" wire:model="field.inn" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'inn'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'inn'})" name="inn" placeholder="ИНН или наименование организации (только ИП, ООО)" value="{{ $user->inn }}" class="field__input" autocomplete="off">
                    <label class="field__label">ИНН или наименование организации (только ИП, ООО)</label>
                    @error('field.inn')
                        <div class="field__error">
                            <span class="field__error-error">{{ $message }}</span>
                        </div>
                    @enderror
                </div> 
            </div>
          
            <div class="field field--three">
                <div class="field__block @error('field.name') field__block--error @enderror">
                    <input type="name" wire:model="field.name" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'name'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'name'})"  name="name" placeholder="ФИО" value="{{ $user->name }}" class="field__input" autocomplete="off" required>
                    <label class="field__label">ФИО</label>
                    @error('field.name')
                        <div class="field__error">
                            <span class="field__error-error">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="field field--three">
                <div class="field__block @error('field.phone') field__block--error @enderror">
                    <input type="tel" wire:model="field.phone" name="phone" placeholder="Ваш телефон" value="{{ $user->phone }}" class="field__input" autocomplete="off" required>
                    <label class="field__label">Ваш телефон</label>
                    @error('field.phone')
                        <div class="field__error">
                            <span class="field__error-error">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="field field--three">
                <div class="field__block @error('field.email') field__block--error @enderror">
                    <input type="email" wire:model="field.email" name="email" placeholder="E-mail" value="{{ $user->email }}" class="field__input" autocomplete="off" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'email'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'email'})" required>
                    <label class="field__label">E-mail</label>
                    @error('field.email')
                        <div class="field__error">
                            <span class="field__error-error">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="field field--three">
                <div class="field__block @error('field.city') field__block--error @enderror">
                    <input type="text" wire:model="field.city" name="city" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'city'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'city'})" placeholder="Город" value="{{ $user->city }}" class="field__input" autocomplete="off" required>
                    <label class="field__label">Город</label>
                    @error('field.city')
                        <div class="field__error">
                            <span class="field__error-error">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
    
            <div class="field field--threereverse">
                <div class="field__block @error('field.address') field__block--error @enderror">
                    <input type="text" wire:model="field.address" name="address" placeholder="Улица, дом, кв" value="{{ $user->address }}" class="field__input" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'address'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'address'})" autocomplete="off">
                    <label class="field__label">Улица, дом, кв</label>
                    @error('field.address')
                        <div class="field__error">
                            <span class="field__error-error">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="field">
                <hr class="hr">
                <div class="alert alert--info">Для смены пароля от личного кабинета используйте поля ниже</div>
            </div>

            <div class="field field--three">
                <div class="field__block @error('password') field__block--error @enderror">
                    <input type="password" wire:model="password" name="password" placeholder="Новый пароль" value="" class="field__input" autocomplete="off">
                    <label class="field__label">Новый пароль</label>
                    @error('password')
                        <div class="field__error">
                            <span class="field__error-error">{{ $message }}</span>
                        </div>
                    @enderror
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

@script
<script>
    maskTelephone()
 
</script>
@endscript