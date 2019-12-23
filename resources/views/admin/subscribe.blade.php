@extends('dashboard.dashboard')

@section('dashboard-content')
<h4>Pretplate</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th style="width:10%">ID</th>
      <th style="width:70%">Email</th>
      <th style="width:10%"></th>
      </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($subscriptions as $subscribe)
        <td>
          {{$subscribe->id}}
        </td>
        <td>
          {{$subscribe->email}}
        </td>

        <td>
          <div class="form-group">
            <a href="{{route('admin.deleteSubscribe', ['id'=>$subscribe->id])}}" class=" btn btn-danger" type="button"><i class="fa fa-trash-o m-r-5"></i> Obriši</a>
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
