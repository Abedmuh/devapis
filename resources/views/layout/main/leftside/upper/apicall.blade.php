<div class="col-md-4">
  <div class="card info-card sales-card">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li id="today"><a class="dropdown-item" href="#">Today</a></li>
        <li id="month"><a class="dropdown-item" href="#">This Month</a></li>
        <li id="year"><a class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">
        Total APi called <span>| Today</span>
      </h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-cart"></i>
        </div>
        <div class="ps-3" id="count">
          <h6>{{ $logYear->count() }}</h6>
        </div>
      </div>
    </div>

    <script>
      const count = document.getElementById('count')

      const today = document.getElementById('today')
      const month = document.getElementById('month')
      const year = document.getElementById('year')

      const textTitle = document.createElement('h6');

      // event click
      today.addEventListener('click', function (event) {
        count.innerHTML = '';

        textTitle.innerText = {{ Js::from($logDay->count()) }};  
        count.append(textTitle)
      });

      month.addEventListener('click', function (event) {
        count.innerHTML = '';

        textTitle.innerText = {{ Js::from($logMonth->count()) }};  
        count.append(textTitle)
      });

      year.addEventListener('click', function (event) {
        count.innerHTML = '';

        textTitle.innerText = {{ Js::from($logYear->count()) }};  
        count.append(textTitle)
      });


      
    </script>
  </div>
</div>