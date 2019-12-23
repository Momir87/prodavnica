@extends('dashboard.dashboard')

@section('dashboard-content')
<h4>Status porudžbina</h4>
  @if(count($racun['bills'])>0)
  <table class="table table-striped">
    <thead>
      <tr>
        <th style="width:10%">Broj računa</th>
        <th style="width:13%">Datum</th>
        <th style="width:45%">Artikli</th>
        <th style="width:15%">Ukupno (Rsd)</th>
        <th style="width:12%">Status</th>
      </tr>
    </thead>


    @foreach($racun['bills'] as $bill)
    <tr>
      <td>{{$bill->id}}</td>
      <td>{{$bill->created_at}}</td>
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
    </tr>
  @endforeach

</table>


@else
  <p>Jos uvek nemate ni jednu porudžbinu!</p>
@endif
@endsection
