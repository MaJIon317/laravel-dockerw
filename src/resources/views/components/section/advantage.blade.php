<section class="section section--advantage section--bg">
    <div class="container">
        <div class="sectionadvantage">
            <h2 class="sectionadvantage__title">Кратко о нас в цифрах</h2>
            <div class="sectionadvantage__block">
                @foreach(config('settings.section_advantage') as $item)
                    <div class="sectionadvantage__item">
                        <div class="sectionadvantage__item-block">
                            <div class="sectionadvantage__item-top">
                                <h3 class="sectionadvantage__item-title">{{ $item['title'] }}</h3>
                                <img src="{{ resize($item['image'], 60, 60) }}" alt="{{ $item['title'] }}" class="sectionadvantage__item-icon">
                            </div>
                            <p class="sectionadvantage__item-description">{{ $item['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>