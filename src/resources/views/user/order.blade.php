<div>

    <div class="account__item">
        <div class="account__item-item">
            <div class="account__item-body">

                <div class="accountorderinfo">
                    <div class="accountorderinfo__left">
                        <div class="accountorderinfo__items">
            
                            <div class="accountorderinfo__item">
                                @foreach($order->totals as $total)
                                    <div class="accountorderinfo__item-row">
                                        <span class="accountorderinfo__item-name">{{ __('order.total_' . $total->code) }}</span>
                                        <span class="accountorderinfo__item-value">{{ formatPrice($total->value, 'руб') }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
 
                        <h4 class="account__item-title">Доставка</h4>

                        <div class="accountorderinfo__items">
                            <div class="accountorderinfo__item">
                                @php
                                    $recipient = array();

                                    foreach (['inn', 'name'] as $field) {
                                        if (isset($order->{$field}) && !empty($order->{$field})) {
                                            $recipient[] = $order->{$field};
                                        }
                                    }

                                    $recipient = implode(', ', $recipient);
                                @endphp
                                @if($recipient)
                                    <div class="accountorderinfo__item-row">
                                        <span class="accountorderinfo__item-name">Получатель</span>
                                        <span class="accountorderinfo__item-value">{!! $recipient !!}</span>
                                    </div>
                                @endif
                                <div class="accountorderinfo__item-row">
                                    <span class="accountorderinfo__item-name">Телефон</span>
                                    <span class="accountorderinfo__item-value">{!! $order->phone !!}</span>
                                </div>
                                <div class="accountorderinfo__item-row">
                                    <span class="accountorderinfo__item-name">Почта</span>
                                    <span class="accountorderinfo__item-value">{!! $order->email !!}</span>
                                </div>
                                @php
                                    $recipient = array();

                                    foreach (['city', 'address'] as $field) {
                                        if (isset($order->{$field}) && !empty($order->{$field})) {
                                            $recipient[] = $order->{$field};
                                        }
                                    }

                                    $recipient = implode(', ', $recipient);
                                @endphp
                                @if($recipient)
                                    <div class="accountorderinfo__item-row">
                                        <span class="accountorderinfo__item-name">Адрес</span>
                                        <span class="accountorderinfo__item-value">{!! $recipient !!}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <h4 class="account__item-title">Заказанные товары</h4>

                        <div class="accountorderinfo__items">
                            <div class="accountorderinfo__item">
                                @foreach($order->products as $product)
                                    <div class="accountorderinfo__item-row">
                                        <a href="{{ route('product', $product->product->slug) }}" class="accountorderinfo__item-name" wire:navigate>{{ $product->product->title }} ({{ $product->quantity }} шт.)</a>
                                        <span class="accountorderinfo__item-value">{{ formatPrice($product->price) }}</span>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                    <div class="accountorderinfo__right">
                        <div class="accountorderinfo__status">
                            <h4 class="accountorderinfo__status-title">Статусы заказа</h4>
                            <div class="accountorderinfo__status-items">
                                @foreach(config('general.order_statuses') as $count => $order_status)
                                    <div class="accountorderinfo__status-item {{-- accountorderinfo__status-item--bg --}} @if($order_status == $order->status) accountorderinfo__status-item--active @endif">
                                        <span class="accountorderinfo__status-count">{{ $count + 1 }}</span>
                                        <span class="accountorderinfo__status-name">{{ __('order.status_' . $order_status) }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="accountorderinfo__buttons">
                            @if($order->status == 'new')
                                <button type="button" class="btn btn--sm btn--dark" wire:click="cancelOrder" wire:confirm="Вы действительно хотите отменить заказ?">Отменить</button>
                            @endif

                            <button type="button" class="btn btn--sm btn--white" wire:click="exportWithBarcodes">Заказ со штрихкодами</button>
                            <button type="button" class="btn btn--sm btn--white" wire:click="exportMissingProduct">Отсутствующие товары</button>
 
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>
