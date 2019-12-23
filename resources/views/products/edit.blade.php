@extends('dashboard.dashboard')

@section('dashboard-content')
  <h4>Ažuriranje proizvoda</h4><hr>

    <form class="" action="{{ route('admin.updateProduct')}}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="text" name="id" value="{{$product->id}}" hidden>
      <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="product_name">Naziv</label>
                      <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="category_id">Kategorija</label>
                      <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                          @if($product->category_id == $category->id)
                            <option value="{{$category->id}}" selected>{{$category->category_name}}</option>
                          @else
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="product_description">Opis proizvoda</label>
                    <textarea type="text" class="form-control" name="product_description" rows="8" cols="80">{{ $product->product_description}}</textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="product_quantity">Količina</label>
                      <input type="number" class="form-control" name="product_quantity" value="{{ $product->product_quantity }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="price">Cena</label>
                        <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="product_img">Slika proizvda</label>
                      <input type="file" class="form-control" name="product_img">
                      <input type="text" name="img_path" value="{{ $product->product_img }}" hidden>
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="">&nbsp;</label>
                    <div class="form-group">
                      <input type="Submit" type="button" class="form-control btn btn-primary" value="Sačuvaj Izmene">
                    </div>
                </div>
              </div>

    </form>

@endsection
