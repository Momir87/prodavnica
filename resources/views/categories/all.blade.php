@extends('dashboard.dashboard')

@section('dashboard-content')
<h4>Proizvodi</h4>
  <a href="{{route('admin.createCategory')}}" class="btn btn-success my-3">Dodaj Kategoriju</a>
  <table class="table table-striped table-responsive-sm">

    <thead>
      <tr>
        <th>ID</th>
        <th>Naziv</th>
        <th>Slika</th>
        <th>Akcija</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr>
          <td>
              {{$category->id}}
          </td>
          <td>
            {{$category->category_name}}
          </td>
          <td>
            <div class="">
              <img src="storage/categories_cover/{{$category->category_img}}" style="height: 4rem" alt="{{$category->category_img}}" >
            </div>
          </td>
            <td class="pl-5">
            <div class="dropdown dropdown-action">
              <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('admin.editCategory', ['id'=>$category->id]) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item" href="{{ route('admin.deleteCategory', ['id'=>$category->id]) }}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
              </div>
            </div>
          </td>
      </tr>
      @endforeach
    </tbody>

  </table>


@endsection
