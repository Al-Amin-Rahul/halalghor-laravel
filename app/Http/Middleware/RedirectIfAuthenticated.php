<?php

namespace App\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && \auth()->user()->role == 1) {
            return redirect()->route("admin.dashboard");
        }
        elseif (Auth::guard($guard)->check() && \auth()->user()->role == 2)
        {
            if (Cart::count() <= 0)
            {
                return redirect()->route("/");
            }
            else
            {
                return redirect()->route("checkout");
            }
        }
        else
        {
            return $next($request);
        }

    }
}
