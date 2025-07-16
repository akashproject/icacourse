<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trait\admissionProcess;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Student;

class PaymentController extends Controller
{
    use admissionProcess;
    public function success() {
        try {
            $contentMain = (object)[
                'enable_otp' => get_theme_setting('enable_otp')
            ];
            $order_id = "order_O64NWY58Q7E0DS";
            $erp = $this->erpPushProcess($order_id);
            if (!$erp) {
                return redirect()->route('payment-failed');
            }
            return view('payment.success',compact('contentMain'));
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
        
    }

    public function failed() {
        try {
            $contentMain = (object)[
                'enable_otp' => get_theme_setting('enable_otp')
            ];
            return view('payment.failed',compact('contentMain'));
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
        
    }
}
