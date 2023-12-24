<div class="col-lg-6">
  <div class="card">

    <div class="card-body">
      <h5 class="card-title">Service Terbanyak</h5>

      <!-- Bar Chart -->
      <div id="topService"></div>
      <script>
        document.addEventListener("DOMContentLoaded", () => {
          new ApexCharts(document.querySelector("#topService"), {
            
            series: [{
              data: {{ Js::from($yearServiceCount) }}
            }],
            chart: {
              type: 'bar',
              height: 350
            },
            plotOptions: {
              bar: {
                borderRadius: 4,
                horizontal: true,
              }
            },
            dataLabels: {
              enabled: false
            },
            xaxis: {
              categories: {{ Js::from($yearServicelist) }},
            }
          }).render();
        });
      </script>
      <!-- End Bar Chart -->

    </div>
  </div>
</div>