@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
      @include('inc.sidebar')
    <div class="col-md-10 px-5">
      <?php  $user = auth()->user(); ?>
      <h2 class="my-5">Dobrodošli {{$user->name}}</h2>
      @yield('dashboard-content')

    </div>
  </div>
</div>

@endsection
