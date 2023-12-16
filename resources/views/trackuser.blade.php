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
          <form>
            <div class="row mb-3">
              <label for="inputkey" class="col-sm-2 col-form-label">Kata Kunci</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputText">
              </div>
            </div>
            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="route" checked>
                  <label class="form-check-label" for="gridRadios1">
                    Route
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="user">
                  <label class="form-check-label" for="gridRadios2">
                    User
                  </label>
                </div>

              </div>
            </fieldset>
            <div class="text-end">
              <button type="submit" class="btn btn-primary">Cari</button>
            </div>
          </form><!-- End Horizontal Form -->

        </div>
      </div>

    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Service Terbanyak</h5>
          <div id="barChart"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Record Table</h5>

        <!-- Table with stripped rows -->
        <!-- Entah kenapa ini table klo ngga 5 fitur searchnya gk bisa -->
        <table class="table datatable" id="myTable">
          <thead>
            <tr>
              <th>id</th>
              <th>route</th>
              <th>Method</th>
              <th>message</th>
              <th>Timestamp</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($logall->take(100)->values() as $record)
            <tr>
              <td>{{ $record->id }}</td>
              <td>{{ $record->route }}</td>
              <td>{{ $record->method }}</td>
              <td>{{ $record->message }}</td>
              <td>{{ $record->timestamp }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- End Table with stripped rows -->

      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      new ApexCharts(document.querySelector("#barChart"), {
        series: [{
          data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
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
          categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
            'United States', 'China', 'Germany'
          ],
        }
      }).render();
    });
  </script>
</section>
@endsection