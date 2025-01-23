<div class="productcard">
    <div class="productcard__image">
        <a href="<?php echo e(route('product', $product->slug)); ?>" class="productcard__image-a" wire:navigate>
            <?php if($product->images && count($product->images) > 1): ?>
                <span class="productcard__image-span">
                    <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span data-productcard-image="<?php echo e(resize($image, 308, 280)); ?>"<?php if(!$key): ?> class="active"<?php endif; ?>></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </span>
            <?php endif; ?>
            <img src="<?php echo e(resize(Arr::first($product->images), 308, 280)); ?>" alt="<?php echo $product->title; ?>" class="productcard__image-img">
        </a>

        <div class="productcard__action">
            <button type="button" class="productcard__action-item productcard__action-item--wishlist<?php echo e($wishlist ? ' active' : ''); ?>" wire:click="updateToWishlist">
                <svg width="22" height="22">
                    <use xlink:href="storage/image/sprite.svg#wishlist" class="iconnotactive"></use>
                    <use xlink:href="storage/image/sprite.svg#wishlist-active" class="iconactive"></use>
                </svg>
            </button>
        </div>
    </div>
    <div class="productcard__data">
        <div class="productcard__data-item">
            <?php if(!empty($product->marketplace)): ?>
                <div class="productcard__marketplace">
                    <?php $__currentLoopData = $product->marketplace; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $marketplace): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($marketplace); ?>" target="_blank" rel="nofollow,sponsored" class="productcard__marketplace-item">
                            <svg width="28" height="28">
                                <use xlink:href="storage/image/sprite.svg#<?php echo e($key); ?>"></use>
                            </svg>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

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
 
                <?php if($product->video): ?>
                    <a href="https://www.youtube.com/watch?v=<?php echo e($product->video); ?>" target="_blank" rel="nofollow" class="productcard__action-item productcard__action-item--yootube productcard__label-item--yootube">
                        <svg width="30" height="20">
                            <use xlink:href="storage/image/sprite.svg#youtube"></use>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
            <a href="<?php echo e(route('product', $product->slug)); ?>" class="productcard__name" wire:navigate><?php echo $product->title; ?></a>
            <div class="productcard__attribute">
                <div class="productcard__attribute-item">
                    <span class="productcard__attribute-name">Артикул:</span>
                    <span class="a" x-on:click="$wire.dispatch('copyText', {text: '<?php echo e($product->article); ?>', message: 'Артикул товара успешно скопирован'})"><?php echo e($product->article); ?></span>
                </div>
                <div class="productcard__attribute-item">
                    <div class="productcard__attribute-description">
                        <?php echo \Illuminate\Support\Str::limit($product->description, 110, $end='...'); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="productcard__data-item">
            <div class="productcard__price">
                <?php if(!empty((float)$product->discount)): ?>
                    <div class="productcard__price-old"><?php echo formatPrice($product->discount); ?></div>
                <?php endif; ?>
                <div class="productcard__price-new"><?php echo formatPrice($product->price); ?></div>
            </div>
            <div class="productcard__button">
                <?php if($cart->get('quantity')): ?>
                    <a href="<?php echo e(route('cart')); ?>" class="btn productcard__button-cart productcard__button-item disabled" wire:navigate>В корзине <?php echo e($cart->get('quantity')); ?> шт.</a>
                <?php else: ?>
                    <?php if($product->stock > 0): ?>
                        <div class="productcard__count productcard__button-item">
                            <?php if($product->minimum > 1): ?>
                                <span class="productcard__partiya">Мин. партия: <?php echo e($product->minimum); ?></span>
                            <?php endif; ?>
                            <button type="button" class="productcard__count-action" data-type="-">-</button>
                            <input type="number" name="quantity" wire:model="quantity" min="<?php echo e($product->minimum); ?>" max="<?php echo e($product->stock); ?>" step="<?php echo e($product->minimum); ?>" value="<?php echo e($product->quantity); ?>" class="productcard__count-count">
                            <button type="button" class="productcard__count-action" data-type="+">+</button>
                        </div>
                        <button type="button" class="btn productcard__button-cart productcard__button-item" wire:click="addToCart">В корзину</button>
                    <?php else: ?>
                        <button type="button" class="btn productcard__button-cart productcard__button-item disabled" disabled>Товар закончился</button>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

    <?php
        $__scriptKey = '0-12';
        ob_start();
    ?>
    <script>
        productCardImageHover()
        productCardCount()
    </script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?><?php /**PATH /var/www/resources/views/components/productcard/default.blade.php ENDPATH**/ ?>