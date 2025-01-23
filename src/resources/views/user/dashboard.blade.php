<div>

    <div class="account__item">
        <div class="account__item-item">
            <h4 class="account__item-title">Последние заказы</h4>
            <div class="account__item-body">
                <livewire:user.components.orders :paginate="false" :limit="3" />
            </div>
        </div>
    </div>

</div>
