<div>
    <h6 class="d-flex justify-content-between align-items-center"><?php echo e(__('Click Map')); ?> 
       
        <button class="btn btn-primary btn-sm" type="button" wire:click="$refresh">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" wire:loading></span>
            Обновить
        </button>
    </h6>
    
    <iframe class="card" style="width: 100%;height: 350px;" srcdoc="<?php echo e($emailConstructor->html); ?>" allowfullscreen id="audit-block" data-maps="<?php echo e(json_encode($maps)); ?>">
        <p>Your browser does not support iframes, or there was an error loading the content.</p>
    </iframe>
</div>


    <?php
        $__scriptKey = '2847649351-0';
        ob_start();
    ?>
<script>
    let iframe = document.getElementById('audit-block');
    
    // сработает
    iframe.onload = function() {
        iframe.innerHTML = ''

        const maps = JSON.parse(iframe.getAttribute('data-maps'))

        const elements = iframe.contentDocument.querySelectorAll('a, img');

        const auditCounts = iframe.contentDocument.querySelectorAll('.audit-count');

        for (let indexcount = 0; indexcount < auditCounts.length; indexcount++) {
            const auditCount = auditCounts[indexcount];
            auditCount.remove()
        }

        for (let index2 = 0; index2 < elements.length; index2++) {
            const event = elements[index2];

            let code = null;
            
            if (event.tagName == 'A') {
                code = new URL(event.href)
            } else if (event.tagName == 'IMG') {
                code = new URL(event.src)
            }

            for (let index = 0; index < maps.length; index++) {
                const track_map = maps[index];

                if (track_map.key == code.searchParams.get('key')) {
    
                    const viewportOffset = event.getBoundingClientRect();
            
                    
                    let newCount = iframe.contentDocument.createElement('span');
                    newCount.classList.add('audit-count')
                
                    newCount.setAttribute('style', `top: ${viewportOffset.top - 10}px;left: ${viewportOffset.left - 10}px;`)
            
                    newCount.textContent = track_map.count

                    iframe.contentDocument.body.appendChild(newCount);
                }
            }
        }
    

        iframe.contentWindow.document.head.insertAdjacentHTML(
            'beforeend',
            `<style>
                .audit-block {
                position: relative;
                padding: 3rem;
                height: 100%;
                margin: 0;
                padding: 0;
            }
            .audit-count {
                position: absolute;
                left: 0;
                top: 0;
                min-width: 1.35rem;
                min-height: 1.35rem;
                font-size: 1rem;
                padding: 0.3em;
                line-height: 1;
                border-radius: 100%;
                text-align: center;
                align-content: center;
                background-color: darkblue;
                color: white;
                box-shadow: 0 0 6px 7px #00000030;
            }
            </style>`
        );
    };
$wire.on('refreshComponentStats', () => {
    iframe.onload()
})
</script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?><?php /**PATH /var/www/resources/views/admin/email-constructor-click-map.blade.php ENDPATH**/ ?>