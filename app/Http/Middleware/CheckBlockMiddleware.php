<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;

class CheckBlockMiddleware
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
         if (auth()->check() && auth()->user()->block == 1) {
              Auth::logout();

            //   $request->session->invalidate();
            //   $request->session->regenerateToken();


            return redirect()->route('login')->with('error', 'Votre compte est bloqué, 
            veuillez contacter un administrateur');
             
         }

        return $next($request);
    }
}
