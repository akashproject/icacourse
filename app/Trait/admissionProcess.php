<?php

namespace App\Trait;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Student;

trait admissionProcess
{
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function erpPushProcess($order_id){
        try {
            $order = Order::where('order_id',$order_id)->first();

            if(!$order) {
                return false;
            }

            if($order->status != "success" || $order->payment_id == null) {
                return false;
            }
            
            $orderItems = OrderItem::where('order_id',$order->id)->get();
            $student = Student::find($order->profile_id);
            $courseModule = [];
            foreach($orderItems as $key => $item) {
                $course = getCourseById($item->course_id);
                $fee = getFeeById($item->fee_id);
                $courseModule[$key] = (object) array(
                    "CourseId"=>$course->erp_course_id,
                    "FeeID"=>$item->fee_id,
                    "SoldAt"=>$item->amount,
                    "DwnPmt"=>$item->amount,
                    "Rec_Amt"=>$item->amount,
                    "InstStartMonth"=> "10/08/2025",
                    "NoOfInstallment"=>$fee->NoOfInstall,
                    "InstAmt"=>$fee->InstallAmount,
                    "batchId"=>"0",
                    "DisAdm" => $item->discount,
                    "CouponCode" => $order->coupon
                );
            }

            $methodlist = array("Unified Payments"=>"U","Net Banking"=>"O","Credit Card"=>"M","EMI"=>"M","Debit Card"=>"P","Credit Card"=>"P");
            $admissionArray = (object) array(
                "authtoken"=>"TEST001",
                "source"=>"ICAJOBGUARANTEE",
                "Student_fname"=> $student->first_name,
                "Student_lname"=> $student->last_name,
                "Dob"=> $student->date_of_birth,
                "Qualification"=> $student->qualification,
                "Address1"=> $student->address,
                "Address2"=>"",
                "City"=> $student->city,
                "State"=> $student->state,
                "Pin"=> $student->pincode,
                "Mobile"=> $student->mobile,
                "Email"=> $student->email,
                "Student_gender"=>$student->gender,
                "WebSource"=>$order->source,
                "CenterCode"=> "X999",
                "EnquiryId"=>null,
                "PaymentMode"=> ($methodlist[$order->payment_mode])?$methodlist[$order->payment_mode]:"P",
                "ChqDrfNo"=>$order->payment_id,
                "listCourse"=> $courseModule,
                "contactCentre"=>null
            );
            $data = json_encode($admissionArray);
            
            $url = "https://new.icaerp.com/api/online/saveEnquiryAdmission";

            $admission = curl_post_function($url,$data);
            if($admission['ResponseCode']['0'] != "SUCCESS" || $admission['StudentCode'] == "") {
                return false;
            }
        
            $data = [
                'student_code'=> $admission['StudentCode'],
                'money_receipt'=> implode(", ",$admission['MoneyReceipt']),
                'erp_status'=> "1",
                'erp_response' => $admission
            ];
            
            $order->update($data);
            return $admission;
        } catch(\Illuminate\Database\QueryException $e){
            return response()->json($e, $this->_statusOK);
        }
    }

}