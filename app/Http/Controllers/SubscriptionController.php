<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use Stripe\StripeClient;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    function index(){

        // $stripe = new StripeClient(env('STRIPE_SECRET'));
        // $subscription = $stripe->subscriptions->all();
        // $data = $subscription->data;
        // // dd($data);

        // foreach($data as $items){
        //     dd($items->plan->amount);
        // }

        
        $packages = SubscriptionPlan::all();
       return view('package',compact('packages'));
    }

   
}
