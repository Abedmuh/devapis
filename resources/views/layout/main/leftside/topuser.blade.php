<div class="col-lg-6">
  <div class="card">

    <div class="card-body">
      <h5 class="card-title">Pengguna Terbanyak</h5>

      <!-- Bar Chart -->
      <div id="topUser"></div>
      <script>
        document.addEventListener("DOMContentLoaded", () => {
          
          new ApexCharts(document.querySelector("#topUser"), {
            
            series: [{
              data: {{ Js::from($yearUserCount) }}
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
              categories: {{ Js::from($yearUserlist) }},
            }
          }).render();
        });
      </script>
      <!-- End Bar Chart -->

    </div>
  </div>
</div>