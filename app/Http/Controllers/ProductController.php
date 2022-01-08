<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

use DB;
use App\Models\UserProducts;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller{

 // protected $redirectTo='/viewCart';


   /**
     * Create a new user_products instance after a valid submission
     *
     * @param  array  $data
     * @return \App\Models\UserProducts
     */

     public function LipsItems(){
       $product = DB::table('products')->where('category','Lips')->get();
       return view('categoryproducts')->with('products',$product);
     }

     public function serums(){
      $product = DB::table('products')->where('category','Serums')->get();
      return view('categoryproducts')->with('products',$product);
    }

     public function FoundationItems(){
      $product = DB::table('products')->where('category','Foundation')->get();
      return view('categoryproducts')->with('products',$product);
    }

    public function concealers(){
      $product = DB::table('products')->where('category','Concealers')->get();
      return view('categoryproducts')->with('products',$product);
    }

    public function primers(){
      $product = DB::table('products')->where('category','Primers')->get();
      return view('categoryproducts')->with('products',$product);
    }

    public function highlighters(){
      $product = DB::table('products')->where('category','Highlighters')->get();
      return view('categoryproducts')->with('products',$product);
    }

    public function EyesItems(){
      $product = DB::table('products')->where('category','Eyes')->get();
      return view('categoryproducts')->with('products',$product);
    }
  

public function product($id){
  $product=DB::table('products')->where('product_id',$id)->first();
    return view('product')->with('product',$product);
}


}

