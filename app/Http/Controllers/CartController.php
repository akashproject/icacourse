<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    //
    public $_statusOK = 200;
    public $_statusErr = 500;
    public function addToCart(Request $request)
    {
        try {
            $data = $request->all();      
            $carts = ($request->cookie('cartItems'))?json_decode($request->cookie('cartItems'),true):[];
            $carts[$data['course_id']][$data['course_id']] = $data['course_fee_id'];
            $carts = json_encode($carts);
            return response($carts)->cookie('cartItems', $carts, 600000);
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }

    public function carts(Request $request)
    {
       
        $carts = json_decode($request->cookie('cartItems'),true);
    }

    
}
