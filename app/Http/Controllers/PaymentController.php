<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
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
    public function success(Request $request) {
        try {
            $postContent = $request->all(); 
            $contentMain = (object)[
                'enable_otp' => get_theme_setting('enable_otp')
            ];

            $workingKey='69E5D32F26D61263CCC4B0CC40C5689C';		//Working Key should be provided here.
            $rcvdString=decryption($postContent["encResp"],$workingKey);		//Crypto Decryption used as per the specified working key.
            $order_status="";
            $decryptValues=explode('&', $rcvdString);
            $dataSize=sizeof($decryptValues);
            $responseData = array();
            for($i = 0; $i < $dataSize; $i++) 
            {
                $payment=explode('=',$decryptValues[$i]);
                $responseData[$payment[0]] = $payment[1];
                if($i==3)	$order_status=$payment[1];
            }   
            //Update Gateway Response
            $order = Order::where('order_id',$responseData['order_id'])->first();
            $orderData = [
                'payment_id'=> $responseData['tracking_id'],
                'payment_mode' => $responseData['payment_mode'],
                'status' => strtolower($responseData['order_status']),
                'gateway_response' => json_encode($responseData)
            ];
            $order->update($orderData);
            $erp = $this->erpPushProcess($responseData['order_id']);
            if (!$erp) {
                return Http::post(route('payment-failed'), ['status' => 'failure']);
            }

            $this->invoice($responseData['order_id']);
            return view('payment.success',compact('contentMain'));
        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->getMessage());
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

    public function invoice($order_id){
        $order = Order::where('order_id',$order_id)->first();
        $orderItem = OrderItem::where('order_id',$order->id)->get();
        $student = Student::find($order->profile_id);
        $items = [];
        $totalCourseFee = 0;
        foreach($orderItem as $key => $item){
            $items[$key]['name'] = getCourseById($item->course_id)->name;
            $items[$key]['amount'] = $item->amount;
            $totalCourseFee += getFeeById($item->fee_id)->Down_Payment;
        }
        $invoiceData = [
            'payment_id' => $order->payment_id,
            'student_code' => $order->student_code,
            'date' => date('d M,Y',strtotime($order->created_at)),
            'first_name' => $student->first_name,
            'last_name' => $student->last_name,
            'mobile' => $student->mobile,
            'address' => $student->address,
            'state' => $student->state,
            'city' => $student->city,
            'pincode' => $student->pincode,
            'order_items' => $items,
            'amount' => $order->amount,
            'totalCourseFee' => $totalCourseFee,
            'discount' => $order->discount,
        ];
        $mail = Mail::to($student->email,$student->first_name.' '.$student->last_name)->send(new Invoice($invoiceData));
    }
}
