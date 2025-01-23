<div id="popup-webdement">
    @if($key)
        <div class="popup popup--{{ $params['size'] ?? '' }}">
            <div class="popup__block">
                <div class="popup__overlay" wire:click="dispatch('resetModal')"></div>
                <div class="popup__data">
                    <button type="button" class="popup__close" wire:click="dispatch('resetModal')">
                        <svg width="20" height="20">
                            <use xlink:href="storage/image/sprite.svg#close"></use>
                        </svg>
                    </button>

                    @livewire('modals.' . $key, $params, key($key . md5(serialize($params) . strtotime('now'))))
                </div>
            </div>
        </div>
    @endif
</div> 