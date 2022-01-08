<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UserProducts;

class CartController extends Controller{

public function viewcart($id ,Request $request){

      $product=new UserProducts();
  $price=DB::table('products')->select('price')->where('product_id',$id)->first();
  $product->quantity= $request->input('quantity');
 
  $user_product=DB::table('user_products')->where('product_id',$id)->where('user_id',auth()->id())->first();

  if ($user_product==null){
    $total=$price->price*$product->quantity;
    DB::table('user_products')->insert([
    'user_id' => auth()->id(),
    'product_id' => $id,
    'quantity' => $product->quantity,
    'total'=> $total
  ]);
}
else{
  $quantity=DB::table('user_products')->select('quantity')->where('product_id',$id)->where('user_id',auth()->id())->first();
  $product->quantity+=$quantity->quantity; //add new quantity to previous quantity
  $total=$price->price*$product->quantity; //get total of the products
  DB::table('user_products')->where('product_id',$id)->where('user_id',auth()->id())->update(['quantity'=>$product->quantity, 'total'=>$total]);

}

  $productinfo=DB::table('products')->join('user_products',function ($join){
    $join->on('products.product_id','=','user_products.product_id')
    ->where('user_id','=',auth()->id());
   })->get();

  return view('viewCart')->with('items',$productinfo);

}

public function display(){
  $productinfo=DB::table('products')->join('user_products',function ($join){
    $join->on('products.product_id','=','user_products.product_id')
    ->where('user_id','=',auth()->id());
   })->get();
 //dd($productinfo);
   return view('viewCart')->with('items',$productinfo);

}


public function removefrmCart($id, Request $request){  //REMOVE ITEM FROM CART
  DB::delete('delete from user_products where product_id = ? and user_id = ?' ,[$id,auth()->id()]);
   $productinfo=DB::table('products')->join('user_products',function ($join){
    $join->on('products.product_id','=','user_products.product_id')
    ->where('user_id','=',auth()->id());
   })->get();
   return view('viewCart')->with('items',$productinfo);
}



}

