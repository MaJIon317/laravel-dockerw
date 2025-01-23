<section class="section section--home">
    <div class="container">
        <div class="description">
            @if ($article->banner)
                <div class="description-image">
                    <span>
                        <img src="{{ resize($article->banner, 1660, 415) }}" alt="{{ $article->title }}">
                    </span>
                </div>
            @endif
            <div class="description-editor">{!! $article->description !!}</div>
        </div>
    </div>
</section>