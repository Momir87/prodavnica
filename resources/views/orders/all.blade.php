@extends('dashboard.dashboard')

@section('dashboard-content')
<h4>Status porudžbina</h4>
  @if(count($racun['bills'])>0)
  <table class="table table-striped">
    <thead>
      <tr>
        <th style="width:10%">Broj računa</th>
        <th style="width:13%">Datum</th>
        <th style="width:15%">Kupac</th>
        <th style="width:30%">Artikli</th>
        <th style="width:15%">Ukupno (Rsd)</th>
        <th style="width:12%">Status</th>
        <th>Akcija</th>
      </tr>
    </thead>


    @foreach($racun['bills'] as $bill)
    <tr>

      <td>{{$bill->id}}</td>
      <td>{{$bill->created_at}}</td>
      <td>{{$bill['user']['name']}} </td>
      <td>
        @foreach($racun['orders'] as $orders)
          @if($orders->bill_id == $bill->id)
            {{$orders->quantity}} x {{$orders->product['product_name']}} <br>
          @endif
        @endforeach

      </td>

      <td>{{ number_format($bill->bill_total, 2, ',', '.') }}</td>
      <td>
        @if($bill->status == 1)
          Odobreno
        @else
          Na čekanju
        @endif
      </td>
      <td class="pl-5">
      <div class="dropdown dropdown-action">
        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="{{ route('admin.acceptOrder', ['id'=>$bill->id]) }}"><i class="fas fa-check-square m-r-5"></i> Prihvati</a>
          <a class="dropdown-item" href="{{ route('admin.deleteOrder', ['id'=>$bill->id]) }}"><i class="fa fa-trash-o m-r-5"></i> Obriši</a>
        </div>
      </div>
    </td>
    </tr>
  @endforeach

</table>


@else
  <p>Jos uvek nemate ni jednu porudžbinu!</p>
@endif
@endsection
