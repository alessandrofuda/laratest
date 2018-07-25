<?php

namespace App\Http\Middleware;

use Closure;

class PremiumSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        


        // dd($request->user()->subscribed('main', 'n9t2'));



        // if(!$request->user()->subscribed('premium', 'main')) {  //true
        if(!$request->user()->subscribed('main', 'premium')) {     

            

            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            }



            return redirect('plans')->with('error', 'Contenuto accessibile solo agli utenti Premium');
        }


        return $next($request);
    }
}
