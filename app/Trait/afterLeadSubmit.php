<?php

namespace App\Trait;
use App\Models\Lead;

trait afterLeadSubmit
{
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function b2cLeadCaptureLeadToExtraage($postData){
        $url = "https://prodapi.extraaedge.com/api/WebHook/addLead";
        $apiData = [
            'AuthToken' => "ICAONLINE-13-05-2023",
            'Source' => "icaonline",
            'FirstName' => $postData['first_name'],
            'lastName' => $postData['last_name'],
            'Email' => $postData['email'],
            'MobileNumber' => $postData['mobile'],
            //'Center' => $postData['state'],
            //'Location' => $postData['city'],
            'Field4' => "Retail Online",
            'pincode' => $postData['pincode'],
            'LeadType' => $postData['lead_type'],
            'LeadSource' => $postData['utm_source'],
            'LeadName' => $postData['utm_campaign'],
            'EducationalQualification' => $postData['source_url'],
            'textb1' => $_POST['utm_term'],
            'field3' => $_POST['utm_device'],
            'textb2' => $_POST['utm_adgroup'],
            'Textb3' => $_POST['utm_content'],
            'Textb10' => $_POST['utm_creative'],
            // 'batchApplied'=>$_POST['highest_qualification'],
            // 'fatherName'=>$_POST['father_name'],
            // 'address'=>$_POST['current_address']
        ];

        $response = curl_post_function($url,$apiData);
        return $response;
    }

    function cognoai_api_calling($postData){

        $url = "https://app.cognocart.com/campaign/external/send-event-based-triggered-whatsapp-campaign/";
        $apiData = (object) array(
            "authorization" => "21af729f-5733-4f41-a830-f10713525a4e", 
            "campaign_id" => "275070",
            "whatsapp_bsp" => "1", 
            "client_data" => array(
                "phone_number" => "+91".$postData['mobile'], 
                "name" => $postData['first_name'].' '.$postData['last_name'], 
                "dynamic_data" => array(
                    "1"=> $postData['first_name'].' '.$postData['last_name'] 
                )
            ) 
        );
        
        $response = curl_post_function($url,$apiData);
        return $response;
    }

    public function captureLeadToDB($leadData){
        try {
            $leadData['mobile'] = $leadData['lead_mobile'][1];
            $leadData['email'] = $leadData['lead_email'];
            $lead = Lead::create($leadData);
            return $lead;
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
            return response()->json($e, $this->_statusOK);
        }
    }

    public function thankyouNotication($postData){
        try {

            $name = $postData['first_name'];
            $url = "https://api.st-messaging.com/fe/api/v1/send?username=icaedu1.trans&password=Password@123&unicode=true&from=ICAEDU&to=".$postData['mobile']."&text=Hi+".$name."%2C+Thank+you+for+your+interest+in+our+career+programs.+We+have+received+your+details+and+will+be+in+touch+soon.+Thanks+%26+Regards%2C+ICA+Edu+Skills&dltContentId=1207173139255553618&dltPrincipalEntityId=1201159245568554682"; 

            $response = curl_function($url);
            return $response;
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }

    public function sendEmailBrochureByBrevo($postData)
    {
        try {

            $url = "https://api.brevo.com/v3/smtp/email";
            $apiData = [
                "sender" => [
                    "name" => "IDCM- Institute of Digital & Content Marketing",
                    "email" => "online@icacourse.in",
                ],
                "replyTo" => [
                    "name" => "IDCM- Institute of Digital & Content Marketing",
                    "email" => "no-reply@icacourse.in",
                ],
                "params" => [
                    "FIRSTNAME" => $postData["first_name"],
                ],
                "to" => [["email" => $postData["email"], "name" => $postData["first_name"]]],
                "templateId" => 163,
            ];

            
            $curl = curl_init();
            $data = json_encode($apiData);
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $headers = [
                "Content-Type: application/json",'accept: application/json',
                'api-key: '.get_theme_setting('brevo-api-key')
            ];
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $resp = curl_exec($curl);
            curl_close($curl);
            
            $resp = json_decode($resp,true);
            return $resp;
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;

            var_dump($e);
        }
    }
}