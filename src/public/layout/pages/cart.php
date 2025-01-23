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
                    <span itemprop="name" class="breadcrumbs__name">Корзина</span>
                    <meta itemprop="position" content="1">
                </li>
            </ul>
        </div>
        <div class="title">
            <h1>Моя корзина
                <a href="#" onclick="return confirm('Вы действительно хотите удалить все товары из корзины?')">очистить</a>
            </h1>
            <button type="button" class="btn btn--white">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20">
                    <path d="M6.875 -0.00160217C6.14565 -0.00160217 5.44618 0.288129 4.93046 0.803854C4.41473 1.31958 4.125 2.01905 4.125 2.7484V5.4984H2.75C2.02065 5.4984 1.32118 5.78813 0.805456 6.30385C0.289731 6.81958 0 7.51905 0 8.2484L0 12.3734C0 13.1027 0.289731 13.8022 0.805456 14.3179C1.32118 14.8337 2.02065 15.1234 2.75 15.1234H4.125V16.4984C4.125 17.2277 4.41473 17.9272 4.93046 18.4429C5.44618 18.9587 6.14565 19.2484 6.875 19.2484H15.125C15.8543 19.2484 16.5538 18.9587 17.0695 18.4429C17.5853 17.9272 17.875 17.2277 17.875 16.4984V15.1234H19.25C19.9793 15.1234 20.6788 14.8337 21.1945 14.3179C21.7103 13.8022 22 13.1027 22 12.3734V8.2484C22 7.51905 21.7103 6.81958 21.1945 6.30385C20.6788 5.78813 19.9793 5.4984 19.25 5.4984H17.875V2.7484C17.875 2.01905 17.5853 1.31958 17.0695 0.803854C16.5538 0.288129 15.8543 -0.00160217 15.125 -0.00160217H6.875ZM5.5 2.7484C5.5 2.38373 5.64487 2.03399 5.90273 1.77613C6.16059 1.51826 6.51033 1.3734 6.875 1.3734H15.125C15.4897 1.3734 15.8394 1.51826 16.0973 1.77613C16.3551 2.03399 16.5 2.38373 16.5 2.7484V5.4984H5.5V2.7484ZM6.875 9.6234C6.14565 9.6234 5.44618 9.91313 4.93046 10.4289C4.41473 10.9446 4.125 11.6441 4.125 12.3734V13.7484H2.75C2.38533 13.7484 2.03559 13.6035 1.77773 13.3457C1.51987 13.0878 1.375 12.7381 1.375 12.3734V8.2484C1.375 7.88373 1.51987 7.53399 1.77773 7.27613C2.03559 7.01826 2.38533 6.8734 2.75 6.8734H19.25C19.6147 6.8734 19.9644 7.01826 20.2223 7.27613C20.4801 7.53399 20.625 7.88373 20.625 8.2484V12.3734C20.625 12.7381 20.4801 13.0878 20.2223 13.3457C19.9644 13.6035 19.6147 13.7484 19.25 13.7484H17.875V12.3734C17.875 11.6441 17.5853 10.9446 17.0695 10.4289C16.5538 9.91313 15.8543 9.6234 15.125 9.6234H6.875ZM16.5 12.3734V16.4984C16.5 16.8631 16.3551 17.2128 16.0973 17.4707C15.8394 17.7285 15.4897 17.8734 15.125 17.8734H6.875C6.51033 17.8734 6.16059 17.7285 5.90273 17.4707C5.64487 17.2128 5.5 16.8631 5.5 16.4984V12.3734C5.5 12.0087 5.64487 11.659 5.90273 11.4011C6.16059 11.1433 6.51033 10.9984 6.875 10.9984H15.125C15.4897 10.9984 15.8394 11.1433 16.0973 11.4011C16.3551 11.659 16.5 12.0087 16.5 12.3734Z" stroke="none"/>
                </svg>
                <span>Распечатать</span>
            </button>
        </div>
    </div>
