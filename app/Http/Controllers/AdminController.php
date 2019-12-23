<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Mail\OrderAccepted;
use Mail;
use Cart;
use App\Bill;
use App\Category;
use App\Order;
use App\Product;
Use App\User;
Use App\Messages;
use App\Subscribe;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    //prikaz registrovanij korisnika sa sortiranjem i pretragom
    public function index(){

      $q = request()->q;
      $p = request()->p;
      $s = request()->s;

      if($p && $s) {
      $users = User::orderBy($p, $s)->paginate(10);
    }
      else {
        if( $q ){
          $users=User::query()
                ->where('name', 'LIKE', "%{$q}%")
                ->orWhere('email', 'LIKE', "%{$q}%")
                ->paginate(10);
        }
        else
        {
        $users = User::paginate(10);
      }
      }
      return view('users.index', ['paginate' => $users])->with('users', $users);
    }

    //prikaz korisnika
    public function userEdit($id){

      $user = User::findOrFail($id);

      return view('users.edit')->with('user', $user);
    }
    //azuriranje korisnika
    public function updateUser(Request $request){

      //validuj polja i dodaj deo za sifru
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => '',
        'address' => '',
        'new_password_confirm' => 'same:new_password'
      ]);
        $user = User::findOrFail($request->id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        if($request->input('new_password')){
          $user->password = Hash::make($request->input('new_password'));
        }
        $user->is_admin = $request->input('is_admin');

        $user->save();

      return back()->with('success', 'Profil je uspesno azuriran.');
    }

    //promena stanja racuna
    public function updateBill(Request $request, $id){

      $bill = Bill::find($id);
    }
    // brisanje racuna
    public function deleteBill($id){

      $bill = Bill::find($id);
      $bill->delete();
      return back()->with('success', 'Porudžbina je uspesno obrisana.');
    }

    //brisanje korisnika
    public function deleteUser($id){

      $user = User::findOrFail($id);
      $user->delete();

      return back()->with('success', 'Korisnik je uspesno obrisan!');
    }


    //porudzbine
    public function orders(){

      $orders = Order::with('product')->get();

      $bills = Bill::with('user')->orderBy('created_at', 'desc')->get();

     return view('orders.all')->with('racun',['orders'=>$orders, 'bills'=>$bills]);

   }
   //odobrenje porudžbine
    public function acceptOrder($id){

        $bill = Bill::findOrFail($id);
        $bill->status = 1;
        $bill->save();

        $orders = Order::where('bill_id', $id)->get();

        foreach ($orders as $order) {

          $product = Product::find($order->product_id);
          $product->product_quantity = $product->product_quantity - $order->quantity ;

          $product->save();
        }
      

        Mail::to(User::findOrFail($bill->user_id)->email)->send(new OrderAccepted());

      return back()->with('success', 'Porudžbina je prihvaćena!');
    }

    //brisanje porudžbine
    public function deleteOrder($id){

      $bill = Bill::findOrFail($id);
      $orders = Order::where('bill_id', $id)->get();

      foreach ($orders as $order) {
        $order->delete();
      }

      $bill->delete();

      return back()->with('success', 'Porudžbina je uspesno obrisana!');
    }



}
