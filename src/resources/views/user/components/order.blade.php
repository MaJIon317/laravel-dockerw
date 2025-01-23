<div>

    @if($order)
        <div class="accountorder__item">
            <div class="accountorder__item-item accountorder__item-item--number">
                <a href="{{ route('dashboard.order.info', $order->id) }}" wire:navigate>{{  __('order.title', [
                'order_id' => $order->id, 
                'created_at' => $order->created_at->format('d-m-y H:i')
            ]) }}</a>
            </div>
            <div class="accountorder__item-item accountorder__item-item--status">
                <div class="accountorder__document">
                    <div class="accountorder__document-icon">
                        <svg width="16" height="16">
                            <use xlink:href="storage/image/sprite.svg#download"></use>
                        </svg>
                    </div>
                    <div class="accountorder__document-items">
                        <div class="accountorder__document-item">
                            <button type="button" wire:click="exportWithBarcodes" class="a">Заказ со штрихкодами</button>
                        </div>
                        <div class="accountorder__document-item">
                            <button type="button" wire:click="exportMissingProduct" class="a">Отсутствующие товары</button>
                        </div>
                    </div>
                </div>
                <span class="statustext statustext--{{ $order->status }}">{{ __('order.status_' . $order->status) }}</span>
            </div>

            @php
                $recipient = array();

                foreach (['city', 'address'] as $field) {
                    if (isset($order->{$field})) {
                        $recipient[] = $order->{$field};
                    }
                }

                $recipient = implode(', ', $recipient);
            @endphp

            <div class="accountorder__item-item accountorder__item-item--address">
                <div class="accountorder__item-item_title">Доставка</div>
                <div class="accountorder__item-item_desc">{!! $recipient !!}</div>
            </div>
            <div class="accountorder__item-item accountorder__item-item--product">
                <div class="accountorder__item-item_title">Товаров в заказе</div>
                <div class="accountorder__item-item_desc">{{ $order->products->count() }} шт. на сумму {{ formatPrice($order->total, 'руб') }}</div>
            </div>
            <div class="accountorder__item-item accountorder__item-item--repeat">
                <button type="button" class="btn btn--white btn--sm w-100" wire:click="repeat({{ $order->id }})">
                    <svg width="16" height="16">
                        <use xlink:href="storage/image/sprite.svg#repeat"></use>
                    </svg>
                    <span>Повторить</span>
                </button>
            </div>
        </div>
    @endif
</div>
