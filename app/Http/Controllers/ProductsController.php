<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Product;
use App\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
     {
       $this->middleware('admin', ['except' => ['show']]);
 }
    //prikaz proizvoda sa pretraga i sortiranje
     public function productsAll()
     {

       $q = request()->q;
       $p = request()->p;
       $s = request()->s;

       if($p && $s) {
       $products = Product::orderBy($p, $s)->paginate(10);
     }
       else {
         if( $q ){
           $products = Product::query()
                 ->where('product_name', 'LIKE', "%{$q}%")
                 ->orWhere('price', 'LIKE', "%{$q}%")
                 ->orWhere('product_quantity', 'LIKE', "%{$q}%")
                 ->paginate(10);
         }
         else
         {
         $products = Product::paginate(10);
       }
       }

       return view('products.all',['paginate' => $products])->with('products', $products);
     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     //kreiranje proizvoda
     public function create() {

       $categories = Category::get();

       return view('products.create')->with('categories', $categories);
 }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //cuvanje novokreiranog proizvoda
    public function store(Request $request)
    {
      $this->validate($request, [
        'product_name' => 'required',
        'category_id' => 'required',
        'product_description' => 'required',
        'product_img' => 'required|image|max:1999',
        'product_quantity' => 'required',
        'price' => 'required',
      ]);
      $filenameWithExt = $request->file('product_img')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('product_img')->getClientOriginalExtension();
      $filenameToStore = $filename  . '.' . $extension;
      $path = $request->file('product_img')->storeAs('public/product_images/'.$request->input('category_id'), $filenameToStore);

      $product = new Product;
      $product->category_id = $request->input('category_id');
      $product->product_name = $request->input('product_name');
      $product->product_description = $request->input('product_description');
      $product->product_img = $filenameToStore;
      $product->product_quantity = $request->input('product_quantity');;
      $product->price = $request->input('price');;

      $product->save();

      return back()->with('success', 'Proizvod je uspesno kreiran!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //prkazivanje odredjenog proizvoda
    public function show($id)
    {

      $product = Product::find($id);
      return view('products.show')->with('product', $product);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //editovanje proizvoda
    public function edit($id)
    {
      $product = Product::findOrFail($id);
      $categories = Category::get();

      return view('products.edit')->with(['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //cuvanje izmena
    public function update(Request $request)
    {
      $this->validate($request, [
        'product_name' => 'required',
        'category_id' => 'required',
        'product_description' => 'required',
        //'product_img' => 'required|image|max:1999',
        'product_quantity' => 'required',
        'price' => 'required',
      ]);
      if($request->product_img){
      $filenameWithExt = $request->file('product_img')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('product_img')->getClientOriginalExtension();
      $filenameToStore = $filename . '.' . $extension;
      $path = $request->file('product_img')->storeAs('public/product_images/'.$request->input('category_id'), $filenameToStore);
      }
      else {
        $filenameToStore = $request->img_path;
      }
      $product = Product::find($request->id);
      $product->category_id = $request->input('category_id');
      $product->product_name = $request->input('product_name');
      $product->product_description = $request->input('product_description');
      $product->product_img = $filenameToStore;
      $product->product_quantity = $request->input('product_quantity');
      $product->price = $request->input('price');

      $product->save();

      return back()->with('success', 'Artikal je uspesno azuriran!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = Product::find($id);

      if(Storage::delete('public/product_images/'.$product->category_id.'/'.$product->product_img)){
      $product->delete();
      return back()->with('success', 'Proizvod je uspesno obrisan!');
    }
}
}
