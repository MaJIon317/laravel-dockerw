@if (isset($categories) && (count($categories) > 0))
    <ul class="categorylist__items">
        @foreach($categories as $category)
            <li class="categorylist__item-li">
                <a href="{{ route('category', $category->slug) }}" class="categorylist__item{{ request()->is('*category*' . $category->slug . '*') ? ' active' : '' }}" wire:navigate>
                    <span class="categorylist__item-name">{{ $category->title }}</span>
                    <span class="categorylist__item-count">{{ $category->products_count }}</span>
                </a>

                @if(count($category->children) > 0)
                    <x-category :categories="$category->children"/>
                @endif
                <!-- Recursion -->
            </li>
        @endforeach
    </ul>
@else
    {{ __('No categories found') }}
@endif
