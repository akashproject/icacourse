<?php

namespace App\Trait;
use App\Models\Lead;

trait afterLeadSubmit
{
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function b2cLeadCaptureLeadToExtraage($postData){
        $apiData = array(
			'AuthToken' => 'IDCM-03-02-2020',
			'Source' => 'idcm',
			'FirstName' => $postData['first_name'],
			'LastName' => $postData['last_name'],
			'Email' => $postData['lead_email'],
			'MobileNumber' => $postData['mobile'],
			'State' => (isset($postData['state']))?$postData['state']:'',
			'Center' => (isset($postData['city']))?$postData['city']:'',
			'Location' => (isset($postData['institute']))?$postData['institute']:'',
			'Pincode' => $postData['pincode'],
			'LeadType' => $postData['lead_type'],
			'LeadSource' => $postData['utm_source'],
			'LeadName' => $postData['utm_campaign'],
			'EducationalQualification' => $postData['source_url'],
			'Textb1' => $postData['utm_term'],
			'Field3' => $postData['utm_device'],
			'Textb2' => $postData['utm_adgroup'],
			'Textb3' => $postData['utm_content'],
			'Textb10' => $postData['utm_creative'],
		); 

        $url = "https://prodapi.extraaedge.com/api/WebHook/addLead"; 		
        $curl = curl_init();
        
        $data = json_encode($apiData);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
        curl_close($curl);
        $resp = json_decode($resp,true);
        return $resp;
    }

    function cognoai_api_calling($postData){
        $whatsappArray = (object) array(
            "authorization" => "0043ed81-7067-487c-9ea4-51c1e5bfbc9f", 
            "campaign_id" => "265595", 
            "whatsapp_bsp" => "1", 
            "client_data" => array(
                "phone_number" => "+91".$postData['mobile'], 
                "name" => $postData['first_name'].' '.$postData['last_name'], 
                "dynamic_data" => array(
                    "1"=> $postData['first_name'].' '.$postData['last_name']
                )
            ) 
        );
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://app.cognocart.com/campaign/external/send-event-based-triggered-whatsapp-campaign/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($whatsappArray),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
    
        $resp = curl_exec($curl);
        curl_close($curl);
        $resp = json_decode($resp,true);
        return $resp;
    }

    public function captureLeadToDB($leadData){
        try {
            $leadData['mobile'] = $leadData['lead_mobile_number'][1];
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

            $url = "https://api.st-messaging.com/fe/api/v1/send?username=icaedu1.trans&password=Password@123&unicode=true&from=MYIDCM&to=".$postData['mobile']."&text=Hi+".$name."%2C+Thank+you+for+your+interest+in+our+digital+marketing+programs.+We+have+received+your+details+and+will+be+in+touch+soon.+Thanks%2C+IDCM&dltContentId=1207173168686082071&dltPrincipalEntityId=1201159245568554682";

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            //for debug only!
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $resp = curl_exec($curl);
            curl_close($curl);

            $resp = json_decode($resp,true);
            return $resp;
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }

    public function sendEmailBrochureByBrevo($postData)
    {
        try {

            $apiData = [
                "sender" => [
                    "name" => "IDCM- Institute of Digital & Content Marketing",
                    "email" => "info@myidcm.com",
                ],
                "replyTo" => [
                    "name" => "IDCM- Institute of Digital & Content Marketing",
                    "email" => "no-reply@myidcm.com",
                ],
                "params" => [
                    "FIRSTNAME" => $postData["first_name"],
                ],
                "to" => [["email" => $postData["lead_email"], "name" => $postData["first_name"]]],
                "cc" => [["email" => "proloy@icagroup.in", "name" => "Proloy Ghosh"]],
                "templateId" => 168,
            ];

            $url = "https://api.brevo.com/v3/smtp/email";
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