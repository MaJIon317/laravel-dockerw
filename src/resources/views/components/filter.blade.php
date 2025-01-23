<div>
    
    @if($filteres && count($filteres) > 0)
        <form class="sorts" id="filters" wire:submit>
            <div class="sort">
                @foreach ($filteres as $filtere)
                    {!! $filtere->render() !!}
                @endforeach
            </div>
        </form>
    @endif
 
    <div class="productlistered">
        @if($products && count($products) > 0)
            <div class="categorypage categorypage--{{ session()->get('card-view') }}">
                @foreach ($products as $product)
                    <div class="categorypage__item" wire:key="{{ 'category.' . $slug . '.' . $product->id }}">
                        @livewire(productCard::class, ['product' => $product], key('category.' . $slug . '.' . $product->id))
                    </div>
                @endforeach
            </div>
            
            {{ $products->onEachSide(1)->links(data: ['scrollTo' => '.breadcrumbs']) }}
        @else
            <div class="alert alert--info">{!! __('category.null') !!}</div>
        @endif 

        <div class="loading" wire:loading wire:loading.delay.shorter></div>
    </div>

</div>

@script
<script>

    let views = document.querySelectorAll('[data-view]'),
        view_block = document.querySelector('.categorypage');

    views.forEach((item) => {
        item.onclick = function(event) {
            var element_block = event.target.closest('.sort__item--view')

            views.forEach((item2) => {
                item2.classList.remove('active')
            })

            event.target.classList.add('active')
    
            view_block.classList.remove('categorypage--grid', 'categorypage--list')
            view_block.classList.add('categorypage--' + item.getAttribute('data-view'))
    
            axios.post('/session/set', {
                name : 'card-view',
                value: item.getAttribute('data-view')
            })
        }
    });

</script> 
@endscript