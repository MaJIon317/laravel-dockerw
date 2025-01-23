<?php require 'partials/header.php'; ?>

<section class="section section--breadcrumbs">
    <div class="container">
        <div class="breadcrumbs">
            <ul itemscope="" itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs__ul">
                <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="breadcrumbs__li">
                    <a itemprop="item" title="Главная" href="#" class="breadcrumbs__a">
                        <span itemprop="name" class="breadcrumbs__name">Главная</span>
                        <meta itemprop="position" content="0">
                    </a>
                </li>
                <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="breadcrumbs__li">
                    <span itemprop="name" class="breadcrumbs__name">Восстановление пароля</span>
                    <meta itemprop="position" content="1">
                </li>
            </ul>
        </div>
        <h1>Восстановление пароля</h1>
    </div>
</section>

<section class="section section--top section--forgottenpage">
    <div class="container">
        <div class="forgottenpage">
            <form action="/" method="post" enctype="multipart/form-data" class="forgottenpage-form">
                <div class="fields">

                    <div class="field">
                        <div class="field__block">
                            <input type="password" name="password" placeholder="Новый пароль" value="" class="field__input" required>
                            <label class="field__label">Новый пароль</label>
                        </div>
                    </div>

                    <div class="field">
                        <div class="field__block">
                            <input type="password" name="password" placeholder="Повторите пароль" value="" class="field__input" required>
                            <label class="field__label">Повторите пароль</label>
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

<?php require 'partials/footer.php'; ?>