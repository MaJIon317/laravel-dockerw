<section class="section section--home">
    <div class="container">
        <div class="description">
            @if ($news->banner)
                <div class="description-image">
                    <span>
                        <img src="{{ resize($news->banner, 1660, 415) }}" alt="{{ $news->title }}">
                    </span>
                </div>
            @endif
            <div class="description-editor">{!! $news->description !!}</div>
        </div>
    </div>
</section>