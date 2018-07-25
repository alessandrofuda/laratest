<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class SubscriptionsController extends Controller
{
    

    public function index()
    {
    	return view('subscriptions.index');
    }




    public function store(Request $request)
    {
        // get the plan after submitting the form
        $plan = Plan::findOrFail($request->plan);


        if ($request->user()->subscribedToPlan($plan->braintree_plan, 'main')) {
        	return redirect('home')->with('error', 'Hai già sottoscritto questo piano!');
    	}



		if (!$request->user()->subscribed('main')) {
			
			// subscribe the user
			$request->user()->newSubscription('main', $plan->braintree_plan)->create($request->payment_method_nonce);
			
			// redirect to home after a successful subscription
			return redirect('home')->with('success', 'Sottoscritto con successo al piano '. $plan->name);

		} else {

			$request->user()->subscription('main')->swap($plan->braintree_plan);
			return redirect('home')->with('success', 'Sei passato con successo al piano '. $plan->name);
		}
		

    }




    public function cancel(Request $request)
    {
        $request->user()->subscription('main')->cancel();

        return redirect()->back()->with('success', 'You have successfully cancelled your subscription');
    }




    public function resume(Request $request)
    {
        $request->user()->subscription('main')->resume();

        return redirect()->back()->with('success', 'You have successfully resumed your subscription');
    }




}
