@extends('layout.main')

@section('content')

<div class="row">
  <div class="pagetitle col-md-4">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>

  <div class="dropdown col-md-4 ms-auto text-end">
    <button id="filterButton" class="btn btn-light btn-secondary dropdown-toggle" type="button"
      data-bs-toggle="dropdown" aria-expanded="false">
      By Year
    </button>
    <ul class="dropdown-menu">
      <li id="todayall"><a class="dropdown-item" href="#">By Day</a></li>
      <li id="monthAll"><a class="dropdown-item" href="#">By Month</a></li>
      <li id="yearall"><a class="dropdown-item" href="#">By Year</a></li>
    </ul>
  </div>
</div>



<section class="section dashboard">
  <div class="row">
    <!-- APi Call Card -->
    <div class="col-md-4">
      <div class="card info-card sales-card">

        <div class="card-body">
          <h5 class="card-title">
            Total APi called
          </h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-upload-cloud-2-line"></i>
            </div>
            <div class="ps-3">
              <div class="spinner-grow text-info load-scrn load-scrn-count" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <h6 id="countApi" class="chart-dash"></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Api Call Card -->

    <!-- Revenue Card -->
    <div class="col-md-4">
      <div class="card info-card revenue-card">

        <div class="card-body">
          <h5 class="card-title">Null Exeption</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-code-s-line"></i>
            </div>
            <div class="ps-3">
              <div class="spinner-grow text-info load-scrn load-scrn-count" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <h6 id="countNull" class="chart-dash"></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Revenue Card -->

    <!-- Success Call Card -->
    <div class="col-md-4">
      <div class="card info-card customers-card">

        <div class="card-body">
          <h5 class="card-title">Success Request</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
              <div class="spinner-grow text-info load-scrn load-scrn-count" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <h6 id="countSuccess" class="chart-dash"></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Success Call Card -->

    <!-- Reports -->
    @include('layout.main.leftside.timestamp')
    <!-- End Reports -->

    <!-- Top Route -->
    @include('layout.main.leftside.toproute')
    <!-- End Top Route -->

    <!-- Top Selling -->
    @include('layout.main.leftside.topuser')
    <!-- End Top Selling -->
  </div>
</section>

<script>
  function showTopUser(response) {
    new ApexCharts(document.querySelector("#topUser"), {
      series: [{
        name: "Request",
        data: response.userValue
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
        categories: response.userList,
      }
    }).render();
  }

  function showTopService(response) {
    new ApexCharts(document.querySelector("#topService"), {
      series: [{
        name: "Request",
        data: response.serviceValue
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
        categories: response.serviceList,
      }
    }).render();
  }

  function showTimestamp(response) {
    new ApexCharts(document.querySelector("#areaChart"), {
      series: [{
        name: "Request",
        data: response.timeValue
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
      labels: response.timeList,
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
  }

  function getCount() {
    $.ajax({
      type: "GET",
      url: "{{ route('dash.count') }}",
      data: {
        time: $('#filterButton').text()
      },
      dataType: "json",
      success: function (response) {
        $('.load-scrn-count').hide();
        $('#countApi').html(response.countApi);
        $('#countNull').html(response.countNull);
        $('#countSuccess').html(response.countSuccess);
      }
    });
  }

  function getTime() {
    $.ajax({
      type: "GET",
      url: "{{ route('dash.time') }}",
      data: {
        time: $('#filterButton').text()
      },
      dataType: "json",
      success: function (response) {
        $('#load-time').hide();
        showTimestamp(response);
      }
    });
  }

  function getAccess() {
    $.ajax({
      type: "GET",
      url: "{{ route('dash.access') }}",
      data: {
        time: $('#filterButton').text()
      },
      dataType: "json",
      success: function (response) {
        $('.load-scrn-top').hide();
        console.log(response);
        showTopUser(response);
        showTopService(response);
      }
    });
  }

  $(document).ready(function () {
    getCount();
    getTime();
    getAccess();
  });

  $('#todayall').click(function (e) { 
    $('#filterButton').html('By Day');
    $('.chart-dash').html('');
    $('#areaChart').html('');
    $('.load-scrn').show();
    getCount();
    getTime();
    getAccess();
  });

  $('#monthAll').click(function (e) { 
    $('#filterButton').html('By Month');
    $('.chart-dash').html('');
    $('.load-scrn').show();
    getCount();
    getTime();
    getAccess();
  });

  $('#yearall').click(function (e) { 
    $('#filterButton').html('By Year');
    $('.chart-dash').html('');
    $('.load-scrn').show();
    getCount();
    getTime();
    getAccess();
  });
</script>

<!-- End Page Title -->
@endsection