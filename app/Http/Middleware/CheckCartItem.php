<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CheckCartItem
{
    public function handle(Request $request, Closure $next)
    {
        if (!Cookie::has('cartItems')) {
            return redirect()->route('page-view','cart'); 
        }

        return $next($request); // Proceed to original route
    }
}
