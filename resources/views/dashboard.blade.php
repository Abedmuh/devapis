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
    <button class="btn btn-light btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
      aria-expanded="false">
      Filter
    </button>
    <ul class="dropdown-menu">
      <li id="todayall" class="todayalljq"><a class="dropdown-item" href="#">Today</a></li>
      <li id="monthall" class="monthalljq"><a class="dropdown-item" href="#">Last Month</a></li>
      <li id="yearall" class="yearalljq"><a class="dropdown-item" href="#">Last Year</a></li>
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
            <div class="ps-3" id="countApi">
              <h6>{{ $logYear->count() }}</h6>
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
              <i class="bi bi-currency-dollar"></i>
            </div>
            <div class="ps-3" id="countNull">
              <h6>{{ $logYear->where('code',null)->count() }}</h6>
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
            <div class="ps-3" id="countSuccess">
              <h6>{{ $logYear->where('code',200)->count() }}</h6>
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
  $('yearall')
</script>
<script>
  const countApi = document.getElementById('countApi')
  const countNull = document.getElementById('countNull')
  const countSuccess = document.getElementById('countSuccess')

  const todayAll = document.getElementById('todayall')
  const monthAll = document.getElementById('monthall')
  const yearAll = document.getElementById('yearall')

  const apicallCard = document.createElement('h6');
  const nullCard = document.createElement('h6');
  const successCard = document.createElement('h6');

  function emptyStuff() {
    countApi.innerHTML = '';
    countNull.innerHTML = '';
    countSuccess.innerHTML = '';
  }

  function fillStuff() {
    countApi.append(apicallCard)
    countNull.append(nullCard)
    countSuccess.append(successCard)
  }

  todayAll.addEventListener('click', function (event) {
    emptyStuff();

    apicallCard.innerText = {{ Js::from($logDay->count()) }};
    nullCard.innerText = {{ Js::from($logDay->where('code',null)->count()) }}; 
    successCard.innerText = {{ Js::from($logDay->where('code',200)->count()) }};    

    fillStuff();
  });

  monthAll.addEventListener('click', function (event) {
    emptyStuff();

    apicallCard.innerText = {{ Js::from($logMonth->count()) }};  
    nullCard.innerText = {{ Js::from($logMonth->where('code',null)->count()) }}; 
    successCard.innerText = {{ Js::from($logMonth->where('code',200)->count()) }};  

    fillStuff();
  });

  yearAll.addEventListener('click', function (event) {
    emptyStuff();

    apicallCard.innerText = {{ Js::from($logYear->count()) }};  
    nullCard.innerText = {{ Js::from($logYear->where('code',null)->count()) }};  
    successCard.innerText = {{ Js::from($logYear->where('code',200)->count()) }};  

    fillStuff();
  });
</script>
<!-- End Page Title -->
@endsection