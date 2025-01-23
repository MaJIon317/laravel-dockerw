<div class="productcard">
    <div class="productcard__image">
        <a href="{{ route('product', $product->slug) }}" class="productcard__image-a" wire:navigate>
            @if($product->images && count($product->images) > 1)
                <span class="productcard__image-span">
                    @foreach ($product->images as $key => $image)
                        <span data-productcard-image="{{ resize($image, 308, 280) }}"@if(!$key) class="active"@endif></span>
                    @endforeach
                </span>
            @endif
            <img src="{{ resize(Arr::first($product->images), 308, 280) }}" alt="{!! $product->title !!}" class="productcard__image-img">
        </a>

        <div class="productcard__action">
            <button type="button" class="productcard__action-item productcard__action-item--wishlist{{ $wishlist ? ' active' : '' }}" wire:click="updateToWishlist">
                <svg width="22" height="22">
                    <use xlink:href="storage/image/sprite.svg#wishlist" class="iconnotactive"></use>
                    <use xlink:href="storage/image/sprite.svg#wishlist-active" class="iconactive"></use>
                </svg>
            </button>
        </div>
    </div>
    <div class="productcard__data">
        <div class="productcard__data-item">
            @if(!empty($product->marketplace))
                <div class="productcard__marketplace">
                    @foreach($product->marketplace as $key => $marketplace)
                        <a href="{{ $marketplace }}" target="_blank" rel="nofollow,sponsored" class="productcard__marketplace-item">
                            <svg width="28" height="28">
                                <use xlink:href="storage/image/sprite.svg#{{ $key }}"></use>
                            </svg>
                        </a>
                    @endforeach
                </div>
            @endif

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
 
                @if($product->video)
                    <a href="https://www.youtube.com/watch?v={{ $product->video }}" target="_blank" rel="nofollow" class="productcard__action-item productcard__action-item--yootube productcard__label-item--yootube">
                        <svg width="30" height="20">
                            <use xlink:href="storage/image/sprite.svg#youtube"></use>
                        </svg>
                    </a>
                @endif
            </div>
            <a href="{{ route('product', $product->slug) }}" class="productcard__name" wire:navigate>{!! $product->title !!}</a>
            <div class="productcard__attribute">
                <div class="productcard__attribute-item">
                    <span class="productcard__attribute-name">Артикул:</span>
                    <span class="a" x-on:click="$wire.dispatch('copyText', {text: '{{ $product->article }}', message: 'Артикул товара успешно скопирован'})">{{ $product->article }}</span>
                </div>
                <div class="productcard__attribute-item">
                    <div class="productcard__attribute-description">
                        {!! \Illuminate\Support\Str::limit($product->description, 110, $end='...') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="productcard__data-item">
            <div class="productcard__price">
                @if(!empty((float)$product->discount))
                    <div class="productcard__price-old">{!! formatPrice($product->discount) !!}</div>
                @endif
                <div class="productcard__price-new">{!! formatPrice($product->price) !!}</div>
            </div>
            <div class="productcard__button">
                @if ($cart->get('quantity'))
                    <a href="{{ route('cart') }}" class="btn productcard__button-cart productcard__button-item disabled" wire:navigate>В корзине {{ $cart->get('quantity') }} шт.</a>
                @else
                    @if($product->stock > 0)
                        <div class="productcard__count productcard__button-item">
                            @if ($product->minimum > 1)
                                <span class="productcard__partiya">Мин. партия: {{ $product->minimum }}</span>
                            @endif
                            <button type="button" class="productcard__count-action" data-type="-">-</button>
                            <input type="number" name="quantity" wire:model="quantity" min="{{ $product->minimum }}" max="{{ $product->stock }}" step="{{ $product->minimum }}" value="{{ $product->quantity }}" class="productcard__count-count">
                            <button type="button" class="productcard__count-action" data-type="+">+</button>
                        </div>
                        <button type="button" class="btn productcard__button-cart productcard__button-item" wire:click="addToCart">В корзину</button>
                    @else
                        <button type="button" class="btn productcard__button-cart productcard__button-item disabled" disabled>Товар закончился</button>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>

@script
    <script>
        productCardImageHover()
        productCardCount()
    </script>
@endscript