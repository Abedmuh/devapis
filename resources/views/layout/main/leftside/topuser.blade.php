<div class="col-lg-6">
  <div class="card">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li id="todayTopUser"><a class="dropdown-item">Today</a></li>
        <li id="monthTopUser"><a class="dropdown-item">This Month</a></li>
        <li id="yearTopUser"><a class="dropdown-item">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Pengguna Terbanyak</h5>

      <!-- Bar Chart -->
      <div id="topUser"></div>
      <script>
        const todayTopUser = document.getElementById('todayTopUser')
        const monthTopUser = document.getElementById('monthTopUser')
        const yearTopUser = document.getElementById('yearTopUser')

        const emptyTopuser = document.getElementById('topUser')

        todayTopUser.addEventListener('click', function (event) {
          emptyTopuser.innerHTML = '';

          new ApexCharts(document.querySelector("#topUser"), {
            
            series: [{
              data: {{ Js::from($dayUserCount) }}
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
              categories: {{ Js::from($dayUserlist) }},
            }
          }).render();
        });

        monthTopUser.addEventListener('click', function (event) {
          emptyTopuser.innerHTML = '';

          new ApexCharts(document.querySelector("#topUser"), {
            
            series: [{
              data: {{ Js::from($monthUserCount) }}
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
              categories: {{ Js::from($monthUserlist) }},
            }
          }).render();
        });

        yearTopUser.addEventListener('click', function (event) {
          emptyTopuser.innerHTML = '';

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