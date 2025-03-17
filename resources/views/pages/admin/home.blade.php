@extends('layouts.admin.app_admin')

@section('title', 'Home')

@section('content')
  <!-- [ breadcrumb ] start -->
  <div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="page-header-title">
            <h5 class="m-b-10">Home</h5>
          </div>
          <ul class="breadcrumb"> 
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            {{-- <li class="breadcrumb-item" aria-current="page">Dashboard</li> --}}
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- [ breadcrumb ] end -->

  <!-- [ Main Content ] start -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h5>Welcome to the Home Page</h5>
        </div>
        <div class="card-body">
          <p>Your content goes here.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->
@endsection