@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <div class="pagination">
            @if (!$paginator->onFirstPage())
                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="pagination__a pagination__prev">
                    <svg width="8" height="12">
                        <use xlink:href="storage/image/sprite.svg#arrow-left"></use>
                    </svg>
                </button>
            @endif
         
            <div class="pagination__ul">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <div class="pagination__li">
                            <span class="pagination__a">...</span>
                            {{--
                            <div class="pagination__page">
                                <div class="pagination__page-block">
                                    <a href="#" class="pagination__page-a">2</a>
                                    <span class="pagination__page-dot">...</span>
                                    <a href="#" class="pagination__page-a">3</a>
                                    <span class="pagination__page-dot">...</span>
                                    <a href="#" class="pagination__page-a">4</a>
                                </div>
                            </div>
                            --}}
                        </div>
                    @endif
         
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <div class="pagination__li" wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                @if ($page == $paginator->currentPage())
                                    <span class="pagination__a active">{{ $page }}</span>
                                @else
                                    <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="pagination__a">{{ $page }}</button>
                                @endif
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>

            @if ($paginator->hasMorePages())
                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="pagination__a pagination__prev" aria-label="{{ __('pagination.next') }}">
                    <svg width="8" height="12">
                        <use xlink:href="storage/image/sprite.svg#arrow-right"></use>
                    </svg>
                </button>
            @endif
        </div>
    @endif
</div>