@extends('dashboard.dashboard')

@section('dashboard-content')
<h4>Poruke</h4>
<table class="table table-striped table-responsive-sm">
  <thead>
    <tr>
      <th style="width:10%">ID</th>
      <th style="width:15%">Ime</th>
      <th style="width:15%">Email</th>
      <th style="width:15%">Telefon</th>
      <th style="width:40%">Poruka</th>
      <th style="width:5%"></th>
      </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($messages as $message)
        <td>
          {{$message->id}}
        </td>
        <td>
          {{$message->name}}
        </td>
        <td>
          {{$message->email}}
        </td>
        <td>
          {{$message->phone}}
        </td>
        <td>
          {{$message->message}}
        </td>
        <td>
          <div class="form-group">
            <a href="{{route('admin.deleteMessage', ['id'=>$message->id])}}" class="form-control btn btn-sm btn-danger" type="button" name="Obrisi" ><i class="fa fa-trash-o m-r-5"></i></a>
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
