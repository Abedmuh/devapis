@extends('layout.main')

@section('content')
<div class="pagetitle">
  <h1>Data Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item">User Record</li>
    </ol>
  </nav>
</div><!-- End Page Title -->


<section class="section">
  <div class="row">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Pencarian Log</h5>
          <!-- Horizontal Form -->
          <form action="/tracklog">
            <div class="row">
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Kata Kunci</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Cari" name="search" id="kunci">
                </div>
              </div>
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Kategori</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kategori" id="kategori1" value="route" checked>
                    <label class="form-check-label" for="kategori1">
                      Route
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="kategori" id="kategori2" value="username">
                    <label class="form-check-label" for="kategori2">
                      User
                    </label>
                  </div>
                </div>
              </fieldset>
              <div class="text-center">
                <button type="button" class="btn btn-primary" id="cari">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </div>
          </form>
          <!-- End Horizontal Form -->

        </div>
      </div>

    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">User Terbanyak</h5>
          {{-- Table --}}
          <div id="barChart"></div>
          @if (request('search') == null)
          <p>No post Here</p>
          @endif
          {{-- End Table --}}
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Record Table</h5>

        <!-- Table with stripped rows -->
        <table class="table table-striped" id="myTable">
          <thead>
            <tr>
              <th class="col-md-1">Id</th>
              <th class="col-md-2">Username</th>
              <th class="col-md-2">Route</th>
              <th class="col-md-1">Method</th>
              <th class="col-md-2">Message</th>
              <th class="col-md-2">Timestamp</th>
            </tr>
          </thead>
        </table>
        <!-- End Table with stripped rows -->



      </div>
    </div>
  </div>

  <script>
    function showChart(response) {
      new ApexCharts(document.querySelector("#barChart"), {
        series: [{
          data: dataCount,
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
          categories: dataList,
        }
      }).render();
    }
    function showTable() {
      $('#myTable').DataTable({
        processing:true,
        serverside:true,
        ajax: "http://127.0.0.1:8000/tracklog/log",
        columns: [{
          data: 'id',
          name: 'Id'
        },{
          data: 'username',
          name: 'Username'
        },{
          data: 'route',
          name: 'Route'
        },{
          data: 'method',
          name: 'Method'
        }
        ,{
          data: 'message',
          name: 'Message'
        },{
          data: 'timestamp',
          name: 'Timestamp'
        }]
      })
    }
    $(document).ready(function () {
      showTable();
    });
    $('#cari').click(function (e) { 
      e.preventDefault();
      $.ajax({
        url: "http://127.0.0.1:8000/tracklog/loglist",
        dataType: "json",
        success: function (response) {
          console.log(response);
        }
      });
    });
  </script>
</section>
@endsection