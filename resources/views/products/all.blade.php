@extends('dashboard.dashboard')

@section('dashboard-content')
<h4>Proizvodi</h4>

  <div class="d-flex justify-content-between">
    <a href="{{route('admin.createProduct')}}" class="btn btn-success my-3">Dodaj Proizvod</a>

    <div class="my-3">
      <form class="" action="{{route('admin.products', [ 'p'=>'', 's'=>'', 'q'=>''])}}" method="get">
        @csrf
        <div class="input-group">
          <input type="text" name="q" value="" class="form-control">
          <input type="submit" value="Traži" class="btn btn-primary">
        </div>
      </form>
    </div>
    <div class="my-3">
    Sortiraj po:
    <select name="sort" onchange="location = this.value;">
      <option disabled selected>--izaberi--</option>
      <option value="{{route('admin.products', [ 'p'=>'product_name', 's'=>'asc'])}}" {{ (request()->p == 'product_name' && request()->s == 'asc') ? 'selected' : '' }}>Nazivu &uarr;</option>
      <option value="{{route('admin.products', [ 'p'=>'product_name', 's'=>'desc'])}}" {{ (request()->p == 'product_name' && request()->s == 'desc') ? 'selected' : '' }}>Nazivu &darr;</option>

      <option value="{{route('admin.products', [ 'p'=>'price', 's'=>'asc'])}}" {{ (request()->p == 'price' && request()->s == 'asc') ? 'selected' : '' }}>Ceni &uarr;</option>
      <option value="{{route('admin.products', [ 'p'=>'price', 's'=>'desc'])}}" {{ (request()->p == 'price' && request()->s == 'desc') ? 'selected' : '' }}>Ceni &darr;</option>

      <option value="{{route('admin.products', [ 'p'=>'product_quantity', 's'=>'asc'])}}" {{ (request()->p == 'product_quantity' && request()->s == 'asc') ? 'selected' : '' }}>Količini &uarr;</option>
      <option value="{{route('admin.products', [ 'p'=>'product_quantity', 's'=>'desc'])}}" {{ (request()->p == 'product_quantity' && request()->s == 'desc') ? 'selected' : '' }}>Količini &darr;</option>
    </select>
    </div>
  </div>

  <table class="table table-striped">

    <thead>
      <tr>
        <th>ID</th>
        <th>Naziv</th>
        <th>Opis</th>
        <th>Kategorija</th>
        <th>Količina</th>
        <th>Cena</th>
        <th>Akcija</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
          <td>
              {{$product->id}}
          </td>
          <td>
            {{$product->product_name}}
          </td>
          <td>
            {{$product->product_description}}
          </td>
          <td>
            {{$product['category']->category_name}}
          </td>
          <td>
            {{$product->product_quantity}}
          </td>
          <td>
            {{number_format($product->price, 2, ',', '.')}}
          </td>

            <td class="pl-5">
            <div class="dropdown dropdown-action">
              <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('admin.editProduct', ['id'=>$product->id]) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item" href="{{ route('admin.deleteProduct', ['id'=>$product->id]) }}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
              </div>
            </div>
          </td>
      </tr>
      @endforeach
    </tbody>

  </table>

  <div class="d-flex flex-row-reverse py-5">
    {{ $paginate->links() }}
  </div>
@endsection
