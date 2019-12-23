<?php

namespace App\Http\Controllers;

use Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request){
        $product = Product::find($request->id);

        Cart::add($product->id, $product->product_name, $product->price, 1, array());

        return back()->with('success',"$product->product_name je uspesno dodat u korpu!");
    }

    public function cart(){
        $params = [
            'title' => 'Shopping Cart Checkout',
        ];

        return view('cart')->with($params);
    }

    public function updateInc($id){

      Cart::update($id, array(
          'quantity' => 1, ));
      return back()->with('success',"Korpa je azurirana!");
    }

    public function updateDec($id){

      Cart::update($id, array(
        'quantity' => -1, ));
      return back()->with('success',"Korpa je azurirana!");
    }

    public function remove($id){

      Cart::remove($id);
      return back()->with('success',"Artikal je uspesno uklonjen!");

    }

    public function clear(){
        Cart::clear();

        return back()->with('success',"Korpa je uspešno ispražnjena!");
    }
}
