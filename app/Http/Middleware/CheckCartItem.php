<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CheckCartItem
{
    public function handle(Request $request, Closure $next)
    {
        $cartItem = json_decode(Cookie::get('cartItems'),true);
        if (!Cookie::has('cartItems') || count($cartItem) <= 0) {
            return redirect()->route('page-view','cart'); 
        }

        if (!Cookie::has('student')) {
            return redirect()->route('validate'); 
        }


        return $next($request); // Proceed to original route
    }
}
