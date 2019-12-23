@extends('dashboard.dashboard')

@section('dashboard-content')
  <h4>Kreiranje Kategorije</h4><hr>

    <form class="" action="{{ route('admin.saveCategory')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="category_name">Naziv</label>
                      <input type="text" class="form-control" name="category_name" value="">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="category_img">Slika kategorije</label>
                      <input type="file" class="form-control" name="category_img">
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="">&nbsp;</label>
                    <div class="form-group">
                      <input type="Submit" type="button" class="form-control btn btn-primary" value="Kreiraj Kategoriju">
                    </div>
                </div>
              </div>

    </form>

@endsection
