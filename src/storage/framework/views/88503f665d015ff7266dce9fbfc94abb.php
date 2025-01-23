<div>
    <div class="productpage__price">
        <?php if(!empty((float)$product->discount)): ?>
            <div class="productpage__price-old"><?php echo formatPrice($product->discount); ?></div>
        <?php endif; ?>
        <div class="productpage__price-new"><?php echo formatPrice($product->price); ?></div>
    </div>
    
    <div class="productpage__button">
        <?php if($cart->get('quantity')): ?>
            <div class="productpage__button-item">
                <a href="<?php echo e(route('cart')); ?>" class="btn productpage__button-cart disabled" wire:navigate>В корзине <?php echo e($cart->get('quantity')); ?> шт.</a>
            </div>
        <?php else: ?>
            <div class="productpage__button-item">
                <?php if($product->stock > 0): ?>
                    <div class="productcard__count productpage__button-count">
                        <?php if($product->minimum > 1): ?>
                            <span class="productcard__partiya">Мин. партия: <?php echo e($product->minimum); ?></span>
                        <?php endif; ?>
                        <button type="button" class="productcard__count-action" data-type="-">-</button>
                        <input type="number" name="quantity" wire:model="quantity" min="<?php echo e($product->minimum); ?>" max="<?php echo e($product->stock); ?>" step="<?php echo e($product->minimum); ?>" value="<?php echo e($product->quantity); ?>" class="productcard__count-count">
                        <button type="button" class="productcard__count-action" data-type="+">+</button>
                    </div>
                    <button type="button" class="btn productpage__button-cart" wire:click="addToCart">Добавить в корзину</button>
                <?php else: ?>
                    <button type="button" class="btn productpage__button-cart disabled" disabled>Товар закончился</button>
                <?php endif; ?>
            </div>
        <?php endif; ?>  
        <div class="productpage__button-item">
            <button type="button" class="btn productpage__button-favorite<?php echo e($wishlist ? ' active' : ''); ?>" wire:click="updateToWishlist">
                <svg width="20" height="20">
                    <use xlink:href="storage/image/sprite.svg#wishlist" class="iconnotactive"></use>
                    <use xlink:href="storage/image/sprite.svg#wishlist-active" class="iconactive"></use>
                </svg>
            </button>
        </div>
    </div>
</div><?php /**PATH /var/www/resources/views/components/productcard/product.blade.php ENDPATH**/ ?>