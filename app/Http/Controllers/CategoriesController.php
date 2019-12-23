<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // zabranio sam sve osim index (contacts.blade) i show (showcontact.blade) strane
    public function __construct()
    {
      $this->middleware('auth', ['except' => ['index', 'show']]);
}

    //prikaz kategorija
    public function index()
    {
        $categories = Category::with('product')->get();
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     //admin kategorije
     public function categoriesAll()
     {
         $categories = Category::get();
         return view('categories.all')->with('categories', $categories);
     }
    //kreiranje kategorije

    public function create()
    {
      return view('categories.create');
    }

    //prikaz svih proizvoda u kategoriji
    public function show($id){
      
      $p = request()->p;
      $s = request()->s;

      if($p && $s) {
        $category = Category::join('products', 'categories.id', '=', 'products.category_id')
                              ->where('category_id', $id)->orderBy($p, $s)->paginate(8);
    }
      else {
        $category = Category::join('products', 'categories.id', '=', 'products.category_id')
                              ->where('category_id', $id)->paginate(8);
      }

      return view('products.index',['paginate' => $category])->with('category', $category);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
      'category_name' => 'required',
      'category_img' => 'image|max:1999'
      ]);
      $filenameWithExt = $request->file('category_img')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('category_img')->getClientOriginalExtension();
      $filenameToStore = $filename . '_' . time() . '.' . $extension;
      $path = $request->file('category_img')->storeAs('public/categories_cover', $filenameToStore);

      $category = new Category;
      $category->category_name = $request->input('category_name');
      $category->category_img = $filenameToStore;

      $category->save();

      return back()->with('success', 'Kategorija je uspesno kreirana!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //prikazivanje kategorija
    // public function show($id)
    // {
    //   $category = Category::with('product')->find($id);
    //   return view('categories.show')->with('category', $category);
    //
    //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $category = Category::find($id);
      return view('categories.edit')->with('category', $category);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $this->validate($request, [
      'category_name' => 'required',
      //'category_img' => 'image|max:1999'
      ]);
      if($request->category_img){
      $filenameWithExt = $request->file('category_img')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('category_img')->getClientOriginalExtension();
      $filenameToStore = $filename . '_' . time() . '.' . $extension;
      $path = $request->file('category_img')->storeAs('public/categories_covers', $filenameToStore);
    }
      else {
        $filenameToStore = $request->img_path;
      }

      $category = Category::find($request->id);
      $category->category_name = $request->input('category_name');
      $category->category_img = $filenameToStore;

      $category->save();

      return back()->with('success', 'Kategorija je uspesno ažurirana!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id){

       $category = Category::find($id);

       if(Storage::delete('public/categories_cover/'.$category->category_img)){
           Storage::delete('public/product_images/'.$category->category_id);

           $category->delete();
         return back()->with('success', 'Kategorija je uspesno obrisana!');
       }
     }
}
