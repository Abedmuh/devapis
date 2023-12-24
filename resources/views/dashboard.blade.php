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
      Filter
    </button>
    <ul class="dropdown-menu">
      <li id="todayall"><a class="dropdown-item" href="#">Today</a></li>
      <li id="monthAll"><a class="dropdown-item" href="#">Last Month</a></li>
      <li id="yearall"><a class="dropdown-item" href="#">Last Year</a></li>
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
              <h6 id="countApi">{{ $logYear->count() }}</h6>
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
              <h6 id="countNull">{{ $logYear->where('code',null)->count() }}</h6>
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
              <h6 id="countSuccess">{{ $logYear->where('code',200)->count() }}</h6>
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
  $('#todayall').click(function (e) { 
    $('#filterButton').html('By Today');
    $('#countApi').html( {{ Js::from($logDay->count()) }} );
    $('#countNull').html( {{ Js::from($logDay->where('code',null)->count()) }} );
    $('#countSuccess').html( {{ Js::from($logDay->where('code',200)->count()) }} );
    $('#topService').html('');
    $('#topUser').html('');
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

  $('#monthAll').click(function (e) { 
    e.preventDefault();
    $('#filterButton').html('By Month');
    $('#countApi').html( {{ Js::from($logMonth->count()) }} );
    $('#countNull').html( {{ Js::from($logMonth->where('code',null)->count()) }} );
    $('#countSuccess').html( {{ Js::from($logMonth->where('code',200)->count()) }} );
    $('#topService').html('');
    $('#topUser').html('');
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
  
  $('#yearall').click(function (e) { 
    e.preventDefault();
    $('#filterButton').html('By Year');
    $('#countApi').html( {{ Js::from($logYear->count()) }} );
    $('#countNull').html( {{ Js::from($logYear->where('code',null)->count()) }} );
    $('#countSuccess').html( {{ Js::from($logYear->where('code',200)->count()) }} );
    $('#topService').html('');
    $('#topUser').html('');
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

<!-- End Page Title -->
@endsection