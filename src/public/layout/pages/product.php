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
                    <a itemprop="item" title="Наименование категории" href="#" class="breadcrumbs__a">
                        <span itemprop="name" class="breadcrumbs__name">Наименование категории</span>
                        <meta itemprop="position" content="0">
                    </a>
                </li>
                <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="breadcrumbs__li">
                    <span itemprop="name" class="breadcrumbs__name">Наименование товара</span>
                    <meta itemprop="position" content="1">
                </li>
            </ul>
        </div>
    </div>
</section>


<section class="section section--productpage">
    <div class="container">
        <div class="productpage">
            <div class="productpage__data">
                <div class="productpage__image">

                    <!-- Swiper -->
                    <div class="productpage__image-thumb">
                    
                        <div thumbsSlider="" class="swiper" data-swiper-parent="1" data-slider-design="productpage">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage-small.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage-small.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage-small.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage-small.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage-small.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage-small.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage-small.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage-small.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage-small.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage-small.webp" alt="" />
                                </div>
                            </div>
                        </div>     
                    </div>
           
                    <div class="productpage__image-image">
                        <div class="swiper" data-swiper-children="1" data-swiper-id="productpage">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage.webp" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/image/demo/productpage.webp" alt="" />
                                </div>
                            </div>
                        </div>

                        <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.82666 7.00003C0.82666 6.73484 0.932005 6.48052 1.11952 6.293C1.30704 6.10549 1.56136 6.00014 1.82655 6.00014H13.4113L9.11773 1.70862C8.92998 1.52086 8.8245 1.26622 8.8245 1.00069C8.8245 0.735173 8.92998 0.480526 9.11773 0.292773C9.30549 0.105021 9.56013 -0.000457764 9.82565 -0.000457764C10.0912 -0.000457764 10.3458 0.105021 10.5336 0.292773L16.5329 6.29211C16.626 6.38499 16.6999 6.49533 16.7503 6.61681C16.8007 6.73828 16.8267 6.86851 16.8267 7.00003C16.8267 7.13155 16.8007 7.26178 16.7503 7.38325C16.6999 7.50473 16.626 7.61507 16.5329 7.70795L10.5336 13.7073C10.3458 13.895 10.0912 14.0005 9.82565 14.0005C9.56013 14.0005 9.30549 13.895 9.11773 13.7073C8.92998 13.5195 8.8245 13.2649 8.8245 12.9994C8.8245 12.7338 8.92998 12.4792 9.11773 12.2914L13.4113 7.99992H1.82655C1.56136 7.99992 1.30704 7.89457 1.11952 7.70706C0.932005 7.51954 0.82666 7.26522 0.82666 7.00003Z" stroke="none"/>
                            </svg>
                        </div>
                        <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1732 7.00003C16.1732 6.73484 16.0679 6.48052 15.8804 6.293C15.6929 6.10549 15.4385 6.00014 15.1734 6.00014H3.58865L7.88217 1.70862C8.06993 1.52086 8.17541 1.26622 8.17541 1.00069C8.17541 0.735173 8.06993 0.480526 7.88217 0.292773C7.69442 0.105021 7.43978 -0.000457764 7.17425 -0.000457764C6.90873 -0.000457764 6.65409 0.105021 6.46633 0.292773L0.467002 6.29211C0.373886 6.38499 0.30001 6.49533 0.249602 6.6168C0.199195 6.73828 0.173248 6.86851 0.173248 7.00003C0.173248 7.13155 0.199195 7.26178 0.249602 7.38325C0.30001 7.50473 0.373886 7.61507 0.467002 7.70795L6.46633 13.7073C6.65409 13.895 6.90873 14.0005 7.17425 14.0005C7.43978 14.0005 7.69442 13.895 7.88217 13.7073C8.06993 13.5195 8.17541 13.2649 8.17541 12.9994C8.17541 12.7338 8.06993 12.4792 7.88217 12.2914L3.58865 7.99992H15.1734C15.4385 7.99992 15.6929 7.89457 15.8804 7.70706C16.0679 7.51954 16.1732 7.26522 16.1732 7.00003Z" stroke="none"/>
                            </svg>
                        </div>
                        <div class="swiper-pagination swiper-pagination--pos" data-slider-pagination="productpage"></div>
                    </div>
                
                    <!-- Swiper JS -->
 

                    
                </div>
                <div class="productpage__info">
                    <div class="productpage__info-labels">
                        <div class="productcard__label">
                            <span class="productcard__label-item productcard__label-item--skidka" data-popup-initialize="pricegroup-2">Скидка группа 2</span>
                            <span class="productcard__label-item productcard__label-item--new">Новинка</span>
                        </div>
                        <span class="productpage__info-sku" data-copy="6000230" data-message="Артикул товара успешно скопирован">Арт: 6000230</span>
                    </div>
                    <h1 class="productpage__name">Наименование товара</h1>

                    <div class="productpage__attribute">
                        <div class="productpage__attribute-item">
                            <span class="productpage__attribute-name">Параметр:</span>
                            <span class="productpage__attribute-description">значение</span>
                        </div>
                        <div class="productpage__attribute-item">
                            <span class="productpage__attribute-name">Параметр:</span>
                            <span class="productpage__attribute-description">значение</span>
                        </div>
                        <div class="productpage__attribute-item">
                            <span class="productpage__attribute-name">Параметр:</span>
                            <span class="productpage__attribute-description">значение</span>
                        </div>
                    </div>

                    <div class="productpage__description">Вы ищете красивые открытки поздравительные с днем рождения, свадьбой или для любимых, чтобы купить их оптом по низким ценам, прямо у производителя? У нас вы найдете всё, что вам нужно!. Наша компания предлагает огромный выбор красивых открыток с разнообразным дизайном.. <a href="#">читать далее</a></div>

                    <div class="productpage__price">
                        <div class="productpage__price-old">1.30 руб/шт.</div>
                        <div class="productpage__price-new">1.20 руб/шт.</div>
                    </div>
                    <div class="productpage__button">
                        <div class="productpage__button-item">
                            <div class="productcard__count productpage__button-count">
                                <span class="productcard__partiya">Мин. партия: 10</span>
                                <button type="button" class="productcard__count-action" data-type="-">-</button>
                                <input type="number" name="" min="20" max="60" step="20" value="20" class="productcard__count-count">
                                <button type="button" class="productcard__count-action" data-type="+">+</button>
                            </div>
                            <button type="button" class="btn productpage__button-cart">Добавить в корзину</button>
                        </div>
                        <div class="productpage__button-item">
                            <button type="button" class="btn btn--white productpage__button-favorite">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M9.00016 3.57941L8.19351 2.73871C6.30007 0.765295 2.82822 1.44629 1.57493 3.92732C0.986537 5.09426 0.853783 6.77908 1.92819 8.92931C2.96322 10.9997 5.11654 13.4796 9.00016 16.1808C12.8838 13.4796 15.036 10.9997 16.0721 8.92931C17.1465 6.77794 17.0149 5.09426 16.4254 3.92732C15.1721 1.44629 11.7002 0.764154 9.8068 2.73757L9.00016 3.57941ZM9.00016 17.5553C-8.25 5.9977 3.68887 -3.02298 8.80215 1.74858C8.86965 1.8117 8.93565 1.87672 9.00016 1.94364C9.06353 1.8763 9.12959 1.8116 9.19816 1.74972C14.3103 -3.02526 26.2503 5.99656 9.00016 17.5553Z" stroke="none"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                </div>
            </div>


            <h2>Описание</h2>
            <div class="productpage__description">
                <p>Вы ищете красивые открытки поздравительные с днем рождения, свадьбой или для любимых, чтобы купить их оптом по низким ценам, прямо у производителя? У нас вы найдете всё, что вам нужно!<br><br>Наша компания предлагает огромный выбор красивых открыток с разнообразным дизайном, чтобы удовлетворить любые ваше потребности и предпочтения. У нас есть открытки для мужчин, женщин, девочек, мальчиков и новорожденных. <br><br>Все наши открытки изготавливаются из качественных материалов с использованием передовых технологий, чтобы обеспечить красивый внешний вид и надежность. Они декорированы стильным и уникальным дизайном, чтобы они были не только словами поздравления, но и прекрасным дополнением к вашим подаркам или событиям.<br><br>Покупая открытки оптом от производителя, вы можете сэкономить существенную сумму на своих покупках. Мы предлагаем низкие цены, несмотря на отличное качество нашей продукции. Кроме того, мы гарантируем возможность выбора разной степени декора, чтобы вы могли подобрать именно то, что подходит вашим ожиданиям.<br><br>Не упустите возможность купить красивые поздравительные открытки оптом по низким ценам от производителя с разнообразным декором. Закажите их сейчас и порадуйте любимых особенным вниманием и прекрасными пожеланиями!</p>
            </div>

            <div class="productpage__tag">
                <ul class="productpage__tag-ul">
                    <li class="productpage__tag-li">
                        <span class="productpage__tag-title">Теги</span>
                    </li>
                    <li class="productpage__tag-li">
                        <a href="#" class="productpage__tag-a">#ОткрыткиНаДеньРождение</a>
                    </li>
                    <li class="productpage__tag-li">
                        <a href="#" class="productpage__tag-a">#ОткрыткиНаДеньРождение</a>
                    </li>
                    <li class="productpage__tag-li">
                        <a href="#" class="productpage__tag-a">#ОткрыткиНаДеньРождение</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>

