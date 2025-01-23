<div>
    <?php if(count($faqs) > 0): ?>
        <section class="section section--faq">
            <div class="container">
                <div class="section__title sectionpromotion__title">
                    <div class="section__title-item">
                        <h2 class="section__title-title">Частые вопросы</h2>
                    </div>
                </div>
                
                <?php
                    $faqs = $faqs->split(ceil($faqs->count() / 2));
                ?>
            
                <div class="faq">
                    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="faq__items">
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="faq__item">
                                    <div class="faq__block">
                                        <h4 class="faq__title">
                                            <span><?php echo e($faq->question); ?></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9">
                                                <path d="M1 0.748413L8.5 8.24841L16 0.748413" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </h4>
                                        <div class="faq__desc"><?php echo $faq->answer; ?></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                </div>

            </div>
        </section>
    <?php endif; ?>
</div>

    <?php
        $__scriptKey = '0-7';
        ob_start();
    ?>
<script>
    let faqs = document.querySelectorAll('.faq__title')

    if (faqs) {
        faqs.forEach((faq) => {
            faq.onclick = function(event) {
                event.target.parentNode.classList.toggle('active')
            }
        });
    }
</script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?><?php /**PATH /var/www/resources/views/components/section/faqs.blade.php ENDPATH**/ ?>