<div>
    <div class="productpage__price">
        @if(!empty((float)$product->discount))
            <div class="productpage__price-old">{!! formatPrice($product->discount) !!}</div>
        @endif
        <div class="productpage__price-new">{!! formatPrice($product->price) !!}</div>
    </div>
    
    <div class="productpage__button">
        @if ($cart->get('quantity'))
            <div class="productpage__button-item">
                <a href="{{ route('cart') }}" class="btn productpage__button-cart disabled" wire:navigate>В корзине {{ $cart->get('quantity') }} шт.</a>
            </div>
        @else
            <div class="productpage__button-item">
                @if($product->stock > 0)
                    <div class="productcard__count productpage__button-count">
                        @if ($product->minimum > 1)
                            <span class="productcard__partiya">Мин. партия: {{ $product->minimum }}</span>
                        @endif
                        <button type="button" class="productcard__count-action" data-type="-">-</button>
                        <input type="number" name="quantity" wire:model="quantity" min="{{ $product->minimum }}" max="{{ $product->stock }}" step="{{ $product->minimum }}" value="{{ $product->quantity }}" class="productcard__count-count">
                        <button type="button" class="productcard__count-action" data-type="+">+</button>
                    </div>
                    <button type="button" class="btn productpage__button-cart" wire:click="addToCart">Добавить в корзину</button>
                @else
                    <button type="button" class="btn productpage__button-cart disabled" disabled>Товар закончился</button>
                @endif
            </div>
        @endif  
        <div class="productpage__button-item">
            <button type="button" class="btn productpage__button-favorite{{ $wishlist ? ' active' : '' }}" wire:click="updateToWishlist">
                <svg width="20" height="20">
                    <use xlink:href="storage/image/sprite.svg#wishlist" class="iconnotactive"></use>
                    <use xlink:href="storage/image/sprite.svg#wishlist-active" class="iconactive"></use>
                </svg>
            </button>
        </div>
    </div>
</div>