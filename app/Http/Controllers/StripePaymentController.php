<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\Product;
use App\Models\Order as OrderModel;
use App\Models\OrderProduct;
use Stripe\Climate\Order;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Validator;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:20',
            'totalBill' => 'required',
            'phone' => 'required|numeric|digits_between:10,15',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $fname = $request->fname;
            $phone = $request->phone;
            $totalBill = $request->totalBill;
            return view('stripe', compact('fname', 'phone', 'totalBill'));
        }
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $request->totalBill * 100,
            "currency" => "pkr",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        // $order = new OrderModel();
        $orderData = session()->get('cart');
        $orderModel = new OrderModel();

        $orderModel->customer = $request->fname;
        $orderModel->save();
        // dd($orderModel->all());
        foreach($orderData as $item){

            $productId = $item['id'];
            $product = Product::findOrFail($productId);
            // dd($product);

            $totalPrice = $item['quantity'] * $product->price;
            $orderModel->orderProduct()->create([
                'product_name' => $product->name,
                'category' => $product->category->name,
                'price' => $product->price,
                'quantity' => $item['quantity'],
                'total_price' =>   $totalPrice
            ]);
            // dd($item['categoty']);
            // $order->product_id = $item['id'];
            // $order->category = $item['category'];
            // $order->product_name = $item['name'];
            // $order->price = $item['price'];
            // $order->quantity = $item['quantity'];
            // $order->total_price = $totalPrice;
            // $order->save();

        };
        session()->forget('cart');
        return back()->with('success', 'Payment successful!');
    }
}
