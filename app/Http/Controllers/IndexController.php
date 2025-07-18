<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trait\afterLeadSubmit;
use App\Models\Contact;
use App\Models\Institute;
use App\Models\City;
use App\Models\Lead;
use App\Models\Coupon;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{
    
    use afterLeadSubmit;
    public $_statusOK = 200;
    public $_statusErr = 500;
    
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        try {
            $request->session()->get("userData");
            $contentMain = (object)['enable_otp'=>1];
            return view("index",compact("contentMain"));

        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }

    public function submitMobileOtp(Request $request){
        try {
            $data = $request->all();
            $otpvalue = rand(1111,9999);
            $lastdigit = substr($data['mobile'], -4);

            $curl = curl_init();

            $url = "https://api.st-messaging.com/fe/api/v1/send?username=icaedu1.trans&password=Password@123&unicode=true&from=ICAEDU&to=".$_POST["mobile"]."&text=".$otpvalue."+is+your+One+Time+Password+%28OTP%29+for+course+enquiry+at+ICA+Edu+Skills+Pvt+Ltd.+for+the+mobile+number+xxxxxx".$lastdigit.".+Thank+you+for+your+inquiry.%0D%0A&dltContentId=1207173138503092263&dltPrincipalEntityId=1201159245568554682";

            $response = curl_function($url);

            $data = array(
                "lastdigit" => $lastdigit,
                "otp_value" => $otpvalue,
            ); 

            if($response){
                $data['status'] = "success";
            } else {
                $data['status'] = "failed";
            }

            return response()->json($data, $this->_statusOK);

        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
    }

    function insertLeadRecord(Request $request){
        try {
            $postData = $request->all();      
            $nameArray = explode(" ", $postData["lead_full_name"]);
            $postData["first_name"] = current(explode(" ", $postData["lead_full_name"]));
            unset($nameArray["0"]);
            $postData["last_name"] = implode(" ", $nameArray);
            $lead = $this->captureLeadToDB($postData);
            return response()->json($lead, $this->_statusOK);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json($e, $this->_statusOK);
        }
    }

    public function captureLead(Request $request)
    {
        try {
           
            $postData = $request->all();
            if ($postData['lead_id']) {
                $lead = Lead::find($postData['lead_id']);
            }
            $updateData['otp_status'] = "1";
            $ee = $this->b2cLeadCaptureLeadToExtraage($lead);
            $updateData['crm_status'] = ($ee['result'] == "Success")?'1':'0';
            $updateData['crm_response'] = $ee;

            $cogno = $this->cognoai_api_calling($lead);
            $updateData['whatsapp_status'] = ($cogno['status'] == "200")?'1':'0';

            $thankYou = $this->thankyouNotication($lead);
            $updateData['message_status'] = ($thankYou['statusCode'] == "200")?'1':'0';

            $brevo = $this->sendEmailBrochureByBrevo($lead);
            $updateData['mail_status'] = (isset($brevo['messageId']))?'1':'0';
            $lead->update($updateData);

            $student = Student::where('mobile',$lead->mobile)->exist();
            if(!$student) {
                $student = [
                    'first_name' => $lead->first_name,
                    'last_name' => $lead->last_name,
                    'mobile' => $lead->mobile,
                    'email' => $lead->email,
                    'pincode' => $lead->pincode,
                ];
                
                Student::create($student);
            }
            
            Cookie::queue('student', json_encode($student), 6000000000); 
            return redirect()->route('page-view', 'online-accounting-courses');
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json($e, $this->_statusOK);
        }
    }

    public function saveContact(Request $request)
    {
        try {
            $postData = $request->all();
            $validatedData = $request->validate([
                "contact_first_name" => "required",
                "contact_last_name" => "required",
                "contact_email" => "required",
                "contact_subject" => "required",
                "contact_message" => "required",
            ]);

            Contact::create($postData);

            return redirect()->back()->with('message', 'Request has been submitted successfully!');

        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json($e, $this->_statusOK);
        }
        
    }

    public function applyCouponCode(Request $request) {
        try {
                $data = $request->all();
                $totalAmount = totalCartAmount();
                $coupon = Coupon::where('code',$data['coupon_code'])->first();
                $couponResponse = [];
                if(!$coupon){
                    $couponResponse = [
                        'message'=> "Coupon is invalid",
                        'status'=> 0,
                    ];
                    return response()->json($couponResponse,"200");
                }

                if (strtotime(date("Y-m-d")) > strtotime($coupon->expire_date)) {
                    $couponResponse = [
                        'message'=> "Coupon is Expired",
                        'status'=> 0,
                    ];
                    return response()->json($couponResponse,"200");
                }

                if($coupon->number_of_use <= 0){
                    $couponResponse = [
                        'message'=> "Coupon use limit exceed",
                        'status'=> 0,
                    ];
                    return response()->json($couponResponse,"200");
                }

                $couponResponse = [
                    'message'=> "Coupon Applied",
                    'offer_message'=> $coupon->message,
                    'status'=> 1,
                ];

                if($coupon->discount_type == "0"){
                    $amount = $totalAmount - $coupon->discount;
                    $couponResponse['display_discount'] = "₹".number_format($coupon->discount)."/-";
                    $couponResponse['discount'] = $coupon->discount;
                } else {
                    $amount = $totalAmount;
                    $value = ($coupon->discount / 100) * $amount; // Calculate 20% of $total
                    $amount = $amount-$value;
                    $couponResponse['display_discount'] = "₹".number_format($value)."/- (".$coupon->discount."%)";
                    $couponResponse['discount'] = round($value);
                }
                
                $couponResponse['amount'] = base64_encode($amount);
                $couponResponse['display_amount'] = "₹".number_format($amount)."/-";
                return response()->json($couponResponse,"200");

            } catch (\Illuminate\Database\QueryException $e) {
            return response()->json($e, $this->_statusOK);
        }
    }

    public function getCitiesByStateId(Request $request){
        try {
            $data = $request->all();
            $cities = DB::table('cities')->where('state_id', $data['state'])->orderBy('name', 'asc')->get();
            return response()->json($cities, $this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }
}
