<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddToCartController extends Controller
{

    public function index()
    {   $id = 2;
        $cart = session()->get('cart');
        // unset($cart[$id]);
        // session()->put('cart', $cart);
        return view('products.add_to_cart', compact('cart'));
    }


    function addToCart(Request $request)
    {
        $id = $request->id;
        // session()->forget('cart');
        $cart = session()->get('cart', []);
        if (array_key_exists($id, $cart)) {
            echo "Already";
            return response()->json(['message' => 'Item already exists in cart']);
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $request->name,
                'price' => $request->price,
                'image' => $request->image,
                'quantity' => 1,
                'categoty' => $request->category,
            ];
           
        }
        session()->put('cart', $cart);
        return response()->json(['message' => 'Product added to cart']);
    }


    function removeToCart(Request $request){
        $id = $request->query('id');
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return response()->json(['message' => 'Product remove to cart']);

    }
}
