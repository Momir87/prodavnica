@extends('layouts.app')


@section('content')

<!-- displaying actions, promotions etc. -->
<header>
  <div id="carouselSlides" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
          <img src="img/1.jpg" class="d-block w-100 img-fluid"  alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/2.jpg" class="d-block w-100 img-fluid"  alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/3.jpg" class="d-block w-100 img-fluid"  alt="...">
      </div>
    </div>
  </div>
</header>


<!-- displaying random product -->

<section class="mb-5 p-5">
<div class="container">
  <h2 class="text-center mb-5 text-uppercase display-4">Popularni proizvodi</h2>
  <div class="row">

    @foreach($products as $product)
    <div class="col-sm-6 col-md-3 p-3 ">
      <div class="card h-100">
        <div style="height: 15rem" class="d-flex align-items-center">
          <img src="storage/product_images/{{$product->category_id}}/{{ $product->product_img}}" class="p-3 img-fluid mh-100 d-block mx-auto"  alt="{{ $product->product_img}}">
        </div>
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">{{ $product->product_name}}</h5>
          <div class="align-items-end mt-auto">

          <p class="py-2">Cena: {{number_format($product->price, 2, ',', '.')}} Rsd</p>

          <a href="{{route('products.show', ['id' => $product->id])}}" class="btn btn-primary mb-1 ">Pogledaj proizvod</a>

          <form method="POST" action="{{route('cart.add')}}" class="form-inline my-2 my-lg-0" >
              @csrf
              <input name="id" type="hidden" value="{{$product->id}}">
              <input class="btn btn-success " type="submit" value="Dodaj u korpu"/>
          </form>

          </div>

        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>
</section>


<section class="my-5 p-5 section_policy">

<div class="container">
<div class="row">

  <div class="col-lg-4 icon_box_col py-4">
    <div class="icon_box">
      <div class="icon_box_image"><img class="img-fluid" src="img/icon/icon_1.svg" alt=""></div>
        <div class="icon_box_title">Besplatna isporuka</div>
        <div class="icon_box_text">
          <p>Besplatna isporuka u za celu državu</p>
        </div>
    </div>
  </div>

  <div class="col-lg-4 icon_box_col py-4">
    <div class="icon_box">
      <div class="icon_box_image "><img class="img-fluid" src="img/icon/icon_2.svg" alt=""></div>
        <div class="icon_box_title">100% povraćaj novca</div>
        <div class="icon_box_text">
          <p>Garantovano vraćamo novac ako niste zadovoljni proizvodom</p>
        </div>
    </div>
  </div>

  <div class="col-lg-4 icon_box_col py-4">
    <div class="icon_box">
      <div class="icon_box_image"><img class="img-fluid" src="img/icon/icon_3.svg" alt=""></div>
        <div class="icon_box_title">24/7 podrška</div>
        <div class="icon_box_text">
          <p>Dostupni smo 24/7 za sva Vaša pitanja</p>
        </div>
    </div>
  </div>


</div>
</div>
</section>

@endsection
