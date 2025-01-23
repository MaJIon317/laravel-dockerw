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
                    <span itemprop="name" class="breadcrumbs__name">Избранные товары</span>
                    <meta itemprop="position" content="1">
                </li>
            </ul>
        </div>
        <h1>Избранные товары</h1>
    </div>
</section>

<section class="section section--categorypage">
    <div class="container">
        <div class="sorts">
            <div class="sort">

                <div class="sort__item" onchange="webdementSort(this)">
                    <div class="sort__item-title">Сортировка</div>
                    <div class="sort__item-text">По-умолчанию</div>
                    <div class="sort__item-items">
                        <label class="sort__item-item">
                            <input type="radio" name="sort-1" value="0" data-value="По-умолчанию" checked>
                            <span class="sort__item-input_text">По-умолчанию</span>
                        </label>
                        <label class="sort__item-item">
                            <input type="radio" name="sort-1" value="1" data-value="Сортировка 1">
                            <span class="sort__item-input_text">Сортировка 1</span>
                        </label>
                        <label class="sort__item-item">
                            <input type="radio" name="sort-1" value="2" data-value="Сортировка 2">
                            <span class="sort__item-input_text">Сортировка 2</span>
                        </label>
                        <label class="sort__item-item">
                            <input type="radio" name="sort-1" value="3" data-value="Сортировка 3">
                            <span class="sort__item-input_text">Сортировка 3</span>
                        </label>
                        <label class="sort__item-item">
                            <input type="radio" name="sort-1" value="4" data-value="Сортировка 4">
                            <span class="sort__item-input_text">Сортировка 4</span>
                        </label>
                    </div>
                </div>

                <div class="sort__item">
                    <div class="sort__item-title">Фильтр по цене, ₽</div>
                    <div class="sort__item-prices">
                        <label class="sort__item-price">
                            <span>от</span>
                            <input type="number" name="" value="" placeholder="1">
                        </label>
                        <label class="sort__item-price">
                            <span>до</span>
                            <input type="number" name="" value="" placeholder="23359">
                        </label>
                    </div>
                </div>

                <div class="sort__item" onchange="webdementSort(this)">
                    <div class="sort__item-title">Фильтр по ценовой группе</div>
                    <div class="sort__item-text">Все группы</div>
                    <div class="sort__item-items">
                        <label class="sort__item-item">
                            <input type="radio" name="sort-2" value="0" data-value="Все группы" checked>
                            <span class="sort__item-input_text">Все группы</span>
                        </label>
                        <label class="sort__item-item">
                            <input type="radio" name="sort-2" value="1" data-value="Группа 1">
                            <span class="sort__item-input_text">Группа 1</span>
                        </label>
                        <label class="sort__item-item">
                            <input type="radio" name="sort-2" value="2" data-value="Группа 2">
                            <span class="sort__item-input_text">Группа 2</span>
                        </label>
                        <label class="sort__item-item">
                            <input type="radio" name="sort-2" value="3" data-value="Группа 3">
                            <span class="sort__item-input_text">Группа 3</span>
                        </label>
                    </div>
                </div>
                 
            </div>

            <div class="sort mobile-hidden">

                <div class="sort__item sort__item--two" onchange="webdementSort(this)">
                    <div class="sort__item-title"></div>
                    <div class="sort__item-text">Показать по 20</div>
                    <div class="sort__item-items">
                        <label class="sort__item-item">
                            <input type="radio" name="sort-3" value="0" data-value="Показать по 20" checked>
                            <span class="sort__item-input_text">Показать по 20</span>
                        </label>
                        <label class="sort__item-item">
                            <input type="radio" name="sort-3" value="1" data-value="Показать по 50">
                            <span class="sort__item-input_text">Показать по 50</span>
                        </label>
                        <label class="sort__item-item">
                            <input type="radio" name="sort-3" value="2" data-value="Показать по 100">
                            <span class="sort__item-input_text">Показать по 100</span>
                        </label>
                        <label class="sort__item-item">
                            <input type="radio" name="sort-3" value="3" data-value="Показать все">
                            <span class="sort__item-input_text">Показать все</span>
                        </label>
                    </div>
                </div>

                <div class="sort__item sort__item--view">
                    <div class="sort__item-title"></div>
                    <div class="sort__item-text">
                        <label type="button" class="sort__item-button">
                            <input type="radio" name="view" value="list">
                            <svg width="35" height="36" viewBox="0 0 35 36" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.998413" width="34" height="8.66667" rx="0.5" fill="none"/>
                                <rect x="0.5" y="13.6651" width="34" height="8.66667" rx="0.5" fill="none"/>
                                <rect x="0.5" y="26.3318" width="34" height="8.66667" rx="0.5" fill="none"/>
                            </svg>
                        </label>
                        <label type="button" class="sort__item-button">
                            <input type="radio" name="view" value="grid" checked>
                            <svg width="35" height="36" viewBox="0 0 35 36" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.998413" width="10" height="10" rx="0.5" fill="none"/>
                                <rect x="12.5" y="0.998413" width="10" height="10" rx="0.5" fill="none"/>
                                <rect x="24.5" y="0.998413" width="10" height="10" rx="0.5" fill="none"/>
                                <rect x="0.5" y="12.9984" width="10" height="10" rx="0.5" fill="none"/>
                                <rect x="12.5" y="12.9984" width="10" height="10" rx="0.5" fill="none"/>
                                <rect x="24.5" y="12.9984" width="10" height="10" rx="0.5" fill="none"/>
                                <rect x="0.5" y="24.9984" width="10" height="10" rx="0.5" fill="none"/>
                                <rect x="12.5" y="24.9984" width="10" height="10" rx="0.5" fill="none"/>
                                <rect x="24.5" y="24.9984" width="10" height="10" rx="0.5" fill="none"/>
                            </svg>
                        </label>
                    </div>
                </div>

            </div>

        </div>

        <div class="categorypage categorypage--grid">

            <!-- Product card -->
            <div class="categorypage__item">
                <?php include 'partials/productcard.php'; ?>
            </div>
            <!-- Product card -->
             <!-- Product card -->
            <div class="categorypage__item">
                <?php include 'partials/productcard.php'; ?>
            </div>
            <!-- Product card -->
            <!-- Product card -->
            <div class="categorypage__item">
                <?php include 'partials/productcard.php'; ?>
            </div>
            <!-- Product card -->
             <!-- Product card -->
            <div class="categorypage__item">
                <?php include 'partials/productcard.php'; ?>
            </div>
            <!-- Product card -->
            <!-- Product card -->
            <div class="categorypage__item">
                <?php include 'partials/productcard.php'; ?>
            </div>
            <!-- Product card -->
             <!-- Product card -->
            <div class="categorypage__item">
                <?php include 'partials/productcard.php'; ?>
            </div>
            <!-- Product card -->
            <!-- Product card -->
            <div class="categorypage__item">
                <?php include 'partials/productcard.php'; ?>
            </div>
            <!-- Product card -->
             <!-- Product card -->
            <div class="categorypage__item">
                <?php include 'partials/productcard.php'; ?>
            </div>
            <!-- Product card -->
            <!-- Product card -->
            <div class="categorypage__item">
                <?php include 'partials/productcard.php'; ?>
            </div>
            <!-- Product card -->
             <!-- Product card -->
            <div class="categorypage__item">
                <?php include 'partials/productcard.php'; ?>
            </div>
            <!-- Product card -->

        </div>

        <div class="pagination">
            <a href="#" class="pagination__a pagination__prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.09541 0.133992C7.13838 0.176859 7.17248 0.227785 7.19574 0.283851C7.21901 0.339916 7.23098 0.400021 7.23098 0.460722C7.23098 0.521424 7.21901 0.581528 7.19574 0.637594C7.17248 0.69366 7.13838 0.744586 7.09541 0.787453L1.8834 5.99853L7.09541 11.2096C7.18206 11.2963 7.23074 11.4138 7.23074 11.5363C7.23074 11.6589 7.18206 11.7764 7.09541 11.8631C7.00875 11.9497 6.89122 11.9984 6.76868 11.9984C6.64613 11.9984 6.5286 11.9497 6.44194 11.8631L0.904133 6.32527C0.861156 6.2824 0.827059 6.23147 0.803794 6.17541C0.78053 6.11934 0.768555 6.05924 0.768555 5.99853C0.768555 5.93783 0.78053 5.87773 0.803794 5.82166C0.827059 5.7656 0.861156 5.71467 0.904133 5.6718L6.44194 0.133992C6.48481 0.0910151 6.53574 0.056918 6.5918 0.0336532C6.64787 0.0103885 6.70797 -0.00158691 6.76868 -0.00158691C6.82938 -0.00158691 6.88948 0.0103885 6.94555 0.0336532C7.00161 0.056918 7.05254 0.0910151 7.09541 0.133992Z" stroke="none"/>
                </svg>
            </a>

            <ul class="pagination__ul">
                <li class="pagination__li">
                    <a href="#" class="pagination__a">1</a>
                </li>

                <li class="pagination__li">
                    <span class="pagination__a">...</span>
                    <div class="pagination__page">
                        <div class="pagination__page-block">
                            <a href="#" class="pagination__page-a">2</a>
                            <span class="pagination__page-dot">...</span>
                            <a href="#" class="pagination__page-a">3</a>
                            <span class="pagination__page-dot">...</span>
                            <a href="#" class="pagination__page-a">4</a>
                        </div>
                    </div>
                </li>

                <li class="pagination__li">
                    <a href="#" class="pagination__a">5</a>
                </li>
                <li class="pagination__li">
                    <a href="#" class="pagination__a">6</a>
                </li>
                <li class="pagination__li">
                    <a href="#" class="pagination__a">7</a>
                </li>

                <li class="pagination__li">
                    <span class="pagination__a">...</span>
                    <div class="pagination__page">
                        <div class="pagination__page-block">
                            <a href="#" class="pagination__page-a">23</a>
                            <span class="pagination__page-dot">...</span>
                            <a href="#" class="pagination__page-a">54</a>
                            <span class="pagination__page-dot">...</span>
                            <a href="#" class="pagination__page-a">88</a>
                        </div>
                    </div>
                </li>

                <li class="pagination__li">
                    <a href="#" class="pagination__a">232</a>
                </li>
            </ul>
            <a href="#" class="pagination__a pagination__prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.905508 0.586423C0.862547 0.625984 0.828463 0.672981 0.805207 0.724722C0.781951 0.776463 0.76998 0.831931 0.76998 0.887949C0.76998 0.943968 0.781951 0.999436 0.805207 1.05118C0.828463 1.10292 0.862547 1.14991 0.905508 1.18948L6.11555 5.99856L0.905508 10.8076C0.818886 10.8876 0.770222 10.9961 0.770222 11.1092C0.770222 11.2223 0.818886 11.3307 0.905508 11.4107C0.992129 11.4907 1.10961 11.5356 1.23212 11.5356C1.35462 11.5356 1.4721 11.4907 1.55872 11.4107L7.09445 6.30008C7.13741 6.26052 7.1715 6.21353 7.19475 6.16179C7.21801 6.11004 7.22998 6.05458 7.22998 5.99856C7.22998 5.94254 7.21801 5.88707 7.19475 5.83533C7.1715 5.78359 7.13741 5.73659 7.09445 5.69703L1.55872 0.586423C1.51587 0.546762 1.46497 0.515295 1.40892 0.493825C1.35288 0.472355 1.29279 0.461304 1.23212 0.461304C1.17144 0.461304 1.11136 0.472355 1.05531 0.493825C0.999266 0.515295 0.948359 0.546762 0.905508 0.586423Z" stroke="none"/>
                </svg>
            </a>
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