<section class="section section--product section--bg">
    <div class="container">

        <div class="section__title">
            <div class="section__title-item">
                <h2 class="section__title-h active">Похожие товары</h2>
                <h2 class="section__title-h">Новинки</h2>
                <h2 class="section__title-h">Хиты продаж</h2>
            </div>
            <div class="section__title-item">
                <a href="#" class="btn section__title-link">Посмотреть все</a>
                <div class="section__title-buttons">
                    <div class="swiper-button-prev swiper-button--pos" data-slider-prev="1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1732 7.00003C16.1732 6.73484 16.0679 6.48052 15.8804 6.293C15.6929 6.10549 15.4385 6.00014 15.1734 6.00014H3.58865L7.88217 1.70862C8.06993 1.52086 8.17541 1.26622 8.17541 1.00069C8.17541 0.735173 8.06993 0.480526 7.88217 0.292773C7.69442 0.105021 7.43978 -0.000457764 7.17425 -0.000457764C6.90873 -0.000457764 6.65409 0.105021 6.46633 0.292773L0.467002 6.29211C0.373886 6.38499 0.30001 6.49533 0.249602 6.6168C0.199195 6.73828 0.173248 6.86851 0.173248 7.00003C0.173248 7.13155 0.199195 7.26178 0.249602 7.38325C0.30001 7.50473 0.373886 7.61507 0.467002 7.70795L6.46633 13.7073C6.65409 13.895 6.90873 14.0005 7.17425 14.0005C7.43978 14.0005 7.69442 13.895 7.88217 13.7073C8.06993 13.5195 8.17541 13.2649 8.17541 12.9994C8.17541 12.7338 8.06993 12.4792 7.88217 12.2914L3.58865 7.99992H15.1734C15.4385 7.99992 15.6929 7.89457 15.8804 7.70706C16.0679 7.51954 16.1732 7.26522 16.1732 7.00003Z" stroke="none"/>
                        </svg>
                    </div>
                    <div class="swiper-button-next swiper-button--pos" data-slider-next="1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.82666 7.00003C0.82666 6.73484 0.932005 6.48052 1.11952 6.293C1.30704 6.10549 1.56136 6.00014 1.82655 6.00014H13.4113L9.11773 1.70862C8.92998 1.52086 8.8245 1.26622 8.8245 1.00069C8.8245 0.735173 8.92998 0.480526 9.11773 0.292773C9.30549 0.105021 9.56013 -0.000457764 9.82565 -0.000457764C10.0912 -0.000457764 10.3458 0.105021 10.5336 0.292773L16.5329 6.29211C16.626 6.38499 16.6999 6.49533 16.7503 6.61681C16.8007 6.73828 16.8267 6.86851 16.8267 7.00003C16.8267 7.13155 16.8007 7.26178 16.7503 7.38325C16.6999 7.50473 16.626 7.61507 16.5329 7.70795L10.5336 13.7073C10.3458 13.895 10.0912 14.0005 9.82565 14.0005C9.56013 14.0005 9.30549 13.895 9.11773 13.7073C8.92998 13.5195 8.8245 13.2649 8.8245 12.9994C8.8245 12.7338 8.92998 12.4792 9.11773 12.2914L13.4113 7.99992H1.82655C1.56136 7.99992 1.30704 7.89457 1.11952 7.70706C0.932005 7.51954 0.82666 7.26522 0.82666 7.00003Z" stroke="none"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
 
        <div class="swiper-section sectionproduct">
            <div class="swiper" data-slider-design="sectionproduct" data-slider-id="1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <!-- Product card -->
                        <?php include 'partials/productcard.php'; ?>
                        <!-- Product card -->
                    </div>

                    <div class="swiper-slide">
                        <!-- Product card -->
                        <?php include 'partials/productcard.php'; ?>
                        <!-- Product card -->
                    </div>
                    <div class="swiper-slide">
                        <!-- Product card -->
                        <?php include 'partials/productcard.php'; ?>
                        <!-- Product card -->
                    </div>
                    <div class="swiper-slide">
                        <!-- Product card -->
                        <?php include 'partials/productcard.php'; ?>
                        <!-- Product card -->
                    </div>
                    <div class="swiper-slide">
                        <!-- Product card -->
                        <?php include 'partials/productcard.php'; ?>
                        <!-- Product card -->
                    </div>
                    <div class="swiper-slide">
                        <!-- Product card -->
                        <?php include 'partials/productcard.php'; ?>
                        <!-- Product card -->
                    </div>

                    <div class="swiper-slide">
                        <!-- Product card -->
                        <?php include 'partials/productcard.php'; ?>
                        <!-- Product card -->
                    </div>
             
                </div>
            </div>
        </div>
    </div>
