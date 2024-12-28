<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if(Auth::user()->role_id==1){
                return redirect('/admin'); 
            }else if(Auth::user()->role_id==2){
                return redirect('/staff'); 
            }else if(Auth::user()->role_id==3){
                return redirect('/'); 
            }else{
                return redirect('/'); 
            }
        }
        return $next($request);
    }
}
