<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class PlansController extends Controller
{
    //
    public function index()
    {

    	//dd(Plan::get());
        return view('plans.index')->with(['plans' => Plan::get()]);
    }


    public function show(Request $request, Plan $plan) // Plan di default --> restituirebbe l'id. --> cambiato 'id' con 'slug' nel model
    {
    	//dd($request);

        if ($request->user()->subscribedToPlan($plan->braintree_plan, 'main')) {
            return redirect('home')->with('error', 'Operazione non autorizzata');
        }

        return view('plans.show')->with(['plan' => $plan]);
    }

}
