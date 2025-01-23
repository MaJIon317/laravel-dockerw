<div>
    @if(count($faqs) > 0)
        <section class="section section--faq">
            <div class="container">
                <div class="section__title sectionpromotion__title">
                    <div class="section__title-item">
                        <h2 class="section__title-title">Частые вопросы</h2>
                    </div>
                </div>
                
                @php
                    $faqs = $faqs->split(ceil($faqs->count() / 2));
                @endphp
            
                <div class="faq">
                    @foreach($faqs as $items)
                        <div class="faq__items">
                            @foreach($items as $faq)
                                <div class="faq__item">
                                    <div class="faq__block">
                                        <h4 class="faq__title">
                                            <span>{{ $faq->question }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9">
                                                <path d="M1 0.748413L8.5 8.24841L16 0.748413" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </h4>
                                        <div class="faq__desc">{!! $faq->answer !!}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
            
                </div>

            </div>
        </section>
    @endif
</div>

@script
<script>
    let faqs = document.querySelectorAll('.faq__title')

    if (faqs) {
        faqs.forEach((faq) => {
            faq.onclick = function(event) {
                event.target.parentNode.classList.toggle('active')
            }
        });
    }
</script>
@endscript