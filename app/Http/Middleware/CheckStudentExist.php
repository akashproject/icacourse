<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CheckStudentExist
{
    public function handle(Request $request, Closure $next)
    {
        $student = json_decode(Cookie::get('student'),true);
        if (!Cookie::has('student') || count($student) <= 0) {
            return redirect()->route('page-view','cart'); 
        }

        return $next($request);
    }
}
