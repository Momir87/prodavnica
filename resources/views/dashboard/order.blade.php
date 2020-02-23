@extends('dashboard.dashboard')

@section('dashboard-content')

  <!-- kreiranje porudžbine -->

    <h4>Vaša porudžbina</h4>
    <table id="cart" class="table table-striped table-hover table-condensed mb-5 table-responsive-sm">
        <thead>
        <tr>
          <th style="width:50%">Proizvod</th>
          <th style="width:10%">Cena (Rsd)</th>
          <th style="width:10%">Količina</th>
          <th style="width:20%" class="text-center">Zbir (Rsd)</th>
          <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        @foreach(Cart::getContent() as $product)
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $product->name }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{number_format($product->price, 2, ',', '.')}}</td>
                    <td data-th="Quantity">
                      <a class="btn btn-success btn-sm" href="{{route('cart.updateDec', ['id'=>$product->id])}}"><i class="fas fa-minus"></i></a>
                      <span class="h5">{{ $product->quantity}}</span>
                      <a class="btn btn-success btn-sm" href="{{route('cart.updateInc', ['id'=>$product->id])}}"><i class="fas fa-plus"></i></a>
                    </td>
                    <td data-th="Subtotal" class="text-center">{{number_format($product->price * $product->quantity, 2, ',', '.')}}</td>
                    <td class="actions" data-th="">
                        <a class="btn btn-danger btn-sm" href="{{route('cart.remove', ['id'=>$product->id])}}"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="">

        <tr >
            <td><a  href="{{ url('/categories') }}" class="mt-3 btn btn-primary">Nastavi kupovinu</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Ukupno: {{number_format(Cart::getSubTotal(), 2, ',', '.')}} Rsd</strong></td>
          <td>
            @if(Cart::getSubTotal())
            {!! Form::open(['action' => 'HomeController@order', 'method' => 'get']) !!}
                {{ Form::submit('Kreiraj porudžbinu', ['class' => 'mt-3 btn btn-success']) }}

            {!! Form::close() !!}

            @endif
          </td>
        </tr>
        </tfoot>
    </table>
@endsection
