<section class="section section--home">
    <div class="container">
        <div class="sectionhome">
            <div class="sectionhome__menu">
                <div class="sectionhome__menu-menucatalog">
                    <div class="menucatalog__general">
                        <ul class="menucatalog__general-ul">

                            <li class="menucatalog__general-li">
                                <a href="{{ route('compilation', 'new') }}" class="menucatalog__general-a" wire:navigate>
                                    <span class="menucatalog__general-icon">
                                        <img src="{{ resize('menu/new.svg', 18, 18) }}" alt="Новинки">
                                    </span>
                                    <span class="menucatalog__general-name">Новинки</span>
                                </a>
                            </li>

                            @foreach($categories as $count => $category)
                                @if($count <= 8)
                                    <li class="menucatalog__general-li">
                                        @if($category->children->count())
                                        <button class="menucatalog__general-a" data-menu-open="menucatalog" title="{{ $category->title }}" wire:click.prevent="$dispatch('menu', 'menucatalog')">
                                        @else
                                        <a href="{{ route('category', $category->slug) }}" class="menucatalog__general-a" wire:navigate>
                                        @endif
                                            <span class="menucatalog__general-icon">
                                                <img src="{{ resize($category->icon, 18, 18) }}" alt="{{ $category->title }}">
                                            </span>
                                            <span class="menucatalog__general-name">{{ $category->title }}</span>
                                            @if($category->children->count())
                                                <span class="menucatalog__general-child"></span>
                                            @endif
                                        </{{ $category->children->count() ? 'button' : 'a' }}>
                                    </li>
                                @endif
                            @endforeach

                            @if(count($categories) > 10)
                                <li class="menucatalog__general-li">
                                    <button type="button" class="menucatalog__general-a menucatalog__general-a--more" data-menu-open="menucatalog" title="Показать все" wire:click.prevent="$dispatch('menu', 'menucatalog')">
                                        <span class="menucatalog__general-icon">
                                            <svg width="16" height="16">
                                                <use xlink:href="storage/image/sprite.svg#more"></use>
                                            </svg>
                                        </span>
                                        <span class="menucatalog__general-name">Показать все</span>
                                    </button>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
            <div class="sectionhome__data">
                <div class="sectionhome__data-items">
                    <div class="sectionhome__data-item">
                        <div class="sectionhome__data-slider">
                            @if(config('settings.section_home.slider'))
                                <div class="swiper-section">
                                    <div class="swiper" data-slider-design="home">
                                        <div class="swiper-wrapper">
                                            @foreach(config('settings.section_home.slider') as $item)
                                                @if(isset($item['status']) && !empty($item['status']))
                                                    <div class="swiper-slide">
                                                        @empty($item['link'])
                                                            <div class="sectionhome__data-item_a">
                                                                <img src="{{ resize($item['image'], 1075, 400) }}" alt="{{ $item['title'] }}">
                                                            </div>
                                                        @else
                                                            <a href="{{ $item['link'] }}" class="sectionhome__data-item_a" wire:navigate>
                                                                <img src="{{ resize($item['image'], 1075, 400) }}" alt="{{ $item['title'] }}">
                                                            </a>
                                                        @endempty
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div> 
                                    </div>
                                    <div class="swiper-button-next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.82666 7.00003C0.82666 6.73484 0.932005 6.48052 1.11952 6.293C1.30704 6.10549 1.56136 6.00014 1.82655 6.00014H13.4113L9.11773 1.70862C8.92998 1.52086 8.8245 1.26622 8.8245 1.00069C8.8245 0.735173 8.92998 0.480526 9.11773 0.292773C9.30549 0.105021 9.56013 -0.000457764 9.82565 -0.000457764C10.0912 -0.000457764 10.3458 0.105021 10.5336 0.292773L16.5329 6.29211C16.626 6.38499 16.6999 6.49533 16.7503 6.61681C16.8007 6.73828 16.8267 6.86851 16.8267 7.00003C16.8267 7.13155 16.8007 7.26178 16.7503 7.38325C16.6999 7.50473 16.626 7.61507 16.5329 7.70795L10.5336 13.7073C10.3458 13.895 10.0912 14.0005 9.82565 14.0005C9.56013 14.0005 9.30549 13.895 9.11773 13.7073C8.92998 13.5195 8.8245 13.2649 8.8245 12.9994C8.8245 12.7338 8.92998 12.4792 9.11773 12.2914L13.4113 7.99992H1.82655C1.56136 7.99992 1.30704 7.89457 1.11952 7.70706C0.932005 7.51954 0.82666 7.26522 0.82666 7.00003Z" stroke="none"/>
                                        </svg>
                                    </div>
                                    <div class="swiper-button-prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1732 7.00003C16.1732 6.73484 16.0679 6.48052 15.8804 6.293C15.6929 6.10549 15.4385 6.00014 15.1734 6.00014H3.58865L7.88217 1.70862C8.06993 1.52086 8.17541 1.26622 8.17541 1.00069C8.17541 0.735173 8.06993 0.480526 7.88217 0.292773C7.69442 0.105021 7.43978 -0.000457764 7.17425 -0.000457764C6.90873 -0.000457764 6.65409 0.105021 6.46633 0.292773L0.467002 6.29211C0.373886 6.38499 0.30001 6.49533 0.249602 6.6168C0.199195 6.73828 0.173248 6.86851 0.173248 7.00003C0.173248 7.13155 0.199195 7.26178 0.249602 7.38325C0.30001 7.50473 0.373886 7.61507 0.467002 7.70795L6.46633 13.7073C6.65409 13.895 6.90873 14.0005 7.17425 14.0005C7.43978 14.0005 7.69442 13.895 7.88217 13.7073C8.06993 13.5195 8.17541 13.2649 8.17541 12.9994C8.17541 12.7338 8.06993 12.4792 7.88217 12.2914L3.58865 7.99992H15.1734C15.4385 7.99992 15.6929 7.89457 15.8804 7.70706C16.0679 7.51954 16.1732 7.26522 16.1732 7.00003Z" stroke="none"/>
                                        </svg>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            @endif
                        </div>
                    </div>

                    @php
                        $banners = config('settings.section_home.banner_1');

                        if ($banners) {
                            foreach ($banners as $key => $value) {
                                if (!isset($value['status']) || empty($value['status'])) {
                                    unset($banners[$key]);
                                }
                            }
                        }

                        $banner = $banners ? $banners[array_rand($banners)] : null;
                    @endphp
                    @if ($banner)
                        <div class="sectionhome__data-item">
                            @empty($banner['link'])
                                <div class="sectionhome__data-banner">
                                    <img src="{{ resize($banner['image'], 300, 400) }}" alt="{{ $banner['title'] }}">
                                </div>
                            @else
                                <a href="{{ $banner['link'] }}" class="sectionhome__data-banner" wire:navigate>
                                    <img src="{{ resize($banner['image'], 300, 400) }}" alt="{{ $banner['title'] }}">
                                </a>
                            @endempty
                        </div>
                    @endif
                </div>
                <div class="sectionhome__data-items">
                    @php
                        $banners = config('settings.section_home.banner_2');

                        if ($banners) {
                            foreach ($banners as $key => $value) {
                                if (!isset($value['status']) || empty($value['status'])) {
                                    unset($banners[$key]);
                                }
                            }
                        }

                        $banner = $banners ? $banners[array_rand($banners)] : null;
                    @endphp
                    <div class="sectionhome__data-item">
                        @if ($banner)
                            @empty($banner['link'])
                                <div class="sectionhome__data-banner">
                                    <img src="{{ resize($banner['image'], 527, 180) }}" alt="{{ $banner['title'] }}">
                                </div>
                            @else
                                <a href="{{ $banner['link'] }}" class="sectionhome__data-banner" wire:navigate>
                                    <img src="{{ resize($banner['image'], 527, 180) }}" alt="{{ $banner['title'] }}">
                                </a>
                            @endempty
                        @endif
                    </div>
                    @php
                        $banners = config('settings.section_home.banner_3');

                        if ($banners) {
                            foreach ($banners as $key => $value) {
                                if (!isset($value['status']) || empty($value['status'])) {
                                    unset($banners[$key]);
                                }
                            }
                        }

                        $banner = $banners ? $banners[array_rand($banners)] : null;
                    @endphp
                    <div class="sectionhome__data-item">
                        @if ($banner)
                            @empty($banner['link'])
                                <div class="sectionhome__data-banner">
                                    <img src="{{ resize($banner['image'], 527, 180) }}" alt="{{ $banner['title'] }}">
                                </div>
                            @else
                                <a href="{{ $banner['link'] }}" class="sectionhome__data-banner" wire:navigate>
                                    <img src="{{ resize($banner['image'], 527, 180) }}" alt="{{ $banner['title'] }}">
                                </a>
                            @endempty
                        @endif
                    </div>
                    @php
                        $banners = config('settings.section_home.banner_4');

                        if ($banners) {
                            foreach ($banners as $key => $value) {
                                if (!isset($value['status']) || empty($value['status'])) {
                                    unset($banners[$key]);
                                }
                            }
                        }

                        $banner = $banners ? $banners[array_rand($banners)] : null;
                    @endphp
                    <div class="sectionhome__data-item">
                        @if ($banner)
                            @empty($banner['link'])
                                <div class="sectionhome__data-banner">
                                    <img src="{{ resize($banner['image'], 300, 180) }}" alt="{{ $banner['title'] }}">
                                </div>
                            @else
                                <a href="{{ $banner['link'] }}" class="sectionhome__data-banner" wire:navigate>
                                    <img src="{{ resize($banner['image'], 300, 180) }}" alt="{{ $banner['title'] }}">
                                </a>
                            @endempty
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>