<div class="col-lg-6">
  <div class="card">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li id="todayTopService"><a class="dropdown-item">Today</a></li>
        <li id="monthTopService"><a class="dropdown-item">This Month</a></li>
        <li id="yearTopService"><a class="dropdown-item">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Service Terbanyak</h5>

      <!-- Bar Chart -->
      <div id="topService"></div>
      <script>
        const todayTopService = document.getElementById('todayTopService')
        const monthTopService = document.getElementById('monthTopService')
        const yearTopService = document.getElementById('yearTopService')

        const emptyTopService = document.getElementById('topService')

        todayTopService.addEventListener('click', function (event) {
          emptyTopService.innerHTML = '';

          new ApexCharts(document.querySelector("#topService"), {
            
            series: [{
              data: {{ Js::from($dayServiceCount) }}
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
              categories: {{ Js::from($dayServicelist) }},
            }
          }).render();
        });

        monthTopService.addEventListener('click', function (event) {
          emptyTopService.innerHTML = '';

          new ApexCharts(document.querySelector("#topService"), {
            
            series: [{
              data: {{ Js::from($monthServiceCount) }}
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
              categories: {{ Js::from($monthServicelist) }},
            }
          }).render();
        });

        yearTopService.addEventListener('click', function (event) {
          emptyTopService.innerHTML = '';

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