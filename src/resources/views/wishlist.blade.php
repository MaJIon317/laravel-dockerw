<section class="section section--categorypage">
    <div class="container">
        @if(count($products) > 0)
            <div class="categorypage categorypage--grid">
                <!-- Product card -->
                @foreach ($products as $product)
                    <div class="categorypage__item">
                        <livewire:productCard :product="$product" />
                    </div>
                @endforeach
                <!-- Product card -->
            </div>
        @else
            <div class="alert alert--info">{!! __('wishlist.null') !!}</div>
        @endif

    </div>
</section>