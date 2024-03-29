<?php

namespace App\Http\Middleware;

use Brian2694\Toastr\Facades\Toastr;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsColis
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
        if (Auth::guard('agent')->user()) {
            if (Auth::guard('agent')->user()->role == 3 || Auth::guard('agent')->user()->role == 4 ) {
                return $next($request);
            }
            Toastr::error('Vous n\'aviez pas acces a cette page', 'Message', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
}
