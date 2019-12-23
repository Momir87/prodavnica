@extends('dashboard.dashboard')

@section('dashboard-content')
  <h4>Kreiranje proizvoda</h4><hr>

    <form class="" action="{{ route('admin.saveProduct')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="product_name">Naziv</label>
                      <input type="text" class="form-control" name="product_name" value="">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="category_id">Kategorija</label>
                      <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="product_description">Opis proizvoda</label>
                    <textarea type="text" class="form-control" name="product_description" rows="8" cols="80"></textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="product_quantity">Količina</label>
                      <input type="number" class="form-control" name="product_quantity" value="">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="price">Cena</label>
                        <input type="text" class="form-control" name="price" value="">
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="product_img">Slika proizvoda</label>
                      <input type="file" class="form-control" name="product_img">
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="">&nbsp;</label>
                    <div class="form-group">
                      <input type="Submit" type="button" class="form-control btn btn-primary" value="Kreiraj Proizvod">
                    </div>
                </div>
              </div>

    </form>

@endsection
