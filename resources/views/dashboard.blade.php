@extends('main')

@section('content')
<!-- Customers Card -->
@include('layout.main.leftside.upper.apicall')
<!-- End Customers Card -->

<!-- Revenue Card -->
@include('layout.main.leftside.upper.nullcard')
<!-- End Revenue Card -->

<!-- Sales Card -->
@include('layout.main.leftside.upper.success')
<!-- End Sales Card -->

<!-- Reports -->
@include('layout.main.leftside.timestamp')
<!-- End Reports -->

<!-- Top Route -->
@include('layout.main.leftside.toproute')
<!-- End Top Route -->

<!-- Top Selling -->
@include('layout.main.leftside.topuser')
<!-- End Top Selling -->
@endsection