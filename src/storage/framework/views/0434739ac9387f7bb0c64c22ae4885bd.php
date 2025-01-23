<div>
    <section class="section section--product section--bg">
        <div class="container">

            <div class="section__title">
                <div class="section__title-item">
                    <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h2 class="section__title-h <?php if($tab_active == $tab): ?> active <?php endif; ?>" <?php if($tab_active != $tab): ?> wire:click="select('<?php echo e($tab); ?>')" <?php endif; ?>><?php echo e(__('catalog.' . $tab)); ?></h2>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="section__title-item">
                    <?php if($all_url): ?>
                        <a href="<?php echo e($all_url); ?>" class="btn section__title-link" wire:navigate>Посмотреть все</a>
                    <?php endif; ?>
                    <div class="section__title-buttons">
                        <div class="swiper-button-prev swiper-button--pos" data-slider-prev="tab<?php echo e($tab_active); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1732 7.00003C16.1732 6.73484 16.0679 6.48052 15.8804 6.293C15.6929 6.10549 15.4385 6.00014 15.1734 6.00014H3.58865L7.88217 1.70862C8.06993 1.52086 8.17541 1.26622 8.17541 1.00069C8.17541 0.735173 8.06993 0.480526 7.88217 0.292773C7.69442 0.105021 7.43978 -0.000457764 7.17425 -0.000457764C6.90873 -0.000457764 6.65409 0.105021 6.46633 0.292773L0.467002 6.29211C0.373886 6.38499 0.30001 6.49533 0.249602 6.6168C0.199195 6.73828 0.173248 6.86851 0.173248 7.00003C0.173248 7.13155 0.199195 7.26178 0.249602 7.38325C0.30001 7.50473 0.373886 7.61507 0.467002 7.70795L6.46633 13.7073C6.65409 13.895 6.90873 14.0005 7.17425 14.0005C7.43978 14.0005 7.69442 13.895 7.88217 13.7073C8.06993 13.5195 8.17541 13.2649 8.17541 12.9994C8.17541 12.7338 8.06993 12.4792 7.88217 12.2914L3.58865 7.99992H15.1734C15.4385 7.99992 15.6929 7.89457 15.8804 7.70706C16.0679 7.51954 16.1732 7.26522 16.1732 7.00003Z" stroke="none"/>
                            </svg>
                        </div>
                        <div class="swiper-button-next swiper-button--pos" data-slider-next="tab<?php echo e($tab_active); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.82666 7.00003C0.82666 6.73484 0.932005 6.48052 1.11952 6.293C1.30704 6.10549 1.56136 6.00014 1.82655 6.00014H13.4113L9.11773 1.70862C8.92998 1.52086 8.8245 1.26622 8.8245 1.00069C8.8245 0.735173 8.92998 0.480526 9.11773 0.292773C9.30549 0.105021 9.56013 -0.000457764 9.82565 -0.000457764C10.0912 -0.000457764 10.3458 0.105021 10.5336 0.292773L16.5329 6.29211C16.626 6.38499 16.6999 6.49533 16.7503 6.61681C16.8007 6.73828 16.8267 6.86851 16.8267 7.00003C16.8267 7.13155 16.8007 7.26178 16.7503 7.38325C16.6999 7.50473 16.626 7.61507 16.5329 7.70795L10.5336 13.7073C10.3458 13.895 10.0912 14.0005 9.82565 14.0005C9.56013 14.0005 9.30549 13.895 9.11773 13.7073C8.92998 13.5195 8.8245 13.2649 8.8245 12.9994C8.8245 12.7338 8.92998 12.4792 9.11773 12.2914L13.4113 7.99992H1.82655C1.56136 7.99992 1.30704 7.89457 1.11952 7.70706C0.932005 7.51954 0.82666 7.26522 0.82666 7.00003Z" stroke="none"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <?php if($products && count($products) > 0): ?>
                <div class="swiper-section sectionproduct">
                    <div class="swiper" data-slider-design="sectionproduct" data-slider-id="tab<?php echo e($tab_active); ?>">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <div class="productcard" wire:key="<?php echo e('productcard-tab-' . $tab_active . $product->id); ?>">
                                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('productCard', ['product' => $product]);

$__html = app('livewire')->mount($__name, $__params, ''.e('productcard-tab-' . $tab_active . $product->id).'', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                    </div>                  
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

</div>

    <?php
        $__scriptKey = '0-10';
        ob_start();
    ?>
    <script>
        productCardImageHover()
        productCardCount()
    </script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?><?php /**PATH /var/www/resources/views/components/section/product-tab.blade.php ENDPATH**/ ?>