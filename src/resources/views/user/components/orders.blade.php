<div>
    @if($orders && count($orders) > 0)    
        <div class="accountorder">
            @foreach($orders as $order)

                <livewire:user.components.order :$order key="{{ $order->id }}" />

            @endforeach
        </div>
    @else 
    <div class="alert alert--danger">Не удалось найти заказы</div>
    @endif
 
</div>

 
