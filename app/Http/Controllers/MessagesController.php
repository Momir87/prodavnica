<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Subscribe;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('admin',['except' => ['store', 'subscribe']]);
     }

     //prikaz poruka
    public function showMessages()
    {
      $messages = Messages::orderBy('created_at', 'desc')->paginate(10);
      return view('admin.messages',['paginate' => $messages])->with('messages', $messages);
    }

    //prikaz pretplata
   public function showSubscribe()
   {
     $subscriptions = Subscribe::orderBy('created_at', 'desc')->paginate(10);
     return view('admin.subscribe', ['paginate' => $subscriptions])->with('subscriptions', $subscriptions);
   }

     //kreiranje poruke
    public function store(Request $request)
    {

      $this->validate($request, [
        'Ime' => 'required|regex:/^[a-zA-Z -]{2,32}$/',
        'Email' => 'required|email',
        'Telefon' => 'required|regex:/^0\d\d\/\d{3}-\d{3,4}$/',
        'Poruka' => 'required|regex:/^[\w -.,?!]{0,500}$/i'
      ]);

      $message = new Messages;
      $message->name = $request->input('Ime');
      $message->email = $request->input('Email');
      $message->phone = $request->input('Telefon');
      $message->message = $request->input('Poruka');

      $message->save();

        return back()->with('success', 'Poruka je uspesno poslata.');
    }
//kreirane pretplate
    public function subscribe(Request $request)
    {

      $this->validate($request, [
        'email' => 'required|email'
      ]);

      $subscribe = new Subscribe;
      $subscribe->email = $request->input('email');
      $subscribe->save();

        return back()->with('success', 'Uspesno ste se pretplatili!');
    }
    //brisanje pretplate
    public function deleteSubscribe($id)
    {
      $subscribe = Subscribe::find($id);
      $subscribe->delete();
      return back()->with('success', 'Zapis je uspesno uklonjen');
    }

     // brisanje poruke
    public function destroy($id)
    {
      $message = Messages::find($id);
      $message->delete();
      return back()->with('success', 'Poruka je uspesno obrisana.');
    }
}
