<div class="container menucatalog__container" x-data="menucatalog">
    <div class="menucatalog__block">
        <div class="menucatalog__general">
            <ul class="menucatalog__general-ul scrollbar">

                <li class="menucatalog__general-li">
                    <a href="{{ route('compilation', 'new') }}" class="menucatalog__general-a" wire:navigate>
                        <span class="menucatalog__general-icon">
                            <img src="{{ resize('menu/new.svg', 18, 18) }}" alt="Новинки">
                        </span>
                        <span class="menucatalog__general-name">Новинки</span>
                    </a>
                </li>
 
                @foreach($categories as $category)
                    <li class="menucatalog__general-li">
                        @if($category->children->isNotEmpty())
                            <button type="button" data-menucatalog-general="{{ $category->id }}" class="menucatalog__general-a">
                        @else
                            <a href="{{ route('category', $category->slug) }}" class="menucatalog__general-a" wire:navigate>
                        @endif
                            <span class="menucatalog__general-icon">
                                <img src="{{ resize($category->icon, 18, 18) }}" alt="{{ $category->title }}">
                            </span>
                            <span class="menucatalog__general-name">{{ $category->title }}</span>
                            @if($category->children->isNotEmpty())
                                <span class="menucatalog__general-child"></span>
                            @endif
                        </{{ $category->children->isNotEmpty() ? 'button' : 'a' }}>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="menucatalog__children scrollbar">
            @foreach($categories as $category)
                @if($category->children->isNotEmpty())
                    <div class="menucatalog__children-item" id="menucatalog__children-{{ $category->id }}">
                        <div class="menucatalog__children-title">
                            <button class="btn btn--sm menucatalog__children-back" data-menucatalog-back="{{ $category->id }}">Назад</button>
                            {{ $category->title }}
                        </div>
                        <ul class="menucatalog__children-ul">
                        @foreach($category->children->chunk(ceil($category->children->count() / 3)) as $three)
                        <li class="menucatalog__children-lis">
                        <ul class="menucatalog__children-child_uls">
                            @foreach($three as $children)
                                <li class="menucatalog__children-li">
                                    <a href="{{ route('category', $children->slug) }}" class="menucatalog__children-a" wire:navigate>{{ $children->title }}</a>
                                    @if($children->children->isNotEmpty())
                                        <ul class="menucatalog__children-child_ul">
                                            
                                            @foreach($children->children as $child)
                                                <li class="menucatalog__children-child_li">
                                                    <a href="{{ route('category', $child->slug) }}" class="menucatalog__children-child_a" wire:navigate>{{ $child->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                            </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="menucatalog__banner">
            @foreach(config('settings.menu_banner') as $item)
                <div class="menucatalog__banner-item">
                    <a href="{{ $item['link'] }}" class="menucatalog__banner-a" wire:navigate>
                        <img src="{{ resize($item['image'], 300, 185) }}" alt="." class="menucatalog__banner-img">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@script
<script>
    Alpine.data('menucatalog', (id = 'menucatalog') => {
        let menu = document.getElementById(id),
            items = document.querySelectorAll('[data-menucatalog-general]'),
            back = document.querySelectorAll('[data-menucatalog-back]');
    
        for (var i = 0; i < items.length; i++) {
            if (document.documentElement.clientWidth > 768) {
                items.item(i).onmouseover = function(item) {
                    menucatalog(items, item);
                }
            } else {
                items.item(i).onclick = function(item) {
                    item.preventDefault();
                    
                    menucatalog(items, item);
                }
            }
        }

        for (var i = 0; i < back.length; i++) {
            back.item(i).onclick = function(item) {
                document.querySelector('[data-menucatalog-general="' + item.target.getAttribute('data-menucatalog-back') + '"').classList.remove('active');
                document.getElementById('menucatalog__children-' + item.target.getAttribute('data-menucatalog-back')).classList.remove('active');
            }
        }

        function menucatalog(items, item) { 
            for (var i2 = 0; i2 < items.length; i2++) {
                items.item(i2).classList.remove('active'),
        
                document.getElementById('menucatalog__children-' + items.item(i2).getAttribute('data-menucatalog-general')).classList.remove('active');
            }
        
            item.target.classList.add('active'),
            document.getElementById('menucatalog__children-' + item.target.getAttribute('data-menucatalog-general')).classList.add('active');
        }
    })
</script>
@endscript