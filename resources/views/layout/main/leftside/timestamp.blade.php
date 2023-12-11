<div class="col-12">
  <div class="card">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li id="todayTopTime"><a class="dropdown-item">Today</a></li>
        <li id="monthTopTime"><a class="dropdown-item">This Month</a></li>
        <li id="yearTopTime"><a class="dropdown-item">This Year</a></li>
    </div>

    <div class="card-body">
      <h5 class="card-title">Api Terpanggil</h5>

      <!-- Area Chart -->
      <div id="areaChart"></div>

      <script>
        const todayTopTime = document.getElementById('todayTopTime')
        const monthTopTime = document.getElementById('monthTopTime')
        const yearTopTime = document.getElementById('yearTopTime')

        const emptyTopTime = document.getElementById('areaChart')

        todayTopTime.addEventListener('click', function (event) {
          emptyTopTime.innerHTML = '';

          new ApexCharts(document.querySelector("#areaChart"), {
            series: [{
              name: "Request",
              data: {{ Js::from($dayCountList) }}
            }],
            chart: {
              type: 'area',
              height: 350,
              zoom: {
                enabled: false
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'straight'
            },
            subtitle: {
              text: 'Api called',
              align: 'left'
            },
            labels: {{ Js::from($dayTimeList) }},
            xaxis: {
              type: 'string',
            },
            yaxis: {
              opposite: true
            },
            legend: {
              horizontalAlign: 'left'
            }
          }).render();
        });

        monthTopTime.addEventListener('click', function (event) {
          emptyTopTime.innerHTML = '';

          new ApexCharts(document.querySelector("#areaChart"), {
            series: [{
              name: "Request",
              data: {{ Js::from($monthCountList) }}
            }],
            chart: {
              type: 'area',
              height: 350,
              zoom: {
                enabled: false
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'straight'
            },
            subtitle: {
              text: 'Api called',
              align: 'left'
            },
            labels: {{ Js::from($monthTimeList) }},
            xaxis: {
              type: 'string',
            },
            yaxis: {
              opposite: true
            },
            legend: {
              horizontalAlign: 'left'
            }
          }).render();
        });

        yearTopTime.addEventListener('click', function (event) {
          emptyTopTime.innerHTML = '';

          new ApexCharts(document.querySelector("#areaChart"), {
            series: [{
              name: "Request",
              data: {{ Js::from($yearCountList) }}
            }],
            chart: {
              type: 'area',
              height: 350,
              zoom: {
                enabled: false
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'straight'
            },
            subtitle: {
              text: 'Api called',
              align: 'left'
            },
            labels: {{ Js::from($yearTimeList) }},
            xaxis: {
              type: 'string',
            },
            yaxis: {
              opposite: true
            },
            legend: {
              horizontalAlign: 'left'
            }
          }).render();
        });

        document.addEventListener("DOMContentLoaded", () => {
          
          new ApexCharts(document.querySelector("#areaChart"), {
            series: [{
              name: "Request",
              data: {{ Js::from($dayCountList) }}
            }],
            chart: {
              type: 'area',
              height: 350,
              zoom: {
                enabled: false
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'straight'
            },
            subtitle: {
              text: 'Api called',
              align: 'left'
            },
            labels: {{ Js::from($dayTimeList) }},
            xaxis: {
              type: 'string',
            },
            yaxis: {
              opposite: true
            },
            legend: {
              horizontalAlign: 'left'
            }
          }).render();
        });
      </script>
      <!-- End Area Chart -->

    </div>

  </div>
</div><!-- End Reports -->