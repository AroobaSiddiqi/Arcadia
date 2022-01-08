<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AllProductController extends Controller{

public function displayProducts(Request $request){
    //DISPLAY PRODUCTS IN BEST SELLING ORDER

    $products = DB::select('select * from products');  //get all the products
    //run a query for best selling products
    $products=DB::table('products')->orderBy('sold','desc')->get();
    return view('allProducts',['products'=>$products]);

}

public function sort(Request $request)
{
     switch ($request->sort)
     {
         case "asc":
         $sort=$request->sort;
         $products=DB::table('products')->orderBy('price','asc')->get();
         return view('allProducts',['products'=>$products]);
         break;

         case "desc":
         $products=DB::table('products')->orderBy('price','desc')->get();
         return view('allProducts',['products'=>$products]);
         break;

         default:
         $view = AllProductController::displayProducts($request);
         return $view;
         break;
     }

     return AllProductController::displayProducts($request);  
}


}

