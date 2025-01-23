@php($breadcrumbs = $__data[0] ?? [])


@if (!empty($breadcrumbs) && \Illuminate\Support\Arr::accessible($breadcrumbs))
    <div class="breadcrumbs">
        <ul itemscope="" itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs__ul">
            <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="breadcrumbs__li">
                <a itemprop="item" title="{{ __('home.breadcrumb') }}" href="{{ route('home') }}" class="breadcrumbs__a" wire:navigate>
                    <span itemprop="name" class="breadcrumbs__name">{{ __('home.breadcrumb') }}</span>
                    <meta itemprop="position" content="0">
                </a>
            </li>
            @php($count = 1)
            @foreach ($breadcrumbs as $label => $link)
                @if (!empty($label) || !empty($link))
                    @if (is_array($link))
                        @foreach ($link as $label2 => $link2)
                            @if (!empty($label2) || !empty($link2))
                                <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="breadcrumbs__li">
                                    @if (is_int($label2) && !is_int($link2))
                                        <span itemprop="name" class="breadcrumbs__name">{{ $link2 }}</span>
                                        <meta itemprop="position" content="{{ $count }}">
                                    @else
                                        <a itemprop="item" title="{{ $label2 }}" href="{{ $link2 }}" class="breadcrumbs__a" wire:navigate>
                                            <span itemprop="name" class="breadcrumbs__name">{{ $label2 }}</span>
                                            <meta itemprop="position" content="{{ $count }}">
                                        </a>
                                    @endif
                                </li>
                                @php($count++)
                            @endif
                        @endforeach
                    @else
                        <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="breadcrumbs__li">
                            @if (is_int($label) && !is_int($link))
                                <span itemprop="name" class="breadcrumbs__name">{{ $link }}</span>
                                <meta itemprop="position" content="{{ $count }}">
                            @else
                                <a itemprop="item" title="{{ $label }}" href="{{ $link }}" class="breadcrumbs__a" wire:navigate>
                                    <span itemprop="name" class="breadcrumbs__name">{{ $label }}</span>
                                    <meta itemprop="position" content="{{ $count }}">
                                </a>
                            @endif
                        </li>
                        @php($count++)
                    @endif
                @endif
            @endforeach
        </ul>
    </div>
@endif