</section>

<section class="section section--top section--cartpage">
    <div class="container">
        <div class="cartpage">
            <div class="cartpage__card">
                <div class="alert alert--danger">До минимальной суммы заказа не хватает: 0 000 ₽</div>

                <!-- Cart item -->
                <div class="cartpage__card-item">
                    <div class="cartpage__card-item_image">
                        <a href="#" class="cartpage__card-item_a">
                            <img src="assets/image/demo/productpage.webp" alt="" class="cartpage__card-item_img">
                        </a>
                    </div>
                    <div class="cartpage__card-item_data">
                        <h4 class="cartpage__card-item_name">
                            <a href="#">Наименование товара</a>
                        </h4>
                        <div class="cartpage__card-item_desc">Артикул: 1101-0018</div>
                        <div class="cartpage__card-item_desc">На складе: 2 шт.</div>
                        <div class="productcard__label cartpage__card-item_label">
                            <span class="productcard__label-item productcard__label-item--skidka">Скидка группа 4</span>
                            <span class="productcard__label-item productcard__label-item--new">Новинка</span>
                        </div>
                    </div>
                    <div class="cartpage__card-item_prices">
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Цена:</div>
                            <div class="cartpage__price-data"> 
                                <div class="cartpage__price-old">1.30 руб/шт.</div>
                                <div class="cartpage__price-new">1.20 руб/шт.</div>
                            </div>
                        </div>
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Мин. партия: 10</div>
                            <div class="cartpage__price-data"> 
                                <div class="productcard__count cartpage__price-count">
                                    <button type="button" class="productcard__count-action" data-type="-">-</button>
                                    <input type="number" name="" min="20" max="60" step="20" value="20" class="productcard__count-count">
                                    <button type="button" class="productcard__count-action" data-type="+">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Итого:</div>
                            <div class="cartpage__price-data"> 
                                <div class="cartpage__price-old">1.30 руб</div>
                                <div class="cartpage__price-new">1.20 руб</div>
                            </div>
                        </div>

                        <div class="cartpage__card-buttons">
                            <button type="button" class="cartpage__card-button cartpage__card-button--favorite">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18">
                                    <path d="M9.42887 3.82782L8.62222 2.98712C6.72878 1.01371 3.25693 1.69471 2.00364 4.17574C1.41525 5.34268 1.28249 7.02749 2.3569 9.17772C3.39193 11.2481 5.54525 13.728 9.42887 16.4292C13.3125 13.728 15.4647 11.2481 16.5008 9.17772C17.5752 7.02635 17.4436 5.34268 16.8541 4.17574C15.6008 1.69471 12.1289 1.01257 10.2355 2.98598L9.42887 3.82782ZM9.42887 17.8037C-7.82128 6.24611 4.11758 -2.77457 9.23086 1.99699C9.29836 2.06011 9.36436 2.12513 9.42887 2.19205C9.49224 2.12471 9.5583 2.06002 9.62687 1.99813C14.739 -2.77685 26.679 6.24497 9.42887 17.8037Z" stroke="none"/>
                                </svg>
                            </button>
                            <button type="button" class="cartpage__card-button cartpage__card-button--trash">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18">
                                    <path d="M15.0001 3.12169C15.0002 3.2146 14.985 3.3069 14.9552 3.3949L12.9104 15.664C12.8158 16.2313 12.5229 16.7466 12.084 17.1182C11.645 17.4897 11.0885 17.6935 10.5134 17.6931H4.91428C4.33939 17.6932 3.78312 17.4893 3.34443 17.1178C2.90573 16.7462 2.61307 16.2311 2.5185 15.664L0.47364 3.3949C0.443831 3.3069 0.428654 3.2146 0.428711 3.12169C0.428711 1.7799 3.69028 0.693115 7.71443 0.693115C11.7386 0.693115 15.0001 1.7799 15.0001 3.12169ZM1.90407 4.58733L3.717 15.4637C3.76414 15.7472 3.91032 16.0048 4.12956 16.1907C4.34879 16.3766 4.62685 16.4787 4.91428 16.4788H10.5146C10.802 16.4787 11.0801 16.3766 11.2993 16.1907C11.5185 16.0048 11.6647 15.7472 11.7119 15.4637L13.5248 4.58733C12.1951 5.17262 10.0871 5.55026 7.71443 5.55026C5.34171 5.55026 3.23371 5.17262 1.90407 4.58733Z" stroke="none"/>
                                </svg>
                            </button>
                        </div>

                    </div>
                </div>
                <!-- End Cart item -->

                <!-- Cart item -->
                <div class="cartpage__card-item">
                    <div class="cartpage__card-item_image">
                        <a href="#" class="cartpage__card-item_a">
                            <img src="assets/image/demo/productpage.webp" alt="" class="cartpage__card-item_img">
                        </a>
                    </div>
                    <div class="cartpage__card-item_data">
                        <h4 class="cartpage__card-item_name">
                            <a href="#">Наименование товара</a>
                        </h4>
                        <div class="cartpage__card-item_desc">Артикул: 1101-0018</div>
                        <div class="cartpage__card-item_desc">На складе: 2 шт.</div>
                        <div class="productcard__label cartpage__card-item_label">
                            <span class="productcard__label-item productcard__label-item--skidka">Скидка группа 4</span>
                            <span class="productcard__label-item productcard__label-item--new">Новинка</span>
                        </div>
                    </div>
                    <div class="cartpage__card-item_prices">
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Цена:</div>
                            <div class="cartpage__price-data"> 
                                <div class="cartpage__price-old">1.30 руб/шт.</div>
                                <div class="cartpage__price-new">1.20 руб/шт.</div>
                            </div>
                        </div>
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Мин. партия: 10</div>
                            <div class="cartpage__price-data"> 
                                <div class="productcard__count cartpage__price-count">
                                    <button type="button" class="productcard__count-action" data-type="-">-</button>
                                    <input type="number" name="" min="20" max="60" step="20" value="20" class="productcard__count-count">
                                    <button type="button" class="productcard__count-action" data-type="+">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Итого:</div>
                            <div class="cartpage__price-data"> 
                                <div class="cartpage__price-old">1.30 руб</div>
                                <div class="cartpage__price-new">1.20 руб</div>
                            </div>
                        </div>

                        <div class="cartpage__card-buttons">
                            <button type="button" class="cartpage__card-button cartpage__card-button--favorite">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18">
                                    <path d="M9.42887 3.82782L8.62222 2.98712C6.72878 1.01371 3.25693 1.69471 2.00364 4.17574C1.41525 5.34268 1.28249 7.02749 2.3569 9.17772C3.39193 11.2481 5.54525 13.728 9.42887 16.4292C13.3125 13.728 15.4647 11.2481 16.5008 9.17772C17.5752 7.02635 17.4436 5.34268 16.8541 4.17574C15.6008 1.69471 12.1289 1.01257 10.2355 2.98598L9.42887 3.82782ZM9.42887 17.8037C-7.82128 6.24611 4.11758 -2.77457 9.23086 1.99699C9.29836 2.06011 9.36436 2.12513 9.42887 2.19205C9.49224 2.12471 9.5583 2.06002 9.62687 1.99813C14.739 -2.77685 26.679 6.24497 9.42887 17.8037Z" stroke="none"/>
                                </svg>
                            </button>
                            <button type="button" class="cartpage__card-button cartpage__card-button--trash">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18">
                                    <path d="M15.0001 3.12169C15.0002 3.2146 14.985 3.3069 14.9552 3.3949L12.9104 15.664C12.8158 16.2313 12.5229 16.7466 12.084 17.1182C11.645 17.4897 11.0885 17.6935 10.5134 17.6931H4.91428C4.33939 17.6932 3.78312 17.4893 3.34443 17.1178C2.90573 16.7462 2.61307 16.2311 2.5185 15.664L0.47364 3.3949C0.443831 3.3069 0.428654 3.2146 0.428711 3.12169C0.428711 1.7799 3.69028 0.693115 7.71443 0.693115C11.7386 0.693115 15.0001 1.7799 15.0001 3.12169ZM1.90407 4.58733L3.717 15.4637C3.76414 15.7472 3.91032 16.0048 4.12956 16.1907C4.34879 16.3766 4.62685 16.4787 4.91428 16.4788H10.5146C10.802 16.4787 11.0801 16.3766 11.2993 16.1907C11.5185 16.0048 11.6647 15.7472 11.7119 15.4637L13.5248 4.58733C12.1951 5.17262 10.0871 5.55026 7.71443 5.55026C5.34171 5.55026 3.23371 5.17262 1.90407 4.58733Z" stroke="none"/>
                                </svg>
                            </button>
                        </div>
                        
                    </div>
                </div>
                <!-- End Cart item -->
                <!-- Cart item -->
                <div class="cartpage__card-item">
                    <div class="cartpage__card-item_image">
                        <a href="#" class="cartpage__card-item_a">
                            <img src="assets/image/demo/productpage.webp" alt="" class="cartpage__card-item_img">
                        </a>
                    </div>
                    <div class="cartpage__card-item_data">
                        <h4 class="cartpage__card-item_name">
                            <a href="#">Наименование товара</a>
                        </h4>
                        <div class="cartpage__card-item_desc">Артикул: 1101-0018</div>
                        <div class="cartpage__card-item_desc">На складе: 2 шт.</div>
                        <div class="productcard__label cartpage__card-item_label">
                            <span class="productcard__label-item productcard__label-item--skidka">Скидка группа 4</span>
                            <span class="productcard__label-item productcard__label-item--new">Новинка</span>
                        </div>
                    </div>
                    <div class="cartpage__card-item_prices">
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Цена:</div>
                            <div class="cartpage__price-data"> 
                                <div class="cartpage__price-new">1.20 руб/шт.</div>
                            </div>
                        </div>
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Мин. партия: 10</div>
                            <div class="cartpage__price-data"> 
                                <div class="productcard__count cartpage__price-count">
                                    <button type="button" class="productcard__count-action" data-type="-">-</button>
                                    <input type="number" name="" min="20" max="60" step="20" value="20" class="productcard__count-count">
                                    <button type="button" class="productcard__count-action" data-type="+">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Итого:</div>
                            <div class="cartpage__price-data"> 
                                <div class="cartpage__price-new">1.20 руб</div>
                            </div>
                        </div>

                        <div class="cartpage__card-buttons">
                            <button type="button" class="cartpage__card-button cartpage__card-button--favorite">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18">
                                    <path d="M9.42887 3.82782L8.62222 2.98712C6.72878 1.01371 3.25693 1.69471 2.00364 4.17574C1.41525 5.34268 1.28249 7.02749 2.3569 9.17772C3.39193 11.2481 5.54525 13.728 9.42887 16.4292C13.3125 13.728 15.4647 11.2481 16.5008 9.17772C17.5752 7.02635 17.4436 5.34268 16.8541 4.17574C15.6008 1.69471 12.1289 1.01257 10.2355 2.98598L9.42887 3.82782ZM9.42887 17.8037C-7.82128 6.24611 4.11758 -2.77457 9.23086 1.99699C9.29836 2.06011 9.36436 2.12513 9.42887 2.19205C9.49224 2.12471 9.5583 2.06002 9.62687 1.99813C14.739 -2.77685 26.679 6.24497 9.42887 17.8037Z" stroke="none"/>
                                </svg>
                            </button>
                            <button type="button" class="cartpage__card-button cartpage__card-button--trash">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18">
                                    <path d="M15.0001 3.12169C15.0002 3.2146 14.985 3.3069 14.9552 3.3949L12.9104 15.664C12.8158 16.2313 12.5229 16.7466 12.084 17.1182C11.645 17.4897 11.0885 17.6935 10.5134 17.6931H4.91428C4.33939 17.6932 3.78312 17.4893 3.34443 17.1178C2.90573 16.7462 2.61307 16.2311 2.5185 15.664L0.47364 3.3949C0.443831 3.3069 0.428654 3.2146 0.428711 3.12169C0.428711 1.7799 3.69028 0.693115 7.71443 0.693115C11.7386 0.693115 15.0001 1.7799 15.0001 3.12169ZM1.90407 4.58733L3.717 15.4637C3.76414 15.7472 3.91032 16.0048 4.12956 16.1907C4.34879 16.3766 4.62685 16.4787 4.91428 16.4788H10.5146C10.802 16.4787 11.0801 16.3766 11.2993 16.1907C11.5185 16.0048 11.6647 15.7472 11.7119 15.4637L13.5248 4.58733C12.1951 5.17262 10.0871 5.55026 7.71443 5.55026C5.34171 5.55026 3.23371 5.17262 1.90407 4.58733Z" stroke="none"/>
                                </svg>
                            </button>
                        </div>
                        
                    </div>
                </div>
                <!-- End Cart item -->
                <!-- Cart item -->
                <div class="cartpage__card-item">
                    <div class="cartpage__card-item_image">
                        <a href="#" class="cartpage__card-item_a">
                            <img src="assets/image/demo/productpage.webp" alt="" class="cartpage__card-item_img">
                        </a>
                    </div>
                    <div class="cartpage__card-item_data">
                        <h4 class="cartpage__card-item_name">
                            <a href="#">Наименование товара</a>
                        </h4>
                        <div class="cartpage__card-item_desc">Артикул: 1101-0018</div>
                        <div class="cartpage__card-item_desc">На складе: 2 шт.</div>
                        <div class="productcard__label cartpage__card-item_label">
                            <span class="productcard__label-item productcard__label-item--skidka">Скидка группа 4</span>
                            <span class="productcard__label-item productcard__label-item--new">Новинка</span>
                        </div>
                    </div>
                    <div class="cartpage__card-item_prices">
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Цена:</div>
                            <div class="cartpage__price-data"> 
                                <div class="cartpage__price-new">1.20 руб/шт.</div>
                            </div>
                        </div>
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Мин. партия: 10</div>
                            <div class="cartpage__price-data"> 
                                <div class="productcard__count cartpage__price-count">
                                    <button type="button" class="productcard__count-action" data-type="-">-</button>
                                    <input type="number" name="" min="20" max="60" step="20" value="20" class="productcard__count-count">
                                    <button type="button" class="productcard__count-action" data-type="+">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Итого:</div>
                            <div class="cartpage__price-data"> 
                                <div class="cartpage__price-new">1.20 руб</div>
                            </div>
                        </div>

                        <div class="cartpage__card-buttons">
                            <button type="button" class="cartpage__card-button cartpage__card-button--favorite">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18">
                                    <path d="M9.42887 3.82782L8.62222 2.98712C6.72878 1.01371 3.25693 1.69471 2.00364 4.17574C1.41525 5.34268 1.28249 7.02749 2.3569 9.17772C3.39193 11.2481 5.54525 13.728 9.42887 16.4292C13.3125 13.728 15.4647 11.2481 16.5008 9.17772C17.5752 7.02635 17.4436 5.34268 16.8541 4.17574C15.6008 1.69471 12.1289 1.01257 10.2355 2.98598L9.42887 3.82782ZM9.42887 17.8037C-7.82128 6.24611 4.11758 -2.77457 9.23086 1.99699C9.29836 2.06011 9.36436 2.12513 9.42887 2.19205C9.49224 2.12471 9.5583 2.06002 9.62687 1.99813C14.739 -2.77685 26.679 6.24497 9.42887 17.8037Z" stroke="none"/>
                                </svg>
                            </button>
                            <button type="button" class="cartpage__card-button cartpage__card-button--trash">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18">
                                    <path d="M15.0001 3.12169C15.0002 3.2146 14.985 3.3069 14.9552 3.3949L12.9104 15.664C12.8158 16.2313 12.5229 16.7466 12.084 17.1182C11.645 17.4897 11.0885 17.6935 10.5134 17.6931H4.91428C4.33939 17.6932 3.78312 17.4893 3.34443 17.1178C2.90573 16.7462 2.61307 16.2311 2.5185 15.664L0.47364 3.3949C0.443831 3.3069 0.428654 3.2146 0.428711 3.12169C0.428711 1.7799 3.69028 0.693115 7.71443 0.693115C11.7386 0.693115 15.0001 1.7799 15.0001 3.12169ZM1.90407 4.58733L3.717 15.4637C3.76414 15.7472 3.91032 16.0048 4.12956 16.1907C4.34879 16.3766 4.62685 16.4787 4.91428 16.4788H10.5146C10.802 16.4787 11.0801 16.3766 11.2993 16.1907C11.5185 16.0048 11.6647 15.7472 11.7119 15.4637L13.5248 4.58733C12.1951 5.17262 10.0871 5.55026 7.71443 5.55026C5.34171 5.55026 3.23371 5.17262 1.90407 4.58733Z" stroke="none"/>
                                </svg>
                            </button>
                        </div>
                        
                    </div>
                </div>
                <!-- End Cart item -->
                <!-- Cart item -->
                <div class="cartpage__card-item">
                    <div class="cartpage__card-item_image">
                        <a href="#" class="cartpage__card-item_a">
                            <img src="assets/image/demo/productpage.webp" alt="" class="cartpage__card-item_img">
                        </a>
                    </div>
                    <div class="cartpage__card-item_data">
                        <h4 class="cartpage__card-item_name">
                            <a href="#">Наименование товара</a>
                        </h4>
                        <div class="cartpage__card-item_desc">Артикул: 1101-0018</div>
                        <div class="cartpage__card-item_desc">На складе: 2 шт.</div>
                        <div class="productcard__label cartpage__card-item_label">
                            <span class="productcard__label-item productcard__label-item--skidka">Скидка группа 4</span>
                            <span class="productcard__label-item productcard__label-item--new">Новинка</span>
                        </div>
                    </div>
                    <div class="cartpage__card-item_prices">
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Цена:</div>
                            <div class="cartpage__price-data"> 
                                <div class="cartpage__price-new">1.20 руб/шт.</div>
                            </div>
                        </div>
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Мин. партия: 10</div>
                            <div class="cartpage__price-data"> 
                                <div class="productcard__count cartpage__price-count">
                                    <button type="button" class="productcard__count-action" data-type="-">-</button>
                                    <input type="number" name="" min="20" max="60" step="20" value="20" class="productcard__count-count">
                                    <button type="button" class="productcard__count-action" data-type="+">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="cartpage__card-item_price">
                            <div class="cartpage__price-title">Итого:</div>
                            <div class="cartpage__price-data"> 
                                <div class="cartpage__price-new">1.20 руб</div>
                            </div>
                        </div>

                        <div class="cartpage__card-buttons">
                            <button type="button" class="cartpage__card-button cartpage__card-button--favorite">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18">
                                    <path d="M9.42887 3.82782L8.62222 2.98712C6.72878 1.01371 3.25693 1.69471 2.00364 4.17574C1.41525 5.34268 1.28249 7.02749 2.3569 9.17772C3.39193 11.2481 5.54525 13.728 9.42887 16.4292C13.3125 13.728 15.4647 11.2481 16.5008 9.17772C17.5752 7.02635 17.4436 5.34268 16.8541 4.17574C15.6008 1.69471 12.1289 1.01257 10.2355 2.98598L9.42887 3.82782ZM9.42887 17.8037C-7.82128 6.24611 4.11758 -2.77457 9.23086 1.99699C9.29836 2.06011 9.36436 2.12513 9.42887 2.19205C9.49224 2.12471 9.5583 2.06002 9.62687 1.99813C14.739 -2.77685 26.679 6.24497 9.42887 17.8037Z" stroke="none"/>
                                </svg>
                            </button>
                            <button type="button" class="cartpage__card-button cartpage__card-button--trash">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18">
                                    <path d="M15.0001 3.12169C15.0002 3.2146 14.985 3.3069 14.9552 3.3949L12.9104 15.664C12.8158 16.2313 12.5229 16.7466 12.084 17.1182C11.645 17.4897 11.0885 17.6935 10.5134 17.6931H4.91428C4.33939 17.6932 3.78312 17.4893 3.34443 17.1178C2.90573 16.7462 2.61307 16.2311 2.5185 15.664L0.47364 3.3949C0.443831 3.3069 0.428654 3.2146 0.428711 3.12169C0.428711 1.7799 3.69028 0.693115 7.71443 0.693115C11.7386 0.693115 15.0001 1.7799 15.0001 3.12169ZM1.90407 4.58733L3.717 15.4637C3.76414 15.7472 3.91032 16.0048 4.12956 16.1907C4.34879 16.3766 4.62685 16.4787 4.91428 16.4788H10.5146C10.802 16.4787 11.0801 16.3766 11.2993 16.1907C11.5185 16.0048 11.6647 15.7472 11.7119 15.4637L13.5248 4.58733C12.1951 5.17262 10.0871 5.55026 7.71443 5.55026C5.34171 5.55026 3.23371 5.17262 1.90407 4.58733Z" stroke="none"/>
                                </svg>
                            </button>
                        </div>
                        
                    </div>
                </div>
                <!-- End Cart item -->

                
            </div>
            <div class="cartpage__total">
                
                <div class="cartpage__total-item">
                    <div class="cartpage__total-title">Скидки по группам</div>
                    <div class="cartpage__total-data">
                        <div class="cartpage__scale">
                            <div class="cartpage__scale-item">
                                <span class="cartpage__scale-title">1</span>
                                <span class="cartpage__scale-data">
                                    <span class="cartpage__scale-scale" style="width: 60%"></span>
                                    <span>0%</span>
                                    <span>3 300 руб / 6 000 руб</span>
                                    <span>2%</span>
                                </span>
                            </div>
                            <div class="cartpage__scale-item">
                                <span class="cartpage__scale-title">2</span>
                                <span class="cartpage__scale-data">
                                    <span class="cartpage__scale-scale"></span>
                                    <span>0%</span>
                                    <span>0 000 руб / 6 000 руб</span>
                                    <span>2%</span>
                                </span>
                            </div>
                            <div class="cartpage__scale-item">
                                <span class="cartpage__scale-title">3</span>
                                <span class="cartpage__scale-data">
                                    <span class="cartpage__scale-scale"></span>
                                    <span>0%</span>
                                    <span>0 000 руб / 6 000 руб</span>
                                    <span>2%</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cartpage__total-item cartpage__total-item--db cartpage__total-item--sticky">
                    <div class="cartpage__total-title">Промокод</div>
                    <div class="cartpage__total-data">
                        <div class="fields">
                            <div class="field">
                                <div class="field__block">
                                    <input type="text" name="coupon" placeholder="Введите промокод" value="" class="field__input" required="">
                                    <label class="field__label">Введите промокод</label>
                                </div>
                            </div>
                        </div>
                        <hr class="hr"></hr>
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
                            <button type="button" class="btn disabled">Перейти к оформлению</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



<section class="section section--product section--bg">
    <div class="container">

        <div class="section__title">
            <div class="section__title-item">
                <h2 class="section__title-h active">Обратите внимание</h2>
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