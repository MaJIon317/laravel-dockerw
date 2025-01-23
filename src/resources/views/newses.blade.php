<section class="section section--top section--newspage">
    <div class="container">
        @if(count($newses) > 0)
            <div class="newspage">
                @foreach($newses as $news)
                    <div class="newspage-item">
                        <div class="sectionpromotion__item-block">
                            <div class="sectionpromotion__item-image">
                                <a href="{{ route('news', $news->slug) }}" class="sectionpromotion__item-a" wire:navigate>
                                    <img src="{{ resize($news->image, 310, 200) }}" alt="{{ $news->title }}" class="sectionpromotion__item-img">
                                </a>
                            </div>
                            <div class="sectionpromotion__item-date">{{ \Carbon\Carbon::parse($news->publish_date)->diffForHumans() }}</div>
                            <h5 class="sectionpromotion__item-name">
                                <a href="{{ route('news', $news->slug) }}" wire:navigate>{{ $news->title }}</a>
                            </h5>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $newses->onEachSide(1)->links(data: ['scrollTo' => '.breadcrumbs']) }}
        @else
            <div class="alert alert--info">{!! __('news.null') !!}</div>
        @endif
    </div>
</section>