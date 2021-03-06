<?php

namespace App\Http\Middleware;

use Closure;

class Subscribed
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
        
        if(!$request->user()->subscribed('main')){


            if($request->ajax() || $request->wantsJson()){
                return response('Unauthorized.', 401);
            }


            return redirect('/plans')->with('error', 'Contenuti visibili solo per gli utenti che hanno acquistato il servizio.');
        }


        return $next($request);
    }
}
