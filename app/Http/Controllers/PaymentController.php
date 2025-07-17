<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Invoice;
use Illuminate\Support\Facades\Mail;
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
            $order_id = "order_7Z5BAYI492JLKG";
            $erp = $this->erpPushProcess($order_id);
            dd($erp);
            if (!$erp) {
                return redirect()->route('payment-failed');
            }

            $order = ['id' => 101, 'address' => 'Kolkata, India'];
            $mail = Mail::to('akashdutta.icagroup@gmail.com','Akash Dutta')->send(new Invoice($order));
            dd($mail);
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
