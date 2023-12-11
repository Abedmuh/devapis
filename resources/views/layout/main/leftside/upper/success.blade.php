<!-- Customers Card -->
<div class="col-md-4">
  <div class="card info-card customers-card">
    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li id="todaySuccess"><a class="dropdown-item" href="#">Today</a></li>
        <li id="monthSuccess"><a class="dropdown-item" href="#">This Month</a></li>
        <li id="yearSuccess"><a class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Success Request<span>| This Year</span></h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-people"></i>
        </div>
        <div class="ps-3" id="countSuccess">
          <h6>{{ $logYear->where('code',200)->count() }}</h6>
        </div>
      </div>
    </div>

    <script>
      const countSuccess = document.getElementById('countSuccess')

      const todaySuccess = document.getElementById('todaySuccess')
      const monthSuccess = document.getElementById('monthSuccess')
      const yearSuccess = document.getElementById('yearSuccess')

      const textTitle3 = document.createElement('h6');

      // event click
      todaySuccess.addEventListener('click', function (event) {
        countSuccess.innerHTML = '';

        textTitle3.innerText = {{ Js::from($logDay->where('code',200)->count()) }};  
        countSuccess.append(textTitle3)
      });

      monthSuccess.addEventListener('click', function (event) {
        countSuccess.innerHTML = '';

        textTitle3.innerText = {{ Js::from($logMonth->where('code',200)->count()) }};  
        countSuccess.append(textTitle3)
      });

      yearSuccess.addEventListener('click', function (event) {
        countSuccess.innerHTML = '';

        textTitle3.innerText = {{ Js::from($logYear->where('code',200)->count()) }};  
        countSuccess.append(textTitle3)
      });
      
    </script>
  </div>
</div>
<!-- End Customers Card -->