<div>
    <div class="popup__header">
        <div class="popup__header-title">
            <span>Ценовые группы товаров</span>
        </div>

        <div class="popup__header-title">
            <div class="popup__header-title">
                @foreach($discount_groups as $key => $value)
                    <button type="button" class="popup__header-btn @if($discount_group_id === $key) active @endif" x-on:click="Livewire.dispatch('showModal', {key: 'price-group', params: {discount_group_id: '{{ $key }}'}})">Группа {{ $key }}</button>
                @endforeach
            </div>
        </div>
    </div>

    <div class="popup__body">
        @if ($discount_group_value['percent'] != $discount_group_value['new_percent'])
            <div class="alert alert--info">Текущая Ваша скидка <strong>{{ $discount_group_value['percent'] }}%</strong>, добавьте товаров на сумму <strong>{!! formatPrice($discount_group_value['new_price'] - $discount_group_value['price'], 'руб') !!}</strong> для активации скидки <strong>{{ $discount_group_value['new_percent'] }}%</strong></div>
        @endif
        
        <div class="skidkainfo">
            @foreach($discount_group as $amout => $percent)
                <div class="skidkainfo__item @if($discount_group_value['percent'] == $percent) active @endif">
                    <span>{{ $percent }}%</span>
                    <span>от {!! formatPrice($amout, 'руб') !!}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
