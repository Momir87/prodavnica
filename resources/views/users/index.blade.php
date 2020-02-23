@extends('dashboard.dashboard')

@section('dashboard-content')
<h4>Korisnici</h4>

    <div class="my-3 float-right">
    Sortiraj po:
    <select name="sort" onchange="location = this.value;">
      <option disabled selected>--izaberi--</option>
      <option value="{{route('admin.users', [ 'p'=>'name', 's'=>'asc'])}}" {{ (request()->p == 'name' && request()->s == 'asc') ? 'selected' : '' }}>Imenu &uarr;</option>
      <option value="{{route('admin.users', [ 'p'=>'name', 's'=>'desc'])}}" {{ (request()->p == 'name' && request()->s == 'desc') ? 'selected' : '' }}>Imenu &darr;</option>
    </select>
  </div>
  <div class="my-3">
    <form class="" action="{{route('admin.users', [ 'p'=>'', 's'=>'', 'q'=>''])}}" method="get">
      @csrf
      <input type="text" name="q" value="">
      <input type="submit" value="Traži">
    </form>
  </div>

  <table class="table table-striped table-responsive-sm">

    <thead>
      <tr>
        <th style="width:10%">ID</th>
        <th style="width:20%">Ime</th>
        <th style="width:15%">E-mail</th>
        <th style="width:15%">Telefon</th>
        <th style="width:17%">Adresa</th>
        <th style="width:13%">Uloga</th>
        <th style="width:10%">Akcija</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
          <td>
              {{$user->id}}
          </td>
          <td>
            {{$user->name}}
          </td>
          <td>
            {{$user->email}}
          </td>
          <td>
            {{$user->phone}}
          </td>
          <td>
            {{$user->address}}
          </td>
          <td>
              @if($user->is_admin)
                ADMIN
              @else
                KORISNIK
              @endif
            </select>
          </td>

            <td class="pl-5">
            <div class="dropdown dropdown-action">
              <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{route('admin.editUser', ['id'=>$user->id])}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                <a class="dropdown-item" href="{{ route('admin.deleteUser', ['id'=>$user->id])}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
              </div>
            </div>
          </td>
      </tr>
      @endforeach
    </tbody>

  </table>
@endsection
