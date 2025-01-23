<div>
    <section class="section section--top section--contactpage">
        <div class="container">
            <div class="contactpage">
                <div class="contactpage__contact">
                    <div class="contactpage__contact-address"><?php echo config('settings.address'); ?></div>
                    <div class="contactpage__contact-data">
                        <div class="contactpage__contact-title">Режим работы</div>
                        <div class="contactpage__contact-desc"><?php echo nl2br(config('settings.mode_detail')); ?></div>
                    </div>
                    <div class="contactpage__contact-data">
                        <div class="contactpage__contact-title">Телефон</div>
                        <div class="contactpage__contact-desc">
                            <a href="tel:+<?php echo e(config('settings.phone')); ?>"><?php echo config('settings.phone'); ?></a>
                        </div>
                        <div class="contactpage__contact-desc">
                            <a href="tel:+<?php echo e(config('settings.phone_federal')); ?>"><?php echo config('settings.phone_federal'); ?></a><span> - бесплатно по России</span>
                        </div>
                    </div>
                    <div class="contactpage__contact-data">
                        <div class="contactpage__contact-title">E-mail</div>
                        <div class="contactpage__contact-desc">
                            <a href="mailto:<?php echo e(config('settings.email')); ?>"><?php echo config('settings.email'); ?></a>
                        </div>
                    </div>
                </div>
                <div class="contactpage__map">
                    <div id="contactpagemap" class="contactpage__map-map" data-geocode="<?php echo e(config('settings.geocode')); ?>"></div>
                </div>
            </div>
        </div>
    </section>


    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('section.faqs', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2980406035-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('section.feedback', ['code' => 'collback','senturl' => ''.e(url()->current()).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-2980406035-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    
</div>

    <?php
        $__assetKey = '0-0';

        ob_start();
    ?>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=<?php echo e(config('settings.yandex_token')); ?>&lang=ru-RU"></script>
    <?php
        $__output = ob_get_clean();

        // If the asset has already been loaded anywhere during this request, skip it...
        if (in_array($__assetKey, \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$alreadyRunAssetKeys)) {
            // Skip it...
        } else {
            \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$alreadyRunAssetKeys[] = $__assetKey;
            \Livewire\store($this)->push('assets', $__output, $__assetKey);
        }
    ?>

    <?php
        $__scriptKey = '0-1';
        ob_start();
    ?>
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
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?><?php /**PATH /var/www/resources/views/contact.blade.php ENDPATH**/ ?>