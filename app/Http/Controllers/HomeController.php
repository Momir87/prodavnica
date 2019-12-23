<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Mail;
use Cart;
use Auth;
use App\Bill;
use App\Category;
use App\Order;
use App\Product;
Use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      return view('dashboard.dashboard');
    }

    public function orderShow()
    {
      return view('dashboard.order');
    }

    //azuriranje profila
    public function editProfile(){

      $user = User::find(auth()->user()->id);

      return view('dashboard.profile')->with('user',$user);
    }

    public function update(Request $request)
    {
      //validuj polja i dodaj deo za sifru
      $this->validate($request, [
        'name' => 'required|regex:/^[a-zA-Z -]{2,32}$/',
        'email' => 'required|email',
        'phone' => 'regex:/^0\d\d\/\d{3}-\d{3,4}$/',
        'address' => 'nullable|regex:/^[\w -.,?!]{0,40}$/',
        'new_password' => 'nullable|regex:/^[\w -.,?#$&!]{3,20}$/',
        'new_password_confirm' => 'same:new_password'
      ]);
        $user = User::find(auth()->user()->id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        if($request->input('new_password')){
          $user->password = Hash::make($request->input('new_password'));
        }

        $user->save();

        return back()->with('success', 'Profil je uspesno azuriran.');
    }

    //cuvanje korpe
    public function order()
    {
        $bill = new Bill;
        $bill->bill_total = Cart::getSubTotal();
        $bill->user_id = auth()->user()->id;
        $bill->save();


        $cart = Cart::getContent();
        foreach ($cart as $product) {
          $order = new Order;
          $order->user_id = auth()->user()->id;
          $order->product_id = $product->id;
          $order->bill_id = $bill->id;
          $order->quantity = $product->quantity;
          $order->total_price = $product->price * $product->quantity;

        $order->save();
        }
        Cart::clear();

        Mail::to(Auth::user()->email)->send(new OrderShipped());

        return back()->with('success', 'Porudžbina je uspesno kreirana!');
    }

    // status porudžbine
    public function orderStatus(){

       $orders = Order::with('product')->where('user_id', auth()->user()->id)->get();

       $bills = Bill::where('user_id',auth()->user()->id)->get();

      return view('dashboard.bill')->with('racun',['orders'=>$orders, 'bills'=>$bills]);

   }





}