</section>

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
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M4.11115 1.48989C4.04474 1.40446 3.96091 1.33414 3.86524 1.2836C3.76956 1.23306 3.66422 1.20345 3.55623 1.19675C3.44823 1.19005 3.34004 1.2064 3.23885 1.24472C3.13766 1.28304 3.04578 1.34246 2.96931 1.41902L1.8061 2.58336C1.26274 3.12784 1.0625 3.89844 1.29986 4.57454C2.28615 7.37245 3.88858 9.91296 5.98872 12.0083C8.08407 14.1084 10.6246 15.7109 13.4225 16.6972C14.0986 16.9345 14.8692 16.7343 15.4137 16.1909L16.5769 15.0277C16.6534 14.9512 16.7129 14.8594 16.7512 14.7582C16.7895 14.657 16.8059 14.5488 16.7992 14.4408C16.7924 14.3328 16.7628 14.2275 16.7123 14.1318C16.6618 14.0361 16.5914 13.9523 16.506 13.8859L13.9107 11.8677C13.8194 11.797 13.7132 11.748 13.6002 11.7242C13.4872 11.7005 13.3703 11.7026 13.2582 11.7304L10.7946 12.3458C10.4657 12.4274 10.1213 12.4228 9.79475 12.3323C9.46818 12.2419 9.1705 12.0687 8.9305 11.8294L6.16759 9.0654C5.92817 8.82551 5.75474 8.52788 5.66408 8.20132C5.57343 7.87475 5.56861 7.53031 5.6501 7.20134L6.26658 4.73766C6.29444 4.6256 6.29656 4.50868 6.27279 4.39568C6.24902 4.28268 6.19998 4.17653 6.12934 4.08518L4.11115 1.48989ZM2.11996 0.570794C2.31683 0.373869 2.55333 0.221077 2.81377 0.122565C3.07422 0.0240525 3.35264 -0.0179259 3.63055 -0.000583112C3.90846 0.0167597 4.1795 0.0930268 4.42567 0.223154C4.67184 0.353281 4.88752 0.534291 5.05837 0.754164L7.07656 3.34833C7.44667 3.82419 7.57717 4.44405 7.43092 5.02903L6.81557 7.4927C6.78397 7.62032 6.7858 7.75392 6.82088 7.88062C6.85595 8.00733 6.92309 8.12285 7.01581 8.21605L9.77985 10.9801C9.87316 11.073 9.98888 11.1402 10.1158 11.1753C10.2427 11.2104 10.3765 11.2121 10.5043 11.1803L12.9669 10.565C13.2556 10.4932 13.5568 10.4878 13.8479 10.5492C14.139 10.6106 14.4124 10.7371 14.6476 10.9193L17.2417 12.9375C18.1743 13.6631 18.2598 15.0412 17.4251 15.8748L16.2619 17.038C15.4294 17.8705 14.1852 18.2361 13.0254 17.8278C10.0562 16.7844 7.36066 15.0848 5.13937 12.8554C2.91011 10.6344 1.21049 7.93928 0.167025 4.97053C-0.240213 3.81182 0.125401 2.56648 0.957875 1.73401L2.11996 0.570794Z" stroke="none"/>
                                </svg>
                            </span>
                            <div class="sectioncollback__contact-item_detail">
                                <a href="tel:88002008633" class="sectioncollback__contact-item_a">8 800 200-86-33</a>
                                <span class="sectioncollback__contact-item_desc">Бесплатно по РФ</span>
                            </div>
                        </div>
                        <div class="sectioncollback__contact-item">
                            <span class="sectioncollback__contact-item_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M4.11115 1.48989C4.04474 1.40446 3.96091 1.33414 3.86524 1.2836C3.76956 1.23306 3.66422 1.20345 3.55623 1.19675C3.44823 1.19005 3.34004 1.2064 3.23885 1.24472C3.13766 1.28304 3.04578 1.34246 2.96931 1.41902L1.8061 2.58336C1.26274 3.12784 1.0625 3.89844 1.29986 4.57454C2.28615 7.37245 3.88858 9.91296 5.98872 12.0083C8.08407 14.1084 10.6246 15.7109 13.4225 16.6972C14.0986 16.9345 14.8692 16.7343 15.4137 16.1909L16.5769 15.0277C16.6534 14.9512 16.7129 14.8594 16.7512 14.7582C16.7895 14.657 16.8059 14.5488 16.7992 14.4408C16.7924 14.3328 16.7628 14.2275 16.7123 14.1318C16.6618 14.0361 16.5914 13.9523 16.506 13.8859L13.9107 11.8677C13.8194 11.797 13.7132 11.748 13.6002 11.7242C13.4872 11.7005 13.3703 11.7026 13.2582 11.7304L10.7946 12.3458C10.4657 12.4274 10.1213 12.4228 9.79475 12.3323C9.46818 12.2419 9.1705 12.0687 8.9305 11.8294L6.16759 9.0654C5.92817 8.82551 5.75474 8.52788 5.66408 8.20132C5.57343 7.87475 5.56861 7.53031 5.6501 7.20134L6.26658 4.73766C6.29444 4.6256 6.29656 4.50868 6.27279 4.39568C6.24902 4.28268 6.19998 4.17653 6.12934 4.08518L4.11115 1.48989ZM2.11996 0.570794C2.31683 0.373869 2.55333 0.221077 2.81377 0.122565C3.07422 0.0240525 3.35264 -0.0179259 3.63055 -0.000583112C3.90846 0.0167597 4.1795 0.0930268 4.42567 0.223154C4.67184 0.353281 4.88752 0.534291 5.05837 0.754164L7.07656 3.34833C7.44667 3.82419 7.57717 4.44405 7.43092 5.02903L6.81557 7.4927C6.78397 7.62032 6.7858 7.75392 6.82088 7.88062C6.85595 8.00733 6.92309 8.12285 7.01581 8.21605L9.77985 10.9801C9.87316 11.073 9.98888 11.1402 10.1158 11.1753C10.2427 11.2104 10.3765 11.2121 10.5043 11.1803L12.9669 10.565C13.2556 10.4932 13.5568 10.4878 13.8479 10.5492C14.139 10.6106 14.4124 10.7371 14.6476 10.9193L17.2417 12.9375C18.1743 13.6631 18.2598 15.0412 17.4251 15.8748L16.2619 17.038C15.4294 17.8705 14.1852 18.2361 13.0254 17.8278C10.0562 16.7844 7.36066 15.0848 5.13937 12.8554C2.91011 10.6344 1.21049 7.93928 0.167025 4.97053C-0.240213 3.81182 0.125401 2.56648 0.957875 1.73401L2.11996 0.570794Z" stroke="none"/>
                                </svg>
                            </span>
                            <div class="sectioncollback__contact-item_detail">
                                <a href="tel:88126767633" class="sectioncollback__contact-item_a">8 812 676-76-33</a>
                            </div>
                        </div>
                        <div class="sectioncollback__contact-item">
                            <span class="sectioncollback__contact-item_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15">
                                    <path d="M0 3.03516C0 2.43842 0.237053 1.86612 0.65901 1.44417C1.08097 1.02221 1.65326 0.785156 2.25 0.785156H15.75C16.3467 0.785156 16.919 1.02221 17.341 1.44417C17.7629 1.86612 18 2.43842 18 3.03516V12.0352C18 12.6319 17.7629 13.2042 17.341 13.6261C16.919 14.0481 16.3467 14.2852 15.75 14.2852H2.25C1.65326 14.2852 1.08097 14.0481 0.65901 13.6261C0.237053 13.2042 0 12.6319 0 12.0352V3.03516ZM2.25 1.91016C1.95163 1.91016 1.66548 2.02868 1.4545 2.23966C1.24353 2.45064 1.125 2.73679 1.125 3.03516V3.27928L9 8.00428L16.875 3.27928V3.03516C16.875 2.73679 16.7565 2.45064 16.5455 2.23966C16.3345 2.02868 16.0484 1.91016 15.75 1.91016H2.25ZM16.875 4.59103L11.5785 7.76916L16.875 11.0283V4.59103ZM16.8368 12.3265L10.4918 8.42166L9 9.31603L7.50825 8.42166L1.16325 12.3254C1.22718 12.5648 1.36836 12.7764 1.56486 12.9273C1.76137 13.0783 2.00221 13.1601 2.25 13.1602H15.75C15.9976 13.1602 16.2384 13.0785 16.4349 12.9278C16.6313 12.7771 16.7726 12.5657 16.8368 12.3265ZM1.125 11.0283L6.4215 7.76916L1.125 4.59103V11.0283Z" stroke="none"/>
                                </svg>
                            </span>
                            <div class="sectioncollback__contact-item_detail">
                                <a href="mailto:sales@million-otkrytok.ru" class="sectioncollback__contact-item_a">sales@million-otkrytok.ru</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sectioncollback__form">
                    <form action="/" method="post" enctype="multipart/form-data" class="sectioncollback__form-form">
                        <h3 class="sectioncollback__form-title">Заполните форму и мы свяжемся с вами в ближайшее время</h3>
                        <div class="sectioncollback__form-fields">

                            <div class="fields">

                                <div class="field">
                                    <div class="field__block">
                                        <input type="text" name="name" placeholder="Иванов Иван Иванович" value="" class="field__input" required>
                                        <label class="field__label">ФИО</label>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="field__block">
                                        <input type="tel" name="phone" placeholder="+7 (978) 123-45-67" value="" pattern="[0-9]{5,12}" class="field__input">
                                        <label class="field__label">Телефон</label>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="field__block">
                                        <input type="email" name="email" placeholder="E-mail" value="" class="field__input">
                                        <label class="field__label">E-mail</label>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="field__block">
                                        <textarea name="comment" placeholder="E-mail" cols="30" rows="4" class="field__input field__input--textarea"></textarea>
                                        <label class="field__label">E-mail</label>
                                    </div>
                                </div>

                                <div class="field field--button">
                                    <button type="submit" class="btn btn--dark field__button">Отправить форму</button>
                                    <div class="field__aggre">Отправляю форму, вы соглашаетесь с <a href="#">Пользовательским соглашением</a> и <a href="#">Политикой конфиденциальности</a></div>
                                </div>

                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'partials/footer.php'; ?>