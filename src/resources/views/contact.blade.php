<div>
    <section class="section section--top section--contactpage">
        <div class="container">
            <div class="contactpage">
                <div class="contactpage__contact">
                    <div class="contactpage__contact-address">{!! config('settings.address') !!}</div>
                    <div class="contactpage__contact-data">
                        <div class="contactpage__contact-title">Режим работы</div>
                        <div class="contactpage__contact-desc">{!! nl2br(config('settings.mode_detail')) !!}</div>
                    </div>
                    <div class="contactpage__contact-data">
                        <div class="contactpage__contact-title">Телефон</div>
                        <div class="contactpage__contact-desc">
                            <a href="tel:+{{ config('settings.phone') }}">{!! config('settings.phone') !!}</a>
                        </div>
                        <div class="contactpage__contact-desc">
                            <a href="tel:+{{ config('settings.phone_federal') }}">{!! config('settings.phone_federal') !!}</a><span> - бесплатно по России</span>
                        </div>
                    </div>
                    <div class="contactpage__contact-data">
                        <div class="contactpage__contact-title">E-mail</div>
                        <div class="contactpage__contact-desc">
                            <a href="mailto:{{ config('settings.email') }}">{!! config('settings.email') !!}</a>
                        </div>
                    </div>
                </div>
                <div class="contactpage__map">
                    <div id="contactpagemap" class="contactpage__map-map" data-geocode="{{ config('settings.geocode') }}"></div>
                </div>
            </div>
        </div>
    </section>


    <livewire:section.faqs />

    <livewire:section.feedback code="collback" senturl="{{ url()->current() }}" />
    
</div>

@assets
    <script src="https://api-maps.yandex.ru/2.1/?apikey={{ config('settings.yandex_token') }}&lang=ru-RU"></script>
@endassets

@script
<script>
 
 
    let map = document.getElementById('contactpagemap')
 
    if (map) {
        ymaps.ready(function () {
            var myMap = new ymaps.Map(map.id, {
                center: map.getAttribute('data-geocode').split(','),
                zoom: 13,
                controls: []
            }, {
                searchControlProvider: 'yandex#search'
            }),
            myPlacemark = new ymaps.Placemark(map.getAttribute('data-geocode').split(','), {
                //balloonContentHeader: "Балун метки",
                //balloonContentBody: "Содержимое <em>балуна</em> метки",
                //balloonContentFooter: "Подвал",
                //hintContent: "Хинт метки"
            });

            myMap.geoObjects.add(myPlacemark);
        });
    }
 
 
</script>
@endscript