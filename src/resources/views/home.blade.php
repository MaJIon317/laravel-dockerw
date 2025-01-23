<div>
    <livewire:section.home />

    <livewire:section.productTab :tabs="['new', 'hit']" />

    <livewire:section.about />

    <livewire:section.advantage />

    <livewire:section.work />

    <livewire:section.holiday />

    <livewire:section.news_livewire />

    {{--
    <livewire:section.ordermap_livewire />
        --}}
        
    <livewire:section.feedback code="collback" senturl="{{ url()->current() }}" />

</div>
