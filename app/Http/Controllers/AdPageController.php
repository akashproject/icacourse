<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trait\afterLeadSubmit;
use App\Models\Adpage;
use App\Models\Lead;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Support\Facades\Cookie;

class AdPageController extends Controller
{
    use afterLeadSubmit;
    public $_statusOK = 200;
    public $_statusErr = 500;
    public function index($slug,Request $request)
    {
        try {
            $contentMain = Adpage::where('slug', $slug)->firstOrFail();
            $course_ids;
            if ($contentMain->course_id) {
                if($contentMain->course_id){
                    $course_ids = json_decode($contentMain->course_id);
                }
            }
           
            
            return view("adPage.".$contentMain->template,compact('contentMain','course_ids'));

        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
            var_dump($th);
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
            
            if($postData['store_area'] == "1"){
                $ee = $this->b2cLeadCaptureLeadToExtraage($lead);
                $updateData['crm_status'] = ($ee['result'] == "Success")?'1':'0';
                $updateData['crm_response'] = $ee;
            }
            
            $cogno = $this->cognoai_api_calling($lead);
            $updateData['whatsapp_status'] = ($cogno['status'] == "200")?'1':'0';

            $thankYou = $this->thankyouNotication($lead);
            $updateData['message_status'] = ($thankYou['statusCode'] == "200")?'1':'0';

            $brevo = $this->sendEmailBrochureByBrevo($lead);
            $updateData['mail_status'] = (isset($brevo['messageId']))?'1':'0';

            $lead->update($updateData);

            $student = Student::where('mobile',$lead->mobile)->first();
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
            return redirect()->route('page-view', 'thank-you');
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json($e, $this->_statusOK);
        }
    }
    
}
