<?php require 'partials/header.php'; ?>

<section class="section section--top">
    <div class="container">

        <h1>Всплывающие уведомления</h1>

        <button type="button" class="btn btn--dark btn--sm" onclick="webdementToast('Сообщение с ссылкой на страницу или выделяющим текстом')">Положительное сообщение</button>
        <button type="button" class="btn btn--dark btn--sm" onclick="webdementToast('Сообщение с ссылкой на страницу или выделяющим текстом', 'error')">Отрицательное сообщение (ошибка)</button>
        <button type="button" class="btn btn--dark btn--sm" onclick="webdementToast('Сообщение с ссылкой на страницу или выделяющим текстом', 'info')">Информационное сообщение</button>
        <button type="button" class="btn btn--dark btn--sm" onclick="webdementToast('Сообщение с ссылкой на страницу или выделяющим текстом', 'warning')">Предупреждающее сообщение</button>

        <br><br><br>

        <h1>Всплывающие окна</h1>
        <button type="button" class="btn btn--dark btn--sm" onclick="webdementPopup('register')">Регистрация</button>
        <button type="button" class="btn btn--dark btn--sm" onclick="webdementPopup('login')">Авторизация</button>
        <button type="button" class="btn btn--dark btn--sm" onclick="webdementPopup('forgotten')">Забыли пароль</button>
        <button type="button" class="btn btn--dark btn--sm" onclick="webdementPopup('pricegroup-1')">Группы скидок</button>
        <button type="button" class="btn btn--dark btn--sm" onclick="webdementPopup('ordercancel-1')">Отмена заказа</button>
      
        <br><br><br>

        <h1>Уведомления</h1>
        <div class="alert alert--danger">Ошибка</div> 
        <div class="alert alert--info">Информация</div>
 
        <br><br><br>

        <h1>Подсказки при заполнении полей</h1>

        <div class="fields">

            <div class="field">
                <div class="field__block">
                    <input type="text" name="autocomplete" placeholder="Начните заполнять поле" value="e" class="field__input">
                    <label class="field__label">Начните заполнять поле</label>
                </div>
            </div>

        </div>

    </div>
</section>


<?php require 'partials/footer.php'; ?>