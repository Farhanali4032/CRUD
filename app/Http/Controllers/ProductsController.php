<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

class ProductsController extends Controller
{
    //

    public function index(){
       
        $products = Product::all();
    //    $cate = $products->category_id;
    //    dd($products);
        return view('products.index', compact('products'));
    }

    public function addProduct(){
        echo "farhan";
    }

    public function addToCart(){

        return View('products.add_to_cart');
    }

    function categoryProduct($id){

        $products = Product::where('category_id', $id)->get();

        // dd($products);
        return view('products.index', compact('products'));

    }
}
