<div>
    <section class="section section--categorypage">
        <div class="container">

            @livewire(Filter::class, [
                'slug' => $slug, 
                'build' => 'compilation' . ucfirst($slug)
                ], key($slug))
     
        </div>
    </section>
 
    <livewire:section.feedback code="collback" senturl="{{ url()->current() }}" />
</div>