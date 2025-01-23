<div>
    <form wire:submit="save" class="sectionnews__form-form">
        @error('email')
            <div class="sectionnews__form-form_error">{{ $message }}</div>
        @enderror 
        <div class="sectionnews__form-form_action">
            <input type="email" wire:model="email" name="email" placeholder="Введите ваш e-mail" value="" class="sectionnews__form-form_input" required>
            <button type="submit" class="sectionnews__form-form_button">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="15" viewBox="0 0 21 15">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.244995 7.49877C0.244995 7.30451 0.322164 7.11821 0.459526 6.98084C0.596887 6.84348 0.78319 6.76631 0.977448 6.76631H18.2531L13.643 2.15772C13.5055 2.02018 13.4282 1.83364 13.4282 1.63914C13.4282 1.44464 13.5055 1.2581 13.643 1.12056C13.7806 0.983028 13.9671 0.905762 14.1616 0.905762C14.3561 0.905762 14.5426 0.983028 14.6802 1.12056L20.5398 6.98019C20.608 7.04823 20.6621 7.12906 20.6991 7.21804C20.736 7.30703 20.755 7.40242 20.755 7.49877C20.755 7.59511 20.736 7.69051 20.6991 7.77949C20.6621 7.86848 20.608 7.9493 20.5398 8.01734L14.6802 13.877C14.5426 14.0145 14.3561 14.0918 14.1616 14.0918C13.9671 14.0918 13.7806 14.0145 13.643 13.877C13.5055 13.7394 13.4282 13.5529 13.4282 13.3584C13.4282 13.1639 13.5055 12.9774 13.643 12.8398L18.2531 8.23122H0.977448C0.78319 8.23122 0.596887 8.15405 0.459526 8.01669C0.322164 7.87933 0.244995 7.69302 0.244995 7.49877Z" stroke="none"/>
                </svg>
            </button>
        </div>
        <div class="sectionnews__form-form_aggre">
            Отправляю E-mail, вы соглашаетесь с <a href="{{ route('information', 'policy') }}" wire:navigate>пользовательским соглашением</a> и <a href="{{ route('information', 'terms') }}" wire:navigate>политикой конфиденциальности</a>
        </div>
    </form>
</div>