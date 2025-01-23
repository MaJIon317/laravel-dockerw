<div>
    <h6 class="d-flex justify-content-between align-items-center">{{ __('Statistic Email Sending') }}
       
        <button class="btn btn-primary btn-sm" type="button" wire:click="$refresh">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" wire:loading></span>
            Обновить
        </button>
    </h6>

    @if (isset($tabs['data']) && !empty($tabs['data']))
        <div id="email-constructor-chart" data-json="{{ json_encode($tabs) }}"></div>
    @else
        <div class="alert alert-info">{{ __('The emails haven\'t been sent yet') }}</div>
    @endif

    @vite('resources/js/admin/charts.js')
</div>

@script
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
              text: '{{ __('A total of :count emails have been sent', ['count' => $count_send]) }}',
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
@endscript