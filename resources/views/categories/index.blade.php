@extends('layouts.app')

@section('content')
<div class="container py-5">
<!-- prikaz kategorija -->
  <h1 class="mb-md-3 ">Prodavnica</h1>
  <!-- <a href="/categories" class="btn btn-primary mb-3">Nazad</a> -->
  <div class="row">
    @foreach($categories as $category)

      <div class="col-sm-6 col-md-4 pt-5">
        <div class="card p-3">
          <img src="storage/categories_cover/{{$category->category_img}}" style="height: 15rem" alt="{{$category->category_img}}">
          <div class="caption">
            <a href="categories/{{$category->id}}" class="stretched-link"> <h3 class="mt-3 text-center text-dark">{{ $category->category_name}}</h3> </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

@endsection
