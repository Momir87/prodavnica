@extends('layouts.app')

@section('content')
<!-- prikaz proizvoda -->
<div class="container">
  <h1 class="mb-md-3 pt-5">{{$product->product_name}}</h1>
  <a href="/categories/{{$product->category_id}}" class="btn btn-primary mb-3">Nazad</a>
  <div class="row m-2">
    <div class="col-single-product col-md-9 col-md-push-3">
      <div class="row mb-5">
        <div class="col-sm-7 p-4 bg-white">
          <div class="py-3" style="height: 25rem">
            <img class="img-fluid d-block mh-100 mx-auto" src="/storage/product_images/{{$product->category_id}}/{{ $product->product_img}}"  alt="{{ $product->product_img}}" >
          </div>
        </div>
        <div class="col-sm-5 p-4">
          <h2>{{ $product->product_name}}</h2>
          <div class="py-3">
            Cena:
            <h3>{{number_format($product->price, 2, ',', '.')}} <small class="text-muted">Rsd</small> </h3>

          </div>
          <div class="py-3">
            <h5>Opis:</h5>
            {{ $product->product_description}}
          </div>
          <div class="py-3 ">
            <form method="POST" action="{{route('cart.add')}}" class="form-inline my-2 my-lg-0" >
                @csrf
                <input name="id" type="hidden" value="{{$product->id}}">
                <input class="btn btn-success " type="submit" value="Dodaj u korpu"/>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

  </div>

@endsection
