<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Products;

class CheckoutController extends Controller{

    public function checkout(){
       // $product = new Products(); //make an instance of the class products
          return view('checkout');
    }
    
}