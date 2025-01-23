<section class="section section--advantage">
    <div class="container">
        <div class="sectionwork">
            <h2 class="sectionwork__title">Как мы работаем</h2>
            <div class="sectionwork__block">
                @php($count = 1)
                @foreach(config('settings.section_work') as $item)
                    <div class="sectionwork__item">
                        <div class="sectionwork__item-block">
                            <div class="sectionwork__item-step">{{ $count }} шаг</div>
                            <h5 class="sectionwork__item-title">{{ $item['title'] }}</h5>
                            <p class="sectionwork__item-description">{{ $item['description'] }}</p>
                        </div>
                    </div>
                    @php($count++)
                @endforeach
            </div>
        </div>
    </div>
</section>