<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckifIsVerified
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
       
       //dd(Auth::guard('web')->user()->activated);
        if(Auth::guard('web')->user()->activated === 0){
            $email = Auth::guard('web')->user()->email;
            
              return redirect(route('reverified' ))->withAlert('You have not activated you account, an email will be resent to you account')->with(compact(['email']));
        }
        return $next($request);
    }
}
