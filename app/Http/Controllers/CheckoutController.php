<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\App;
use App\Models\Student;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
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

    public function studentValidate(){
        try {
            $contentMain = (object)[
                'enable_otp' => get_theme_setting('enable_otp')
            ];
           
           
            return view('checkout.validate',compact('contentMain'));
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }

    public function validateLead(Request $request){
        try {
            $data = $request->all();  
            $student = Student::where('mobile',$data['mobile'])->first();
            if(!$student){
                $student = [
                    'mobile' => $data['mobile'],
                ];
            }

            Cookie::queue('student', json_encode($student), 6000000000); 
            return redirect()->route('checkout'); 
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }

    public function proceedToCheckout(Request $request)
    {
        try {
            $data = $request->all(); 
            $validatedData = $request->validate([
                'lead_first_name' => 'required',
                'lead_last_name' => 'required',
                'guardian_name' => 'required',
                'lead_email_address' => 'required|email',
                'lead_mobile_number' => ['required', 'array', 'min:1'],
                'date_of_birth' => ['required'],
                'amount' => ['required'],
            ]);            

            $cartItems = (Cookie::get('cartItems'))?json_decode(Cookie::get('cartItems'),true):[];
            $student = Student::where('mobile',$data['lead_mobile_number'][1])->first();
            $studentInfo = [
                'first_name'=>$data['lead_first_name'],
                'last_name'=>$data['lead_last_name'],
                'guardian_name'=>$data['guardian_name'],
                'mobile'=>$data['lead_mobile_number'][1],
                'email'=>$data['lead_email_address'],
                'date_of_birth'=>$data['date_of_birth'],
                'gender'=>$data['gender'],
                'qualification'=>$data['qualification'],
                'language'=>$data['language_option'],
                'address'=>$data['addressline_1'],
                'state'=>$data['state'],
                'city'=>$data['city'],
                'pincode'=>$data['pincode'],
            ];
            if($student){
                $student->update($studentInfo);
            } else {
                $student = Student::create($studentInfo);
            }
            Cookie::queue('student', json_encode($student), 6000000000);
            //67,997 64,597 3,400
            $order_id = "order_".random_strings(14);
            $orderData = [
                "order_id" => $order_id,
                "profile_id" => $student->id,
                "coupon" => $data['coupon_code'],
                "amount" => (int)round(base64_decode($data['amount'])),
                "discount" => $data['discount'],
                "source" => $data['utm_source'],
            ];
            $order = Order::create($orderData);
            if(!$order) {
                return redirect()->back()->with('message', 'Failed to create order! Please try again');
            }
            
            if(isset($data['discount']) && $data['discount'] != ''){
				$base_value = intdiv($data['discount'], count($cartItems));
				$remainder = $data['discount'] % count($cartItems);
			}    

            $orderItem = [];
            
            foreach ($cartItems as $key => $value) {
                $course = getCourseById($key);
                $fee = getFeeById($value);
                $orderItem[] = [
                    'order_id' =>$order->id,
                    'course_id' =>$key,
                    'fee_id' =>$value,
                    'amount'=> $fee->Down_Payment - $base_value,
                    'discount' => ($data['discount'])?$base_value:'',
                ];
            }

            if(isset($data['discount']) && $data['discount'] != ''){
				$orderItem[count($cartItems) - 1]['discount'] += $remainder;
				$orderItem[count($cartItems) - 1]['amount'] -= $remainder;
			}
            foreach ($orderItem as $key => $item) {
                $orderItem = OrderItem::create($item);
                if (!$item) {
                    return redirect()->back()->with('message', 'Failed to purchase course! Please try again');
                }
            }    

            $ccAvenueBillingData = [
                'merchant_id' => "415669",
                'order_id' => $order_id,
                'language' => "EN",
                'amount' => base64_decode($data['amount']),
                'currency' => "INR",
                'redirect_url' => route('payment-success'),
                'cancel_url' => route('payment-failed'),
                'billing_name' => $student->first_name.' '.$student->last_name,
                'billing_address' => $student->address,
                'billing_state' => getStateById($student->state)->name,
                'billing_city' => getCityById($student->city)->name,			
                'billing_zip' => $student->pincode,
                'billing_country' => "India",
                'billing_tel' => $student->mobile,
                'billing_email' => $student->email,
            ];
            $merchant_data = '';
            $working_key='69E5D32F26D61263CCC4B0CC40C5689C';//Shared by CCAVENUES
		    $access_code='AVCT76JC54CI17TCIC';//Shared by CCAVENUES
            foreach ($ccAvenueBillingData as $key => $value){
                $merchant_data.=$key.'='.urlencode($value).'&';
            }
            $encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
            ?>
            <form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
                <?php
                    echo "<input type=hidden name=encRequest value=$encrypted_data>";
                    echo "<input type=hidden name=access_code value=$access_code>";
                ?>
            </form>
            <script language='javascript'>document.redirect.submit();</script>
            <?php 
            
        } catch (\Illuminate\Database\QueryException $e) {
             return response()->json($e, 200);
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
