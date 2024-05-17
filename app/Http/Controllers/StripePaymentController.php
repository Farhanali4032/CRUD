<?php
namespace App\Http\Controllers;
use Stripe;
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
            return view('stripe', compact('fname','phone', 'totalBill'));
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
    
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
      
        // Session::flash('success', 'Payment successful!');
              
        return back();
    }
}
