@extends('layouts.app')

@section('content')
<div class="container">
        @if(count($category)>0)

        <h1 class="mt-5">{{$category[0]->category_name}}</h1>
        <div class="d-flex justify-content-between">
          <a href="/categories" class="btn btn-primary my-3">Nazad</a>

          <div class="my-3">
          Sortiraj po:
          <select name="sort" onchange="location = this.value;">
            <option disabled selected>--izaberi--</option>
            <option value="{{route('categories.products', [ 'id'=>$category[0]->category_id, 'p'=>'product_name', 's'=>'asc'])}}" {{ (request()->p == 'product_name' && request()->s == 'asc') ? 'selected' : '' }}>Nazivu &uarr;</option>
            <option value="{{route('categories.products', [ 'id'=>$category[0]->category_id, 'p'=>'product_name', 's'=>'desc'])}}" {{ (request()->p == 'product_name' && request()->s == 'desc') ? 'selected' : '' }}>Nazivu &darr;</option>

            <option value="{{route('categories.products', [ 'id'=>$category[0]->category_id, 'p'=>'price', 's'=>'asc'])}}" {{ (request()->p == 'price' && request()->s == 'asc') ? 'selected' : '' }}>Ceni &uarr;</option>
            <option value="{{route('categories.products', [ 'id'=>$category[0]->category_id, 'p'=>'price', 's'=>'desc'])}}" {{ (request()->p == 'price' && request()->s == 'desc') ? 'selected' : '' }}>Ceni &darr;</option>
          </select>

          </div>
        </div>
        <div class="row">
<!-- prikaz kategorija -->
        @foreach($category as $product)
        <div class="col-sm-6 col-md-3 p-3 ">
          <div class="card h-100">
            <div class="d-flex align-items-center" style="height: 15rem">
              <img src="/storage/product_images/{{$product->category_id}}/{{ $product->product_img }}" class="p-3 img-fluid d-block mh-100 mx-auto"  alt="{{ $product->product_img}}">
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
    <!-- paginacija -->
    <div class="d-flex flex-row-reverse py-5">
      {{ $paginate->links() }}
    </div>
    @else

    <h1 class="my-5">Trenutno nema proizvoda u ovoj kategoriji</h1>

    <a href="/categories" class="btn btn-primary mb-3">Nazad</a>
    @endif
</div>
@endsection
