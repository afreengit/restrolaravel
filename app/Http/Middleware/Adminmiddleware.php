<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;f

class Adminmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //return $next($request);
        if(Auth::check())
        {
        if(Auth::admins()->ad_status == '1')
        {
           return $next($request); 
        }
        else
        {
            return redirect('/admin')->with('status','Access denied!. you are not an admin');
        }
        }
        else
        {
            return redirect('/admin')->with('status','please login first');
        }
    }
}
