<div>
        
    <section class="section section--top section--cartpage">
        <div class="container">
            <div class="cartpage">
                <div class="cartpage__card">
       
                    <!-- Form -->
                    <form wire:submit="create" class="accountsetting-form" id="form-checkout">
                        <div class="fields">

                            <div class="field">
                                <div class="field__block @error('inn') field__block--error @enderror">
                                    <input type="text" wire:model="inn" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'inn'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'inn'})" name="inn" placeholder="ИНН или наименование организации (только ИП, ООО)" value="{{ $inn }}" class="field__input" autocomplete="off">
                                    <label class="field__label">ИНН или наименование организации (только ИП, ООО)</label>
                                    @error('inn')
                                        <div class="field__error">
                                            <span class="field__error-error">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div> 
                            </div>
                            
                            <legend>Контактные данные</legend>

                            <div class="field field--three">
                                <div class="field__block @error('name') field__block--error @enderror">
                                    <input type="name" wire:model="name" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'name'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'name'})"  name="name" placeholder="ФИО" value="{{ $name }}" class="field__input" autocomplete="off" required>
                                    <label class="field__label">ФИО</label>
                                    @error('name')
                                        <div class="field__error">
                                            <span class="field__error-error">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="field field--three">
                                <div class="field__block @error('phone') field__block--error @enderror">
                                    <input type="tel" wire:model="phone" name="phone" placeholder="Ваш телефон" value="{{ $phone }}" class="field__input" autocomplete="off" required>
                                    <label class="field__label">Ваш телефон</label>
                                    @error('phone')
                                        <div class="field__error">
                                            <span class="field__error-error">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
 
                            <div class="field field--three">
                                <div class="field__block @error('email') field__block--error @enderror">
                                    <input type="email" wire:model="email" name="email" placeholder="E-mail" value="{{ $email }}" class="field__input" autocomplete="off" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'email'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'email'})" required>
                                    <label class="field__label">E-mail</label>
                                    @error('email')
                                        <div class="field__error">
                                            <span class="field__error-error">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <legend>Получение заказа</legend>

                            <div class="field field--three">
                                <div class="field__block @error('city') field__block--error @enderror">
                                    <input type="text" wire:model="city" name="city" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'city'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'city'})" placeholder="Город" value="{{ $city }}" class="field__input" autocomplete="off" required>
                                    <label class="field__label">Город</label>
                                    @error('city')
                                        <div class="field__error">
                                            <span class="field__error-error">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="field field--threereverse">
                                <div class="field__block @error('address') field__block--error @enderror">
                                    <input type="text" wire:model="address" name="address" placeholder="Улица, дом, кв" value="{{ $address }}" class="field__input" x-on:input.debounce.500ms="$wire.dispatch('autocomplete', {this: $event.target, code: 'address'})" x-on:click="$wire.dispatch('autocomplete', {this: $event.target, code: 'address'})" autocomplete="off">
                                    <label class="field__label">Улица, дом, кв</label>
                                    @error('address')
                                        <div class="field__error">
                                            <span class="field__error-error">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" wire:model="delivery" name="delivery" value="{{ $delivery }}" autocomplete="off">
                            <input type="hidden" wire:model="payment" name="payment" value="{{ $payment }}" autocomplete="off">
 
                        </div>
                    </form>
                    <!-- End Form -->
                    
                </div>
                <div class="cartpage__total">
                
                    <div class="cartpage__total-item cartpage__total-item--db cartpage__total-item--sticky">
                            <div class="cartpage__total-title">Общая стоимость</div>
                                
                            <div class="cartpage__total-variant">
                                @foreach($totals as $key => $total)
                                    <div class="cartpage__total-variant_item cartpage__total-variant_item--{{ $key }}">
                                        <span class="cartpage__total-variant_name">{!! $total->name !!}</span>
                                        <span class="cartpage__total-variant_value">{!! $total->value !!}</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="cartpage__total-button">
                                @if(count($this->notCheckout) > 0)
                                    <button type="button" class="btn disabled">Подтвердить заказ</button>
                                @else
                                    <button type="submit" form="form-checkout" class="btn">Подтвердить заказ</button>
                                @endif
                                
                                <div class="cartpage__total-aggre">Нажимая кнопку, Вы соглашаетесь на <a href="{{ route('information', 'policy') }}" target="_blank">обработку персональных данных</a></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@script
<script>
    maskTelephone()
</script>
@endscript
