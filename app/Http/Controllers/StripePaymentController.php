<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\Product;
use App\Models\Order as OrderModel;
use App\Models\OrderProduct;
use GuzzleHttp\Psr7\Query;
use Stripe\Climate\Order;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Validator;
use Stripe\StripeClient;
use Stripe\Subscription;

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
        foreach ($orderData as $item) {

            $productId = $item['id'];
            $product = Product::findOrFail($productId);

            $totalPrice = $item['quantity'] * $product->price;
            $orderModel->orderProduct()->create([
                'product_name' => $product->name,
                'category' => $product->category->name,
                'price' => $product->price,
                'quantity' => $item['quantity'],
                'total_price' =>   $totalPrice
            ]);
        };
        session()->forget('cart');
        return back()->with('success', 'Payment successful!');
    }

    function subscription(Request $request)
    {
        $name = session('user_name');
        $email = session('user_email');
        // dd($name,$email);
        $stripe = new StripeClient(env('STRIPE_SECRET'));


        $customer = $stripe->customers->create([
            'name' => $name,
            'email' => $email
        ]);
        $stripe->customers->createSource($customer->id, ['source' => 'tok_visa']);
        // dd($customer->id);
        
        $priceId = $request->priceId;
        // dd($priceId);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $subscription = Subscription::create([
            'customer' => $customer->id,
            'items' => [[
                'price' => $priceId,
                'quantity' => $request->qunatity,
            ]],
        ]);
        return redirect()->back()->with('success', 'Offer are Subcribe');

        // dd($session);
    }
}
