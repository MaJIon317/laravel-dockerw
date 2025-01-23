<?php require 'partials/header.php'; ?>

<section class="section section--breadcrumbs">
    <div class="container">
        <a href="#" class="btn btn--white btn--sm back">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="8" viewBox="0 0 16 8">
                <path d="M4.75193 5.41787H15.4546C15.6895 5.41787 15.88 5.22742 15.88 4.99252V3.00752C15.88 2.77261 15.6895 2.58216 15.4546 2.58216H4.75193V0.949537C4.75193 0.191622 3.83561 -0.187937 3.29966 0.347976L0.249179 3.39846C-0.0830597 3.7307 -0.0830597 4.26934 0.249179 4.60154L3.29966 7.65202C3.83557 8.18793 4.75193 7.80838 4.75193 7.05046V5.41787Z" stroke="none"/>
            </svg>
            <span>Назад в корзину</span>
        </a>
        <h1>Оформление заказа</h1>
    </div>
</section>


<section class="section section--top section--cartpage">
    <div class="container">
        <div class="cartpage">
            <div class="cartpage__card">
                

                <!-- Form -->
                <form action="/" method="post" enctype="multipart/form-data" class="accountsetting-form">
                    <div class="fields">

                        <div class="field">
                            <div class="field__block">
                                <input type="text" name="inn" placeholder="ИНН или наименование организации (только ИП, ООО)" value="" class="field__input" required>
                                <label class="field__label">ИНН или наименование организации (только ИП, ООО)</label>
                            </div>
                        </div>

                        <legend>Контактные данные</legend>

                        <div class="field field--three">
                            <div class="field__block">
                                <input type="text" name="name" placeholder="ФИО" value="" class="field__input" required>
                                <label class="field__label">ФИО</label>
                            </div>
                        </div>

                        <div class="field field--three">
                            <div class="field__block">
                                <input type="text" name="name" placeholder="Ваш телефон" value="" class="field__input" required>
                                <label class="field__label">Ваш телефон</label>
                            </div>
                        </div>

                        <div class="field field--three">
                            <div class="field__block">
                                <input type="email" name="name" placeholder="E-mail" value="" class="field__input" required disabled>
                                <label class="field__label">E-mail</label>
                            </div>
                        </div>

                        <legend>Получение заказа</legend>

                        <div class="field">
                            <div class="field__block">
                                <input type="text" name="name" placeholder="Город" value="" class="field__input" required>
                                <label class="field__label">Город</label>
                            </div>
                        </div>

                        <div class="field field--two">
                            <div class="field__block">
                                <input type="text" name="name" placeholder="Улица" value="" class="field__input">
                                <label class="field__label">Улица</label>
                            </div>
                        </div>

                        <div class="field field--four">
                            <div class="field__block">
                                <input type="text" name="name" placeholder="Дом" value="" class="field__input">
                                <label class="field__label">Дом</label>
                            </div>
                        </div>

                        <div class="field field--four">
                            <div class="field__block">
                                <input type="text" name="name" placeholder="Квартира" value="" class="field__input">
                                <label class="field__label">Квартира</label>
                            </div>
                        </div>
    
                    </div>
                </form>
                <!-- End Form -->
                
            </div>
            <div class="cartpage__total">
            
                <div class="cartpage__total-item cartpage__total-item--db cartpage__total-item--sticky">
                        <div class="cartpage__total-title">Общая стоимость</div>
                            
                        <div class="cartpage__total-variant">
                            <div class="cartpage__total-variant_item">
                                <span class="cartpage__total-variant_name">Товары (2)</span>
                                <span class="cartpage__total-variant_value">1890 ₽</span>
                            </div>
                            <div class="cartpage__total-variant_item">
                                <span class="cartpage__total-variant_name">Промокод</span>
                                <span class="cartpage__total-variant_value">-100 ₽</span>
                            </div>
                            <div class="cartpage__total-variant_item">
                                <span class="cartpage__total-variant_name">Скидка</span>
                                <span class="cartpage__total-variant_value">-100 ₽</span>
                            </div>
                            <div class="cartpage__total-variant_item cartpage__total-variant_item--total">
                                <span class="cartpage__total-variant_name">Итого</span>
                                <span class="cartpage__total-variant_value">1 690 ₽</span>
                            </div>
                        </div>
                        <div class="cartpage__total-button">
                            <button type="button" class="btn disabled">Подтвердить заказ</button>
                            <div class="cartpage__total-aggre">Нажимая кнопку, Вы соглашаетесь на <a href="#">обработку персональных данных</a></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<?php require 'partials/footer.php'; ?>