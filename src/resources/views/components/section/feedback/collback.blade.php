<div>
    <section class="section section--collback section--bg">
        <div class="sectioncollback">
            <div class="container">
                <div class="sectioncollback__block">
                    <div class="sectioncollback__contact">
                        <h3 class="sectioncollback__contact-title">Остались вопросы? Мы поможем!</h3>
                        <p class="sectioncollback__contact-description">Напишите свой вопрос, оставьте контактные данные и мы свяжемся с Вами! Не хотите ждать? Свяжитесь с нами по контактам указанным ниже!</p>
                        <div class="sectioncollback__contact-data">
                            <div class="sectioncollback__contact-item">
                                <span class="sectioncollback__contact-item_icon">
                                    <svg width="18" height="18">
                                        <use xlink:href="storage/image/sprite.svg#phone"></use>
                                    </svg>
                                </span>
                                <div class="sectioncollback__contact-item_detail">
                                    <a href="tel:{{ preg_replace('/[^0-9]/', '', config('settings.phone_federal')) }}" class="sectioncollback__contact-item_a" target="_blank" rel="nofollow">{{ config('settings.phone_federal') }}</a>
                                    <span class="sectioncollback__contact-item_desc">Бесплатно по РФ</span>
                                </div>
                            </div>
                            <div class="sectioncollback__contact-item">
                                <span class="sectioncollback__contact-item_icon">
                                    <svg width="18" height="18">
                                        <use xlink:href="storage/image/sprite.svg#phone"></use>
                                    </svg>
                                </span>
                                <div class="sectioncollback__contact-item_detail">
                                    <a href="tel:{{ preg_replace('/[^0-9]/', '', config('settings.phone')) }}" class="sectioncollback__contact-item_a" target="_blank" rel="nofollow">{{ config('settings.phone') }}</a>
                                </div>
                            </div>
                            <div class="sectioncollback__contact-item">
                                <span class="sectioncollback__contact-item_icon">
                                    <svg width="18" height="18">
                                        <use xlink:href="storage/image/sprite.svg#mail"></use>
                                    </svg>
                                </span>
                                <div class="sectioncollback__contact-item_detail">
                                    <a href="mailto:{{ config('settings.email') }}" class="sectioncollback__contact-item_a" target="_blank" rel="nofollow">{{ config('settings.email') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sectioncollback__form">
                        <form wire:submit="save" class="sectioncollback__form-form">
                            <h3 class="sectioncollback__form-title">Заполните форму и мы свяжемся с вами в ближайшее время</h3>
                            <div class="sectioncollback__form-fields">

                                <div class="fields">

                                    <div class="field">
                                        <div class="field__block @error('name') field__block--error @enderror">
                                            <input type="text" wire:model="name" name="name" placeholder="Иванов Иван Иванович" value="" class="field__input" required>
                                            <label class="field__label">ФИО</label>
                                            @error('name')
                                                <div class="field__error">
                                                    <span class="field__error-error">{{ $message }}</span>
                                                </div>
                                            @enderror 
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="field__block @error('phone') field__block--error @enderror">
                                            <input type="tel" wire:model="phone" name="phone" placeholder="+7 (978) 123-45-67" value="" class="field__input">
                                            <label class="field__label">Телефон</label>
                                            @error('phone')
                                                <div class="field__error">
                                                    <span class="field__error-error">{{ $message }}</span>
                                                </div>
                                            @enderror 
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="field__block @error('email') field__block--error @enderror">
                                            <input type="email" wire:model="email" name="email" placeholder="E-mail" value="" class="field__input">
                                            <label class="field__label">E-mail</label>
                                            @error('email')
                                                <div class="field__error">
                                                    <span class="field__error-error">{{ $message }}</span>
                                                </div>
                                            @enderror 
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="field__block @error('comment') field__block--error @enderror">
                                            <textarea name="comment" wire:model="comment" placeholder="Ваш комментарий" cols="30" rows="4" class="field__input field__input--textarea"></textarea>
                                            <label class="field__label">Ваш комментарий</label>
                                            @error('comment')
                                                <div class="field__error">
                                                    <span class="field__error-error">{{ $message }}</span>
                                                </div>
                                            @enderror 
                                        </div>
                                    </div>

                                    <div class="field field--button">
                                        <button type="submit" class="btn btn--dark field__button">Отправить форму</button>
                                        <div class="field__aggre">Отправляю форму, вы соглашаетесь с <a href="{{ route('information', 'policy') }}" wire:navigate>Пользовательским соглашением</a> и <a href="{{ route('information', 'terms') }}" wire:navigate>Политикой конфиденциальности</a></div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>