<div>
    @if ($carts->count() > 0)
        <section class="section section--top section--cartpage">
            <div class="container">
                <div class="cartpage">
                    <div class="cartpage__card">
                        @if($this->notCheckout->get('min_order'))
                            <div class="alert alert--danger">До минимальной суммы заказа не хватает <strong>{!! formatPrice($this->notCheckout->get('min_order'), 'руб.') !!}</strong></div>
                        @endif

                        @foreach($carts as $cart)
                            <!-- Cart item -->
                            <div class="cartpage__card-item">
                                <div class="cartpage__card-item_image">
                                    <a href="{{ route('product', $cart->product->slug) }}" class="cartpage__card-item_a" wire:navigate>
                                        <img src="{{ resize(Arr::first($cart->product->images), 110, 110) }}" alt="{{ $cart->product->title }}" class="cartpage__card-item_img">
                                    </a>
                                </div>
                                <div class="cartpage__card-item_data">
                                    <h4 class="cartpage__card-item_name">
                                        <a href="{{ route('product', $cart->product->slug) }}" wire:navigate>{{ $cart->product->title }}</a>
                                    </h4>
                                    <div class="cartpage__card-item_desc">Артикул: {{ $cart->product->article }}</div>
                                    <div class="cartpage__card-item_desc">На складе: {{ $cart->product->stock }} шт.</div>
                                    <div class="productcard__label cartpage__card-item_label">
                                        @if($cart->product->discount_group_id)
                                            <button type="button" class="productcard__label-item productcard__label-item--skidka" x-on:click="Livewire.dispatch('showModal', {key: 'price-group', params: {discount_group_id: '{{ $cart->product->discount_group_id }}'}})">Скидка группа {{ $cart->product->discount_group_id }}</button>
                                        @endif
                                        @if($cart->product->labelNew())
                                            <span class="productcard__label-item productcard__label-item--new">Новинка</span>
                                        @endif
                                        @if($cart->product->labelHit())
                                            <span class="productcard__label-item productcard__label-item--hit">Хит</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="cartpage__card-item_prices">
                                    <div class="cartpage__card-item_price">
                                        <div class="cartpage__price-title">Цена:</div>
                                        <div class="cartpage__price-data">
                                            @if(!empty((float)$cart->product->discount))
                                                <div class="cartpage__price-old">{!! formatPrice($cart->product->discount) !!}</div>
                                            @endif
                                            <div class="cartpage__price-new">{!! formatPrice($cart->product->price) !!}</div>
                                        </div>
                                    </div>
                                    <div class="cartpage__card-item_price cartpage__card-item_price--count">
                                        @if ($cart->product->minimum > 1)
                                            <div class="cartpage__price-title">Мин. партия: {{ $cart->product->minimum }}</div>
                                        @endif
                                        <div class="cartpage__price-data">
                                            <div class="productcard__count cartpage__price-count">
                                                <button type="button" class="productcard__count-action" data-type="-">-</button>
                                                <input type="number" wire:change="updateCart({{ $cart->id }}, $event.target.value)" name="quantity" min="{{ $cart->product->minimum }}" max="10000" step="{{ $cart->product->minimum }}" value="{{ $cart->quantity }}" class="productcard__count-count">
                                                <button type="button" class="productcard__count-action" data-type="+">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cartpage__card-item_price cartpage__card-item_price--total">
                                        <div class="cartpage__price-title">Итого:</div>
                                        <div class="cartpage__price-data">
                                            @if(!empty((float)$cart->product->discount))
                                                <div class="cartpage__price-old">{!! formatPrice($cart->product->discount * $cart->quantity) !!}</div>
                                            @endif
                                            <div class="cartpage__price-new">{!! formatPrice($cart->product->price * $cart->quantity) !!}</div>
                                        </div>
                                    </div>

                                    <div class="cartpage__card-buttons">
                                        <button type="button" class="cartpage__card-button cartpage__card-button--favorite{{ $wishlists->get($cart->product->id) ? ' active' : '' }}" wire:click="updateToWishlist({{ $cart->product->id }})">
                                            <svg width="19" height="18">
                                                <use xlink:href="storage/image/sprite.svg#wishlist" class="iconnotactive"></use>
                                                <use xlink:href="storage/image/sprite.svg#wishlist-active" class="iconactive"></use>
                                            </svg>
                                        </button>
                                        <button type="button" class="cartpage__card-button cartpage__card-button--trash" wire:click="removeCart({{ $cart->id }})">
                                            <svg width="15" height="18">
                                                <use xlink:href="storage/image/sprite.svg#remove"></use>
                                            </svg>
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <!-- End Cart item -->
                        @endforeach

                    </div>
                    <div class="cartpage__total">
                        
                        <div class="cartpage__total-item">
                            <div class="cartpage__total-title">Скидки по группам</div>
                            <div class="cartpage__total-data">
                                <div class="cartpage__scale">
                                    @foreach($discount_groups as $discount_group_id => $discount_group)
                                        <div class="cartpage__scale-item">
                                            <span class="cartpage__scale-title">{{ $discount_group_id }}</span>
                                            <span class="cartpage__scale-data">
                                                <span class="cartpage__scale-scale" style="width: {{ $discount_group['price'] / $discount_group['new_price'] * 100 }}%"></span>
                                                <span>{{ $discount_group['percent'] }}%</span>
                                                <span>{!! formatPrice($discount_group['price'], 'руб') !!} / {!! formatPrice($discount_group['new_price'], 'руб') !!}</span>
                                                <span>{{ $discount_group['new_percent'] }}%</span>
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="cartpage__total-item cartpage__total-item--db cartpage__total-item--sticky">
                            <div class="cartpage__total-title">Промокод</div>
                            <div class="cartpage__total-data">
                       
                                <div class="fields">
                                    <div class="field">
                                        <div class="field__block @if(isset($error['coupon']) && !empty($error['coupon'])) field__block--error @enderror">
                                            <input type="text" wire:input.live.debounce.500ms="updateCoupon($event.target.value)" name="coupon" placeholder="Введите промокод" value="{{ $coupon }}" class="field__input">
                                            <label class="field__label">Введите промокод</label>
                                            @if(isset($error['coupon']) && !empty($error['coupon']))
                                                <div class="field__error">
                                                    <span class="field__error-error">{{ $error['coupon'] }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <hr class="hr"></hr>
                                <div class="cartpage__total-title">Общая стоимость</div>
                                    
                                <div class="cartpage__total-variant">
                                    @foreach($totals as $key => $total)
                                        <div class="cartpage__total-variant_item cartpage__total-variant_item--{{ $key }}">
                                            <span class="cartpage__total-variant_name">{!! $total->name !!}</span>
                                            <span class="cartpage__total-variant_value">{!! $total->value !!}</span>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="cartpage__total-button">
                                    @if(count($this->notCheckout) > 0)
                                        @if($this->notCheckout->get('auth'))
                                            <button type="button" class="btn disabled" x-on:click="Livewire.dispatch('showModal', {key: 'login', params: {size: 'sm'}})">Перейти к оформлению</button>
                                        @else
                                            <button type="button" class="btn disabled">Перейти к оформлению</button>
                                        @endif
                                    @else
                                        <a href="{{ route('checkout') }}" class="btn" wire:navigate>Перейти к оформлению</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="section section--top section--cartnull">
            <div class="container">
                <div class="cartnull">
                    <div class="cartnull__icon">
                        <svg width="100" height="100">
                            <use xlink:href="storage/image/sprite.svg#cart"></use>
                        </svg>
                    </div>
                    <h1>Ваша корзина пока пустая... </h1>
                    <div class="cartnull__button">
                        <a href="{{ route('catalog') }}" class="btn btn--lg" wire:navigate>Начать покупки</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>

@script
    <script>
        productCardImageHover()
        productCardCount()
    </script>
@endscript