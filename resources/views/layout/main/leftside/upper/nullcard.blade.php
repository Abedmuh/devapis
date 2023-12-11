<!-- Revenue Card -->
<div class="col-md-4">
  <div class="card info-card revenue-card">
    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li id="todayNull"><a class="dropdown-item" href="#">Today</a></li>
        <li id="monthNull"><a class="dropdown-item" href="#">This Month</a></li>
        <li id="yearNull"><a class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Null Exeption<span>| This Month</span></h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-currency-dollar"></i>
        </div>
        <div class="ps-3" id="countNull">
          <h6>{{ $logYear->where('code',null)->count() }}</h6>

        </div>
      </div>
    </div>
    <script>
      const countNull = document.getElementById('countNull')

      const todayNull = document.getElementById('todayNull')
      const monthNull = document.getElementById('monthNull')
      const yearNull = document.getElementById('yearNull')

      const textTitle2 = document.createElement('h6');

      // event click
      todayNull.addEventListener('click', function (event) {
        countNull.innerHTML = '';

        textTitle2.innerText = {{ Js::from($logDay->where('code',null)->count()) }};  
        countNull.append(textTitle2)
      });

      monthNull.addEventListener('click', function (event) {
        countNull.innerHTML = '';

        textTitle2.innerText = {{ Js::from($logMonth->where('code',null)->count()) }};  
        countNull.append(textTitle2)
      });

      yearNull.addEventListener('click', function (event) {
        countNull.innerHTML = '';

        textTitle2.innerText = {{ Js::from($logYear->where('code',null)->count()) }};  
        countNull.append(textTitle2)
      });
      
    </script>
  </div>
</div>
<!-- End Revenue Card -->