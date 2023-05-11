<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalMiddleware 
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
         if (auth()->check() && Auth::user()->role == 3) {
             if(!auth()->user()->approved) {
                 auth()->logout();

                 return redirect()->route('login')->with('message', trans('Votre compte doit être approuvé par un administrateur.
                                                                                    Vous recevrez un mail dans les plus brefs délais'));
             }
         }

        return $next($request);
    }
}
