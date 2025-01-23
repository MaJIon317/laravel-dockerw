<div x-data="searchComponent" @click.outside="closeSearch">
    <div class="header__data-search_block">
        <input type="text" wire:model="search" wire:keyup.debounce.300ms="keyup" wire:click="keyup" placeholder="Поиск среди тысячи товаров" value="{{ $search }}" @input="getItems" x-bind="search" class="header__data-search_input" autocomplete="off">
        <button type="button" class="header__data-search_button header__data-search_button--scanner" title="Поиск по штрихкоду" x-show="checkCamera" style="display: none;" x-on:click="barcode">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16">
                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0z" stroke="none"></path>
            </svg>
        </button>
        {{--
        <button type="submit" class="header__data-search_button" title="Поиск по сайту" x-bind="searchButton">
            <svg width="20" height="22">
                <use xlink:href="storage/image/sprite.svg#search"></use>
            </svg>
        </button>
        --}}
    </div>

    <div id="search-barcode" class="search-barcode" x-show="isOpenCamera" style="display: none;" wire:ignore @click.outside="closeSearch">
        <video id="search-barcode-video" class="search-barcode-video" autoplay="false"></video>
    </div>

    <div class="searchresult" x-show="isOpen" wire:loading.class="searchresult--loading">
        {{--<div wire:loading class="searchresult__block">Подождите пожалуйста...</div> --}}
        @if(($results && count($results) > 0) || ($historys && count($historys) > 0))
            <div class="searchresult__block">
                <div class="searchresult__items">
                    @if(!empty($search))
                        @if($results && count($results) > 0)
                            <div class="searchresult__block-item">
                                <div class="searchresult__block-results">
                                    @foreach($results as $result)
                                        <div class="searchresult__block-result">
                                            <a href="{{ $result['url'] }}" class="searchresult__block-a" wire:navigate>
                                                <span class="searchresult__block-name">{{ $result['title'] }}</span>
                                                <span class="searchresult__block-count">{!! $result['text'] !!}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else 
                        <div class="text text--red">Нет результатов</div>
                        @endif
                    @endif
                    @if($historys && count($historys) > 0)
                        <div class="searchresult__block-item">
                            <div class="searchresult__block-title">
                                <span class="searchresult__block-title_name">История запросов</span>
                                <button type="button" wire:click="clearHistory" class="searchresult__block-reset a">Очистить</button>
                            </div>
                            <div class="searchresult__block-results">
                                @foreach($historys as $key => $history)
                                    <div class="searchresult__block-result">
                                        <span class="searchresult__block-icon">
                                            <svg width="16" height="17">
                                                <use xlink:href="storage/image/sprite.svg#timer"></use>
                                            </svg>
                                        </span>
                                        <button type="button" class="searchresult__block-a" x-on:click="history">{!! $history !!}</button>
                                        <button type="button" wire:click="deleteHistory('{{ $key }}')" class="searchresult__block-delete a">
                                            <svg width="10" height="11">
                                                <use xlink:href="storage/image/sprite.svg#close"></use>
                                            </svg>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{--
                    <div class="searchresult__block-item">
                        <div class="searchresult__block-title">
                            <span class="searchresult__block-title_name">Популярные запросы</span>
                        </div>
                        <div class="searchresult__block-result">
                            <span class="searchresult__block-icon">
                                <svg width="17" height="17">
                                    <use xlink:href="storage/image/sprite.svg#search"></use>
                                </svg>
                            </span>
                            <a href="#" class="searchresult__block-a">Поисковый запрос</a>
                        </div>
                    </div>
                    --}}

                </div>
            </div>
        @endif
    </div>
</div>

@assets
    @vite('resources/js/barcode-scanner.js')
    
    <style>
        .search-barcode {
            position: fixed;
            top: 147px;
            left: 50%;
            transform: translateX(-50%);
            height: 412px;
            bottom: 60px;
            width: 100%;
            max-width: 500px;
            background: #fff;
            z-index: 122;
        }

        .search-barcode video {
            position: relative;
            width: 100%;
            height: 100%;
        }
        .search-barcode-select {
            display: none;
        }
   
    </style>

@endassets
 
@script
<script>
    Alpine.data('searchComponent', () => {
        return {
            isOpen: false,
            checkCamera: null,
            isOpenCamera: false,
            resultBarcode: '',
            selectedDeviceId: 'defined',
            search: "",
            codeReader: null,
            init() {
                if (this.checkCamera === null) {
                    this.isCamera()
                }
            },
            async isCamera(checkCamera = false) {
                if (!checkCamera) {
                    const { devices, error: devicesError } = await enumerateDevices()
                
                    devices.forEach(device => {
                        if (device.kind === 'videoinput') {
                            this.checkCamera = true
                        }
                    });
                } else {
                    this.checkCamera = checkCamera;
                }
            
                return this.checkCamera
            },
            get getItems() {
                this.isOpen = true
            },
            history() {
                const search = document.getElementById('search');

                search.value = options.$el.textContent;
                search.setAttribute('value', options.$el.textContent)
                search.dispatchEvent(new Event('click'));
                $wire.search = options.$el.textContent;
        
            },
            async barcode() {  
                if (this.isOpenCamera) {
                    this.closeSearch()
                    return
                }
        
                const container = document.getElementById('search-barcode');

                this.codeReader = await new BrowserBarcodeReader()
 
                await this.codeReader.listVideoInputDevices()
                    .then((videoInputDevices) => {
                        const newSelect = document.createElement('select');
                        newSelect.setAttribute('id', 'search-barcode-select');
                        newSelect.setAttribute('class', 'search-barcode-select');
                        newSelect.setAttribute('x-on:change', 'startScannerBarcode(this.value)');

                        select = container.appendChild(newSelect);
                        
                        let length = videoInputDevices.length - 1;

                        if (videoInputDevices[length].deviceId) {
                            this.selectedDeviceId = videoInputDevices[length].deviceId;
                        } else {
                            this.selectedDeviceId = videoInputDevices[0].deviceId;
                        }

                        if (videoInputDevices.length >= 1) {
                            videoInputDevices.forEach((element) => {
                                const sourceOption = document.createElement('option');
                                sourceOption.text = element.label;
                                sourceOption.value = element.deviceId;

                                if (this.selectedDeviceId == element.deviceId) {
                                    sourceOption.setAttribute('selected', 'selected');
                                }

                                select.appendChild(sourceOption);
                            });

                            select.onchange = () => {
                                this.codeReader.reset()

                                this.selectedDeviceId = select.value

                                this.startScannerBarcode()
                            };
                        }
                    })
                    .catch((err) => {
                        alert(err)
                    })

                this.isOpenCamera = true  
                this.startScannerBarcode()  
            },
            async startScannerBarcode() {
                await this.codeReader.decodeFromVideoDevice(this.selectedDeviceId, document.getElementById('search-barcode-video'), (result, err) => {
                    if (result && (result.text != this.resultBarcode)) {
                        this.resultBarcode = result.text
                      
                        $wire.searchBarcode(result.text)

                        if (navigator.vibrate) {
                            navigator.vibrate(10);
                        }

                        setTimeout(() => {
                            this.resultBarcode = '';
                        }, 1500);
                    }

                    if (err && !(err instanceof NotFoundException)) {
                        console.log(err)
                    }
                })

                document.getElementById('search-barcode').style.display = 'block'
            },
            closeSearch() {
                this.search = ""
                this.isOpen = false

                if (this.codeReader) {
                    this.codeReader.reset()
                    this.isOpenCamera = false
                }
            },

        }
    })
  
</script>
@endscript