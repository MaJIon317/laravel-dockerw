<div>
    <section class="section section--categorypage">
        <div class="container">

            <x-category :categories="$categories"/>

        </div>
    </section>

    <livewire:section.feedback code="collback" senturl="{{ url()->current() }}" />
 
</div>