@extends('dashboard.dashboard')

@section('dashboard-content')
  <h4>Ažuriraj Kategoriju</h4><hr>

    <form class="" action="{{ route('admin.updateCategory')}}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="text" name="id" value="{{ $category->id}}" hidden>
      <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="category_name">Naziv</label>
                      <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="category_img">Slika kategorije</label>
                      <!-- <img src="/storage/categories_cover/{{$category->category_img}}" style="height: 15rem" alt="{{$category->category_img}}">                     -->
                      <input type="file" class="form-control" name="category_img">
                      <input type="text" name="img_path" value="{{ $category->category_img }}" hidden>
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="">&nbsp;</label>
                    <div class="form-group">
                      <input type="Submit" type="button" class="form-control btn btn-primary" value="Ažuriraj Kategoriju">
                    </div>
                </div>
              </div>

    </form>

@endsection
