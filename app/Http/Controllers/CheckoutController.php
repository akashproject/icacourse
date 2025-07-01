<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct()
    {
        
    }

    public function show(){
        try {
            $contentMain = (object)[
                'enable_otp' => get_theme_setting('enable_otp')
            ];
            return view('checkout.show',compact('contentMain'));
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }

    public function proceedToCheckout(Request $request)
    {
        try {
            $data = $request->all();  
            $order_id = "order_".random_strings(14);    
            $orderData = [
                "order_id" => $order_id,
                "coupon" => $data['coupon_code'],
                "source" => 'seo',
            ];
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }

    public function orderSuccess(Request $request)
    {
        try {
            echo "success";
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }

    public function orderFailed(Request $request)
    {
        try {
            echo "failed";
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }
}
