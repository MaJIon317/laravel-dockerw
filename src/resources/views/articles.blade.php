<section class="section section--top section--newspage">
    <div class="container">
        @if(count($articles) > 0)
            <div class="newspage">
                @foreach($articles as $article)
                    <div class="newspage-item">
                        <div class="sectionpromotion__item-block">
                            <div class="sectionpromotion__item-image">
                                <a href="{{ route('article', $article->slug) }}" class="sectionpromotion__item-a" wire:navigate>
                                    <img src="{{ resize($article->image, 310, 200) }}" alt="{{ $article->title }}" class="sectionpromotion__item-img">
                                </a>
                            </div>
                            <div class="sectionpromotion__item-date">{{ \Carbon\Carbon::parse($article->publish_date)->diffForHumans() }}</div>
                            <h5 class="sectionpromotion__item-name">
                                <a href="{{ route('article', $article->slug) }}" wire:navigate>{{ $article->title }}</a>
                            </h5>
                            <div class="sectionpromotion__item-description">{!! \Illuminate\Support\Str::limit(strip_tags($article->description), 100, $end='...') !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $articles->onEachSide(1)->links(data: ['scrollTo' => '.breadcrumbs']) }}
        @else
            <div class="alert alert--info">{!! __('article.null') !!}</div>
        @endif
    </div>
</section>