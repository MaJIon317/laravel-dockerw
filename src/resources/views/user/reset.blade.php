<section class="section section--top section--forgottenpage">
    <div class="container">
        <div class="forgottenpage">
            <form wire:submit="action" class="forgottenpage-form">
                <div class="fields">

                    <div class="field">
                        <div class="field__block @error('password') field__block--error @enderror">
                            <input type="password" wire:model="password" placeholder="Новый пароль" value="" class="field__input" autocomplete="off" required="">
                            <label class="field__label">Новый пароль</label>
                            @error('password')
                            <div class="field__error">
                                    <span class="field__error-error">{{ $message }}</span>
                            </div>
                            @enderror 
                        </div>
                    </div>

                    <div class="field">
                        <div class="field__block @error('password_confirmation') field__block--error @enderror">
                            <input type="password" wire:model="password_confirmation" placeholder="Повторите пароль" value="" class="field__input" autocomplete="off" required="">
                            <label class="field__label">Повторите пароль</label>
                            @error('password_confirmation')
                            <div class="field__error">
                                    <span class="field__error-error">{{ $message }}</span>
                            </div>
                            @enderror 
                        </div>
                    </div>

                    <div class="field field--button">
                        <button type="submit" class="btn field__button">Сохранить пароль</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>