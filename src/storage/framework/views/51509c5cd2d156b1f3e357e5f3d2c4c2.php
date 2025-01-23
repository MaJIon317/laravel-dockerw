<div id="popup-webdement">
    <?php if($key): ?>
        <div class="popup popup--<?php echo e($params['size'] ?? ''); ?>">
            <div class="popup__block">
                <div class="popup__overlay" wire:click="dispatch('resetModal')"></div>
                <div class="popup__data">
                    <button type="button" class="popup__close" wire:click="dispatch('resetModal')">
                        <svg width="20" height="20">
                            <use xlink:href="storage/image/sprite.svg#close"></use>
                        </svg>
                    </button>

                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('modals.' . $key, $params);

$__html = app('livewire')->mount($__name, $__params, $key . md5(serialize($params) . strtotime('now')), $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div> <?php /**PATH /var/www/resources/views/components/modals.blade.php ENDPATH**/ ?>