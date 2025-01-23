<div>
    <section class="section section--productpage">
        <div class="container">
            <div class="productpage">
                <div class="productpage__data">
                    <div class="productpage__image">

                        <div class="productpage__image-thumb">
                            <div thumbsSlider="" class="swiper" data-swiper-parent="1" data-slider-design="productpage">
                                <div class="swiper-wrapper">
                                    <?php if($product->video): ?>
                                        <div class="swiper-slide">
                                            <div class="youtubeblock"> 
                                                <button type="button" class="youtubeblock-button">
                                                    <img src="https://img.youtube.com/vi/<?php echo e($product->video); ?>/default.jpg" alt=".">
                                                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.8" d="M56.968 23.032C52.624 18.688 46.624 16 40 16C33.376 16 27.376 18.688 23.032 23.032C18.688 27.376 16 33.376 16 40C16 53.248 26.752 64 40 64C46.624 64 52.624 61.312 56.968 56.968C61.312 52.624 64 46.624 64 40C64 33.376 61.312 27.376 56.968 23.032ZM48.04 41.728L36.712 47.536C36.448 47.68 36.136 47.752 35.824 47.752C35.488 47.752 35.128 47.656 34.816 47.464C34.24 47.104 33.88 46.48 33.88 45.808V34.192C33.88 33.52 34.24 32.896 34.816 32.536C35.392 32.176 36.112 32.152 36.712 32.464L48.04 38.272C48.712 38.608 49.096 39.256 49.096 40C49.096 40.744 48.712 41.392 48.04 41.728Z" stroke="none"></path>
                                                        <circle cx="40" cy="40" r="31.5" stroke="#AD9575" fill="none"></circle>
                                                        <circle opacity="0.4" cx="40" cy="40" r="39.5" stroke="#AD9575" fill="none"></circle>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                         
                                    <?php endif; ?>
                                    <?php ($product->images = $product->images ? $product->images : ['no-image.png']); ?>
                                    <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide">
                                            <img src="<?php echo e(resize($image, 70, 70)); ?>" alt="<?php echo $product->title; ?>" />
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="productpage__image-image">
                            <div class="swiper" data-swiper-children="1" data-swiper-id="productpage">
                                <div class="swiper-wrapper">
                                    <?php if($product->video): ?>
                                        <div class="swiper-slide">
                                           
                                            <div class="youtubeblock"> 
                                                <button type="button" class="youtubeblock-button" data-youtube-button="<?php echo e($product->video); ?>">
                                                    <img src="https://img.youtube.com/vi/<?php echo e($product->video); ?>/maxresdefault.jpg" alt=".">
                                                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.8" d="M56.968 23.032C52.624 18.688 46.624 16 40 16C33.376 16 27.376 18.688 23.032 23.032C18.688 27.376 16 33.376 16 40C16 53.248 26.752 64 40 64C46.624 64 52.624 61.312 56.968 56.968C61.312 52.624 64 46.624 64 40C64 33.376 61.312 27.376 56.968 23.032ZM48.04 41.728L36.712 47.536C36.448 47.68 36.136 47.752 35.824 47.752C35.488 47.752 35.128 47.656 34.816 47.464C34.24 47.104 33.88 46.48 33.88 45.808V34.192C33.88 33.52 34.24 32.896 34.816 32.536C35.392 32.176 36.112 32.152 36.712 32.464L48.04 38.272C48.712 38.608 49.096 39.256 49.096 40C49.096 40.744 48.712 41.392 48.04 41.728Z" stroke="none"></path>
                                                        <circle cx="40" cy="40" r="31.5" stroke="#AD9575" fill="none"></circle>
                                                        <circle opacity="0.4" cx="40" cy="40" r="39.5" stroke="#AD9575" fill="none"></circle>
                                                    </svg>
                                                </button>
                                            </div>

                                        </div>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide">
                                            <img src="<?php echo e(resize($image, 690, 475)); ?>" alt="<?php echo $product->title; ?>" />
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div class="swiper-button-next">
                                <svg width="17" height="14">
                                    <use xlink:href="storage/image/sprite.svg#next"></use>
                                </svg>
                            </div>
                            <div class="swiper-button-prev">
                                <svg width="17" height="14">
                                    <use xlink:href="storage/image/sprite.svg#prev"></use>
                                </svg>
                            </div>
                            <div class="swiper-pagination swiper-pagination--pos" data-slider-pagination="productpage"></div>
                        </div>
                    </div>
                    <div class="productpage__info">
                        <div class="productpage__info-labels">
                            <div class="productcard__label">
                                <?php if($product->discount_group_id): ?>
                                    <button type="button" class="productcard__label-item productcard__label-item--skidka" x-on:click="Livewire.dispatch('showModal', {key: 'price-group', params: {discount_group_id: '<?php echo e($product->discount_group_id); ?>'}})">Скидка группа <?php echo e($product->discount_group_id); ?></button>
                                <?php endif; ?>
                                <?php if($product->labelNew()): ?>
                                    <span class="productcard__label-item productcard__label-item--new">Новинка</span>
                                <?php endif; ?>
                                <?php if($product->labelHit()): ?>
                                    <span class="productcard__label-item productcard__label-item--hit">Хит</span>
                                <?php endif; ?>

                            </div>
                            <span class="productpage__info-sku" x-on:click="$wire.dispatch('copyText', {text: '<?php echo e($product->article); ?>', message: 'Артикул товара успешно скопирован'})">
                                <svg width="16" height="16">
                                    <use xlink:href="storage/image/sprite.svg#copy"></use>
                                </svg>
                                <span>Артикул: <?php echo e($product->article); ?></span>
                            </span>
                        </div>
                        <h1 class="productpage__name"><?php echo $product->title; ?></h1>

                        <?php if(count($product->attributes) > 0): ?>
                            <div class="productpage__attribute">
                                <?php $__currentLoopData = $product->attributes->slice(0, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="productpage__attribute-item">
                                        <span class="productpage__attribute-name"><?php echo e($attribute->attribute->name); ?>:</span>
                                        <span class="productpage__attributes-description"><?php echo e($attribute->value); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="productpage__attribute-item">
                                    <button type="button" class="a scroll-attribute" title="посмотреть все характеристики">смотерть все</button>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="productpage__description">
                            <?php echo \Illuminate\Support\Str::limit($product->description, 300, $end='.. <button type="button" class="a scroll-description" title="читать полное описание">читать далее</button>'); ?>

                        </div>

                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('productCard', ['view' => 'product','product' => $product]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3781312784-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

                    </div>
                </div>


                <h2>Описание</h2>
                <div class="productpage__description scroll-to-description">
                    <?php echo $product->description; ?>

                </div>

                <?php if(count($product->attributes) > 0): ?>
                    <h2>Характеристики</h2>
                    <div class="productpage__attribute scroll-to-attribute">
                        <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="productpage__attribute-item">
                                <span class="productpage__attribute-name"><?php echo e($attribute->attribute->name); ?>:</span>
                                <span class="productpage__attributes-description"><?php echo e($attribute->value); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                

                

            </div>
        </div>
    </section>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('section.productTab', ['tabs' => ['related', 'new', 'hit'],'product' => $product]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3781312784-1', $__slots ?? [], get_defined_vars());

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

$__html = app('livewire')->mount($__name, $__params, 'lw-3781312784-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>

    <?php
        $__scriptKey = '0-2';
        ob_start();
    ?>
    <script>
        productCardImageHover()
        productCardCount()

        function scrollToPr(selector)
        {
            let element = document.querySelector(selector)
          
            window.scrollTo({
                top: (element.getBoundingClientRect().top + window.pageYOffset) - (document.querySelector('.header').offsetHeight),
                behavior: 'smooth'
            })
        }

        let attr1 = document.querySelector('.scroll-description')

        if (attr1) {
            attr1.onclick = function(event) {
                scrollToPr('.scroll-to-description')
            }
        }

        let attr2 = document.querySelector('.scroll-attribute')

        if (attr2) {
            attr2.onclick = function(event) {
                scrollToPr('.scroll-to-attribute')
            }
        }


        let youtubes = document.querySelectorAll('[data-youtube-button]')

        if (youtubes) {
            youtubes.forEach(youtube => {
                youtube.onclick = function() {
                    youtubeButton(youtube)
                }
            })
        }
 
        
    </script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?><?php /**PATH /var/www/resources/views/product.blade.php ENDPATH**/ ?>