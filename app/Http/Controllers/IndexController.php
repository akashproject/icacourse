<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trait\afterLeadSubmit;
use App\Models\Contact;
use App\Models\Institute;
use App\Models\City;
use App\Models\Lead;
use Illuminate\Support\Facades\DB;

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

            $url = "https://api.st-messaging.com/fe/api/v1/send?username=icaedu1.trans&password=Password@123&unicode=true&from=MYIDCM&to=".$_POST['mobile']."&text=".$otpvalue."+is+your+One+Time+Password+%28OTP%29+for+digital+marketing+course+enquiry+at+IDCM+for+the+mobile+number+xxxxxx".$lastdigit.".+Thank+you+for+your+enquiry.%0D%0A&dltContentId=1207173168142509871&dltPrincipalEntityId=1201159245568554682";

            curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);
            curl_close($curl);

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
            if (isset($postData["institute"]) && $postData["institute"] != "") {
                $city = Institute::select("city_id")->where("name", $postData["institute"])->first();
                $postData["city"] = City::where("id",$city->city_id)->first()->name;
            } else {
                $pincode = DB::table("pincodes")
                    ->join("cities","pincodes.city_id","=","cities.id")
                    ->join("states","cities.state_id","=","states.id")
                    ->select("cities.name as city","pincodes.name as pincode","states.name as state","states.id as state_id")
                    ->where("pincodes.name", $postData["pincode"])
                    ->first();
                if($pincode && $pincode->state_id == "10"){
                    $postData["city"] = $pincode->state;
                    $postData["institute"] = "IDCM Pitampura";
                } else {
                    $postData["city"] = "Kolkata";
                    $postData["institute"] = "IDCM-Chowringhee-Exide";
                }
            }
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
            return redirect('/thank-you');

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


}
