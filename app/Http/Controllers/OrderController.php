<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\OrderConfirmation;


class OrderController extends Controller{

//add order details
    public function orderdetails(Request $request){

      $cartproducts=DB::table("user_products")->select(array('product_id','quantity'))->where('user_id',auth()->id())->get();

      for ($x=0; $x<count($cartproducts); $x++){
        //take the product id of the product and the quantity from user_products
        //then in products table decrement the stock column according to product quantity
       $product= $cartproducts[$x]->product_id;
       $quantity=$cartproducts[$x]->quantity;
       $stock = DB::table("products")->select('stock')->where('product_id', $product)->first();
       $sold = DB::table("products")->select('sold')->where('product_id',$product)->first();
       $newstock=$stock->stock - $quantity;
       $newsold=$sold->sold + $quantity;
       DB::table('products')->where('product_id',$product)->update(['stock'=> $newstock]);
       DB::table('products')->where('product_id',$product)->update(['sold'=> $newsold]);
       
       DB::delete('delete from user_products where product_id = ? and user_id = ?' ,[$product,auth()->id()]);

      }

        $order=new OrderConfirmation();
        $order->fname=$request->input('fname');
        $order->lname=$request->input('lname');
        $order->contact=$request->input('contact');
        $order->address=$request->input('address');
        $order->city=$request->input('city');
        $order->code=$request->input('code');
    

        DB::table('order_confirmation')->insert([
            'fname' => $order->fname,
            'lname' => $order->lname,
            'contact'=>$order->contact,
            'address' => $order->address,
            'city' => $order->city,
            'code'=> $order->code,
            'items' => 0
          ]);

          return view('confirmorder');
    }
    
}