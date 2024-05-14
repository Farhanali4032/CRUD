<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    
    public function index(){

        return view('products.add_to_cart');
    }
}
