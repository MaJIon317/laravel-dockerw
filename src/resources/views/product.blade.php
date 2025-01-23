<div>
    <section class="section section--productpage">
        <div class="container">
            <div class="productpage">
                <div class="productpage__data">
                    <div class="productpage__image">

                        <div class="productpage__image-thumb">
                            <div thumbsSlider="" class="swiper" data-swiper-parent="1" data-slider-design="productpage">
                                <div class="swiper-wrapper">
                                    @if($product->video)
                                        <div class="swiper-slide">
                                            <div class="youtubeblock"> 
                                                <button type="button" class="youtubeblock-button">
                                                    <img src="https://img.youtube.com/vi/{{ $product->video }}/default.jpg" alt=".">
                                                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.8" d="M56.968 23.032C52.624 18.688 46.624 16 40 16C33.376 16 27.376 18.688 23.032 23.032C18.688 27.376 16 33.376 16 40C16 53.248 26.752 64 40 64C46.624 64 52.624 61.312 56.968 56.968C61.312 52.624 64 46.624 64 40C64 33.376 61.312 27.376 56.968 23.032ZM48.04 41.728L36.712 47.536C36.448 47.68 36.136 47.752 35.824 47.752C35.488 47.752 35.128 47.656 34.816 47.464C34.24 47.104 33.88 46.48 33.88 45.808V34.192C33.88 33.52 34.24 32.896 34.816 32.536C35.392 32.176 36.112 32.152 36.712 32.464L48.04 38.272C48.712 38.608 49.096 39.256 49.096 40C49.096 40.744 48.712 41.392 48.04 41.728Z" stroke="none"></path>
                                                        <circle cx="40" cy="40" r="31.5" stroke="#AD9575" fill="none"></circle>
                                                        <circle opacity="0.4" cx="40" cy="40" r="39.5" stroke="#AD9575" fill="none"></circle>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                         
                                    @endif
                                    @php($product->images = $product->images ? $product->images : ['no-image.png'])
                                    @foreach ($product->images as $key => $image)
                                        <div class="swiper-slide">
                                            <img src="{{ resize($image, 70, 70) }}" alt="{!! $product->title !!}" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <div class="productpage__image-image">
                            <div class="swiper" data-swiper-children="1" data-swiper-id="productpage">
                                <div class="swiper-wrapper">
                                    @if($product->video)
                                        <div class="swiper-slide">
                                           
                                            <div class="youtubeblock"> 
                                                <button type="button" class="youtubeblock-button" data-youtube-button="{{ $product->video }}">
                                                    <img src="https://img.youtube.com/vi/{{ $product->video }}/maxresdefault.jpg" alt=".">
                                                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.8" d="M56.968 23.032C52.624 18.688 46.624 16 40 16C33.376 16 27.376 18.688 23.032 23.032C18.688 27.376 16 33.376 16 40C16 53.248 26.752 64 40 64C46.624 64 52.624 61.312 56.968 56.968C61.312 52.624 64 46.624 64 40C64 33.376 61.312 27.376 56.968 23.032ZM48.04 41.728L36.712 47.536C36.448 47.68 36.136 47.752 35.824 47.752C35.488 47.752 35.128 47.656 34.816 47.464C34.24 47.104 33.88 46.48 33.88 45.808V34.192C33.88 33.52 34.24 32.896 34.816 32.536C35.392 32.176 36.112 32.152 36.712 32.464L48.04 38.272C48.712 38.608 49.096 39.256 49.096 40C49.096 40.744 48.712 41.392 48.04 41.728Z" stroke="none"></path>
                                                        <circle cx="40" cy="40" r="31.5" stroke="#AD9575" fill="none"></circle>
                                                        <circle opacity="0.4" cx="40" cy="40" r="39.5" stroke="#AD9575" fill="none"></circle>
                                                    </svg>
                                                </button>
                                            </div>

                                        </div>
                                    @endif
                                    @foreach ($product->images as $key => $image)
                                        <div class="swiper-slide">
                                            <img src="{{ resize($image, 690, 475) }}" alt="{!! $product->title !!}" />
                                        </div>
                                    @endforeach
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
                                @if($product->discount_group_id)
                                    <button type="button" class="productcard__label-item productcard__label-item--skidka" x-on:click="Livewire.dispatch('showModal', {key: 'price-group', params: {discount_group_id: '{{ $product->discount_group_id }}'}})">Скидка группа {{ $product->discount_group_id }}</button>
                                @endif
                                @if($product->labelNew())
                                    <span class="productcard__label-item productcard__label-item--new">Новинка</span>
                                @endif
                                @if($product->labelHit())
                                    <span class="productcard__label-item productcard__label-item--hit">Хит</span>
                                @endif

                            </div>
                            <span class="productpage__info-sku" x-on:click="$wire.dispatch('copyText', {text: '{{ $product->article }}', message: 'Артикул товара успешно скопирован'})">
                                <svg width="16" height="16">
                                    <use xlink:href="storage/image/sprite.svg#copy"></use>
                                </svg>
                                <span>Артикул: {{ $product->article }}</span>
                            </span>
                        </div>
                        <h1 class="productpage__name">{!! $product->title !!}</h1>

                        @if (count($product->attributes) > 0)
                            <div class="productpage__attribute">
                                @foreach($product->attributes->slice(0, 3) as $attribute)
                                    <div class="productpage__attribute-item">
                                        <span class="productpage__attribute-name">{{ $attribute->attribute->name }}:</span>
                                        <span class="productpage__attributes-description">{{ $attribute->value }}</span>
                                    </div>
                                @endforeach
                                <div class="productpage__attribute-item">
                                    <button type="button" class="a scroll-attribute" title="посмотреть все характеристики">смотерть все</button>
                                </div>
                            </div>
                        @endif

                        <div class="productpage__description">
                            {!! \Illuminate\Support\Str::limit($product->description, 300, $end='.. <button type="button" class="a scroll-description" title="читать полное описание">читать далее</button>') !!}
                        </div>

                        <livewire:productCard view="product" :product="$product" />

                    </div>
                </div>


                <h2>Описание</h2>
                <div class="productpage__description scroll-to-description">
                    {!! $product->description !!}
                </div>

                @if (count($product->attributes) > 0)
                    <h2>Характеристики</h2>
                    <div class="productpage__attribute scroll-to-attribute">
                        @foreach($product->attributes as $attribute)
                            <div class="productpage__attribute-item">
                                <span class="productpage__attribute-name">{{ $attribute->attribute->name }}:</span>
                                <span class="productpage__attributes-description">{{ $attribute->value }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
                

                {{--
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
                --}}

            </div>
        </div>
    </section>

    <livewire:section.productTab :tabs="['related', 'new', 'hit']" :$product />
    
    <livewire:section.feedback code="collback" senturl="{{ url()->current() }}" />
</div>

@script
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
@endscript