<div>
    <section class="section section--categorypage">
        <div class="container">
            @if($category->banner)
                <div class="categorypage__banner">
                    <img src="{{ resize($category->banner, 1660, 310) }}" alt="{{ $category->title }}" class="categorypage__banner-img">
                </div>
            @endif

            @if($childrens && count($childrens) > 0)
                <div class="categorypage__category">
                    <h3 class="categorypage__category-title">Выберите подкатегорию</h3>
                    <div class="categorypage__category-items">
                        @foreach($childrens as $children)
                            <a href="{{ route('category', $children->slug) }}" class="categorypage__category-item" wire:navigate>{!! $children->title !!}</a>
                        @endforeach
                    </div>
                </div>
            @endif
 
            @livewire(Filter::class, [
                'category' => $category, 
                'slug' => $slug, 
                'build' => 'category'
                ], key($category->id))
 
        </div>
    </section>
 
    <section class="section section--about section--bg">
        <div class="container">
            <div class="sectionabout">
                <h3 class="sectionabout_hello">Товары из раздела</h3>
                <div class="sectionabout__block">
                    <div class="sectionabout__info">
                        <h2 class="sectionabout__info-title">{!! $category->title !!}</h2>
                        <div class="sectionabout__info-description">{!! $category->description !!}</div>
                       
                    </div>
                    <div class="sectionabout__image">
                        <div class="sectionabout__image-a">
                            <img src="{{ resize(config('settings.image'), 500, 350) }}" alt="{!! config('settings.name') !!}" class="sectionabout__image-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <livewire:section.feedback code="collback" senturl="{{ url()->current() }}" />
</div>