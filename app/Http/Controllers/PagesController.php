<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex() {
      $products = Product::inRandomOrder()->distinct()->limit(8)->get();
      return view('index')->with('products', $products);
    }

    public function getAbout() {
    return view('about');
    }

    public function getContact() {
    return view('contact');
    }

    public function search(Request $request)
    {
      if($request->ajax())
      {
        $output="";
        $products=Product::where('product_name','LIKE','%'.$request->search."%")->get();
        if($products)
        {
          foreach ($products as $key => $product) {
            $output.='<a class="text-dark  d-inline" href="products/'.$product->id.'"><h5>'.$product->product_name. ' </h5><img src="storage/product_images/'.$product->category_id.'/'.$product->product_img.'" class=" p-3 img-fluid img-fluid d-block mx-auto" style="height: 6rem"> </a>';
        }
      return Response($output);
       }
       }
    }


}
