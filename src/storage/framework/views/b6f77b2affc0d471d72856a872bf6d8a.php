<div>
    <h6 class="d-flex justify-content-between align-items-center"><?php echo e(__('Statistic Email Sending')); ?>

       
        <button class="btn btn-primary btn-sm" type="button" wire:click="$refresh">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" wire:loading></span>
            Обновить
        </button>
    </h6>

    <!--[if BLOCK]><![endif]--><?php if(isset($tabs['data']) && !empty($tabs['data'])): ?>
        <div id="email-constructor-chart" data-json="<?php echo e(json_encode($tabs)); ?>"></div>
    <?php else: ?>
        <div class="alert alert-info"><?php echo e(__('The emails haven\'t been sent yet')); ?></div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <?php echo app('Illuminate\Foundation\Vite')('resources/js/admin/charts.js'); ?>
</div>

    <?php
        $__scriptKey = '3646681033-0';
        ob_start();
    ?>
<script>
 
    $wire.on('refreshComponentStats', () => {
  
        const element = document.querySelector("#email-constructor-chart")
        let element_json = JSON.parse(element.getAttribute('data-json'))

        const options = {
              series: [{
              name: 'Всего',
              data: element_json.data
            }],
              chart: {
              height: 350,
              type: 'bar',
            },
            plotOptions: {
              bar: {
                borderRadius: 10,
                dataLabels: {
                  position: 'top', // top, center, bottom
                },
              }
            },
            dataLabels: {
              enabled: true,
              offsetY: -20,
              style: {
                fontSize: '12px',
                colors: ["#304758"]
              }
            },
      
            xaxis: {
              categories: element_json.categories,
              position: 'top',
              axisBorder: {
                show: false
              },
              axisTicks: {
                show: false
              },
              crosshairs: {
                fill: {
                  type: 'gradient',
                  gradient: {
                    colorFrom: '#D8E3F0',
                    colorTo: '#BED1E6',
                    stops: [0, 100],
                    opacityFrom: 0.4,
                    opacityTo: 0.5,
                  }
                }
              },
              tooltip: {
                enabled: true,
              }
            },
            yaxis: {
              axisBorder: {
                show: false
              },
              axisTicks: {
                show: false,
              },
            
            
            },
            title: {
              text: '<?php echo e(__('A total of :count emails have been sent', ['count' => $count_send])); ?>',
              floating: true,
              offsetY: 330,
              align: 'center',
              style: {
                color: '#444'
              }
            }
            };

            var charte = new ApexCharts(element, options);
            charte.render(); 
          })

    
</script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?><?php /**PATH /var/www/resources/views/admin/email-constructor-stats.blade.php ENDPATH**/ ?>