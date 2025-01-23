<div>
    <?php if($carts->count() > 0): ?>
        <section class="section section--top section--cartpage">
            <div class="container">
                <div class="cartpage">
                    <div class="cartpage__card">
                        <?php if($this->notCheckout->get('min_order')): ?>
                            <div class="alert alert--danger">До минимальной суммы заказа не хватает <strong><?php echo formatPrice($this->notCheckout->get('min_order'), 'руб.'); ?></strong></div>
                        <?php endif; ?>

                        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- Cart item -->
                            <div class="cartpage__card-item">
                                <div class="cartpage__card-item_image">
                                    <a href="<?php echo e(route('product', $cart->product->slug)); ?>" class="cartpage__card-item_a" wire:navigate>
                                        <img src="<?php echo e(resize(Arr::first($cart->product->images), 110, 110)); ?>" alt="<?php echo e($cart->product->title); ?>" class="cartpage__card-item_img">
                                    </a>
                                </div>
                                <div class="cartpage__card-item_data">
                                    <h4 class="cartpage__card-item_name">
                                        <a href="<?php echo e(route('product', $cart->product->slug)); ?>" wire:navigate><?php echo e($cart->product->title); ?></a>
                                    </h4>
                                    <div class="cartpage__card-item_desc">Артикул: <?php echo e($cart->product->article); ?></div>
                                    <div class="cartpage__card-item_desc">На складе: <?php echo e($cart->product->stock); ?> шт.</div>
                                    <div class="productcard__label cartpage__card-item_label">
                                        <?php if($cart->product->discount_group_id): ?>
                                            <button type="button" class="productcard__label-item productcard__label-item--skidka" x-on:click="Livewire.dispatch('showModal', {key: 'price-group', params: {discount_group_id: '<?php echo e($cart->product->discount_group_id); ?>'}})">Скидка группа <?php echo e($cart->product->discount_group_id); ?></button>
                                        <?php endif; ?>
                                        <?php if($cart->product->labelNew()): ?>
                                            <span class="productcard__label-item productcard__label-item--new">Новинка</span>
                                        <?php endif; ?>
                                        <?php if($cart->product->labelHit()): ?>
                                            <span class="productcard__label-item productcard__label-item--hit">Хит</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="cartpage__card-item_prices">
                                    <div class="cartpage__card-item_price">
                                        <div class="cartpage__price-title">Цена:</div>
                                        <div class="cartpage__price-data">
                                            <?php if(!empty((float)$cart->product->discount)): ?>
                                                <div class="cartpage__price-old"><?php echo formatPrice($cart->product->discount); ?></div>
                                            <?php endif; ?>
                                            <div class="cartpage__price-new"><?php echo formatPrice($cart->product->price); ?></div>
                                        </div>
                                    </div>
                                    <div class="cartpage__card-item_price cartpage__card-item_price--count">
                                        <?php if($cart->product->minimum > 1): ?>
                                            <div class="cartpage__price-title">Мин. партия: <?php echo e($cart->product->minimum); ?></div>
                                        <?php endif; ?>
                                        <div class="cartpage__price-data">
                                            <div class="productcard__count cartpage__price-count">
                                                <button type="button" class="productcard__count-action" data-type="-">-</button>
                                                <input type="number" wire:change="updateCart(<?php echo e($cart->id); ?>, $event.target.value)" name="quantity" min="<?php echo e($cart->product->minimum); ?>" max="10000" step="<?php echo e($cart->product->minimum); ?>" value="<?php echo e($cart->quantity); ?>" class="productcard__count-count">
                                                <button type="button" class="productcard__count-action" data-type="+">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cartpage__card-item_price cartpage__card-item_price--total">
                                        <div class="cartpage__price-title">Итого:</div>
                                        <div class="cartpage__price-data">
                                            <?php if(!empty((float)$cart->product->discount)): ?>
                                                <div class="cartpage__price-old"><?php echo formatPrice($cart->product->discount * $cart->quantity); ?></div>
                                            <?php endif; ?>
                                            <div class="cartpage__price-new"><?php echo formatPrice($cart->product->price * $cart->quantity); ?></div>
                                        </div>
                                    </div>

                                    <div class="cartpage__card-buttons">
                                        <button type="button" class="cartpage__card-button cartpage__card-button--favorite<?php echo e($wishlists->get($cart->product->id) ? ' active' : ''); ?>" wire:click="updateToWishlist(<?php echo e($cart->product->id); ?>)">
                                            <svg width="19" height="18">
                                                <use xlink:href="storage/image/sprite.svg#wishlist" class="iconnotactive"></use>
                                                <use xlink:href="storage/image/sprite.svg#wishlist-active" class="iconactive"></use>
                                            </svg>
                                        </button>
                                        <button type="button" class="cartpage__card-button cartpage__card-button--trash" wire:click="removeCart(<?php echo e($cart->id); ?>)">
                                            <svg width="15" height="18">
                                                <use xlink:href="storage/image/sprite.svg#remove"></use>
                                            </svg>
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <!-- End Cart item -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <div class="cartpage__total">
                        
                        <div class="cartpage__total-item">
                            <div class="cartpage__total-title">Скидки по группам</div>
                            <div class="cartpage__total-data">
                                <div class="cartpage__scale">
                                    <?php $__currentLoopData = $discount_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount_group_id => $discount_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="cartpage__scale-item">
                                            <span class="cartpage__scale-title"><?php echo e($discount_group_id); ?></span>
                                            <span class="cartpage__scale-data">
                                                <span class="cartpage__scale-scale" style="width: <?php echo e($discount_group['price'] / $discount_group['new_price'] * 100); ?>%"></span>
                                                <span><?php echo e($discount_group['percent']); ?>%</span>
                                                <span><?php echo formatPrice($discount_group['price'], 'руб'); ?> / <?php echo formatPrice($discount_group['new_price'], 'руб'); ?></span>
                                                <span><?php echo e($discount_group['new_percent']); ?>%</span>
                                            </span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="cartpage__total-item cartpage__total-item--db cartpage__total-item--sticky">
                            <div class="cartpage__total-title">Промокод</div>
                            <div class="cartpage__total-data">
                       
                                <div class="fields">
                                    <div class="field">
                                        <div class="field__block <?php if(isset($error['coupon']) && !empty($error['coupon'])): ?> field__block--error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <input type="text" wire:input.live.debounce.500ms="updateCoupon($event.target.value)" name="coupon" placeholder="Введите промокод" value="<?php echo e($coupon); ?>" class="field__input">
                                            <label class="field__label">Введите промокод</label>
                                            <?php if(isset($error['coupon']) && !empty($error['coupon'])): ?>
                                                <div class="field__error">
                                                    <span class="field__error-error"><?php echo e($error['coupon']); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <hr class="hr"></hr>
                                <div class="cartpage__total-title">Общая стоимость</div>
                                    
                                <div class="cartpage__total-variant">
                                    <?php $__currentLoopData = $totals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="cartpage__total-variant_item cartpage__total-variant_item--<?php echo e($key); ?>">
                                            <span class="cartpage__total-variant_name"><?php echo $total->name; ?></span>
                                            <span class="cartpage__total-variant_value"><?php echo $total->value; ?></span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="cartpage__total-button">
                                    <?php if(count($this->notCheckout) > 0): ?>
                                        <?php if($this->notCheckout->get('auth')): ?>
                                            <button type="button" class="btn disabled" x-on:click="Livewire.dispatch('showModal', {key: 'login', params: {size: 'sm'}})">Перейти к оформлению</button>
                                        <?php else: ?>
                                            <button type="button" class="btn disabled">Перейти к оформлению</button>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('checkout')); ?>" class="btn" wire:navigate>Перейти к оформлению</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
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
                        <a href="<?php echo e(route('catalog')); ?>" class="btn btn--lg" wire:navigate>Начать покупки</a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>

    <?php
        $__scriptKey = '0-4';
        ob_start();
    ?>
    <script>
        productCardImageHover()
        productCardCount()
    </script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?><?php /**PATH /var/www/resources/views/cart/cart.blade.php ENDPATH**/ ?>