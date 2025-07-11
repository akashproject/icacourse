<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Permission;
use App\Models\Setting;
use App\Models\CourseType;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Cookie;


if (! function_exists('check_device')) {
    function check_device($param = null){
        $device = "";
        switch ($param) {
            case 'desktop':
                $device = Agent::isDesktop();
                break;
            case 'tablet':
                $device = Agent::isTablet();
            case 'mobile':
                $device = Agent::isPhone();
                break;
            case 'os':
                $device = Agent::device();
                break;
        }
        
        return $device;
    }
}

if (! function_exists('getSizedImage')) {
    function getSizedImage($id,$size = null) {
        $size = ($size)?$size.'_':"";
        $media = DB::table('media')->where('id',$id)->first();
        if($media){
            $filename = env('APP_URL').$media->path.'/'.$size.$media->filename;
            return $filename;
            //return $filename = env('APP_URL').$media->path.'/'.$size.$media->filename;
        } else {
            return false;
        }
    }
}

if (! function_exists('getAttachmentUrl')) {
    function getAttachmentUrl($id) {
        $media = DB::table('media')->where('id',$id)->first();
        if($media){
            return $filename = env('APP_URL').$media->path.'/'.$media->filename;
        } else {
            return false;
        }
    }
}

if (! function_exists('thousandsCurrencyFormat')) {
    function thousandsCurrencyFormat($num) {
        if($num>1000) {
            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = array('k', 'm', 'b', 't');
            $x_count_parts = count($x_array) - 1;
            $x_display = $x;
            $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];
            return $x_display;
        }
        return $num;
    }
}

if (! function_exists('get_theme_setting')) {
    function get_theme_setting($value){
        $media = Setting::where('key',$value)->first();
        return (isset($media->value))?$media->value:"null";
    }
}

if (! function_exists('getCourseTypeById')) {
    function getCourseTypeById($parent_id = null){
        $course_type = CourseType::where('status','1')->where('parent_id',$parent_id)->get();
        return (isset($course_type))?$course_type:"null";
    }
}

if (! function_exists('getTypesByCourseId')) {
    function getTypesByCourseId($types){
        $value = CourseType::whereIn('id',json_decode($types))->where('status','1')->get();
        return (isset($value))?$value:"null";
    }
}

if (! function_exists('get_courses')) {
    function get_courses($type_id = null){
        $course = DB::table('courses');
        if($type_id){
            $course->where('type_id', 'like', '%"' . $type_id . '"%');
        }
        return $course->where('status',"1")->orderBy('name', 'ASC')->get();
    }
}

if (! function_exists('getCourseById')) {
    function getCourseById($id){
        $value = Course::where('id',$id)->first();
        return (isset($value))?$value:"null";
    }
}

if (! function_exists('getSubjects')) {
    function getSubjects(){
        $value = Subject::where('status','1')->get();
        return (isset($value))?$value:"null";
    }
}

if (! function_exists('getSubjectsByCourseId')) {
    function getSubjectsByCourseId($subjects){
        $value = Subject::whereIn('id',json_decode($subjects))->where('status','1')->get();
        return (isset($value))?$value:"null";
    }
}

if (! function_exists('getTopicsBySubjectId')) {
    function getTopicsBySubjectId($subject_id){
        $value = Topic::where('subject_id',$subject_id)->where('status','1')->get();
        return (isset($value))?$value:"null";
    }
}

if (! function_exists('getCourseFees')) {
    function getCourseFees($course_id){
        $fees = DB::table('fees')->where('CourseId',$course_id)->get();
        return $fees;
    }
}

if (! function_exists('getOneTimePayFee')) {
    function getOneTimePayFee($course_id){
        $fee = DB::table('fees')->where('CourseId',$course_id)->where('Install_Payable',"N")->first();
        return $fee;
    }
}

if (! function_exists('totalCartAmount')) {
    function totalCartAmount(){
        $totalCartAmount = 0;
        $cartItems = json_decode(Cookie::get('cartItems'),true);
        foreach($cartItems as $key => $item) {
            $fee = DB::table('fees')->where('FeeID',$item)->first();
            $totalCartAmount+= $fee->Down_Payment;
        }
        return $totalCartAmount;
    }
}

if (! function_exists('getFeeById')) {
    function getFeeById($id){
        $fees = DB::table('fees')->where('FeeID',$id)->first();
        return $fees;
    }
}

if (! function_exists('getAllFaqs')) {
    function getAllFaqs(){
        $faq = DB::table('faqs')->where('status',"1")->get();
        return $faq;
    }
}

if (! function_exists('getFaqsById')) {
    function getFaqsById($faqs){
        $faq = DB::table('faqs')->whereIn('id',json_decode($faqs))->where('status',"1")->get();
        return $faq;
    }
}

if (! function_exists('getTestimonials')) {
    function getTestimonials(){
        $faq = DB::table('testimonials')->where('status',"1")->get();
        return $faq;
    }
}

if (! function_exists('getQualifications')) {
    function getQualifications(){
        try {
            $qualifications = DB::table('highest_qualifications')->get();
            return $qualifications;
        } catch(\Illuminate\Database\QueryException $e){
            throw $e;
        }
    }
}

if (! function_exists('getStates')) {
    function getStates(){
        try {
            $states = State::orderBy("name","asc")->get();
            return $states;
        } catch(\Illuminate\Database\QueryException $e){
            throw $e;
        }
    }
}

if (! function_exists('getStateById')) {
    function getStateById($id){
        try {
            $state = State::findOrFail($id);
            return $state;
        } catch(\Illuminate\Database\QueryException $e){
            throw $e;
        }
    }
}

if (! function_exists('getCityById')) {
    function getCityById($id){
        try {
            $city = DB::table('cities')->where('id',$id)->first();
            return $city;
        } catch(\Illuminate\Database\QueryException $e){
            throw $e;
        }
    }
}

if (! function_exists('getCitiesByStateName')) {
    function getCitiesByStateName($state){
        try {
            $cities = DB::table('cities')
            ->join('states', 'cities.state_id', '=', 'states.id')
            ->where('states.id',$state)
            ->select('cities.*')
            ->get();
            return $cities;
        } catch(\Illuminate\Database\QueryException $e){
            throw $e;
        }
    }
}

if (!function_exists('getCenterByStateId')) {
    function getCenterByStateId($state = null,$centername = null){
        $center = DB::table('centers')
                ->join('states', 'states.id', '=', 'centers.state_id')
                ->select('centers.id','centers.name');
        if($state){
            $center->where('states.name',$state);
        }

        if($centername){
            $center->where('centers.name',$centername);
        }

        $center->where('centers.status','1');
        $center = $center->orderBy('name', 'asc')->get();       
        return $center;
    }
}

if (! function_exists('getGallery')) {
    function getGallery($course_id=null, $center_id=null){
        $gallery = DB::table('gallery');
        if($center_id){
            $gallery->where("center_id",$center_id);
        } 
        $gallery = $gallery->get();       
        return $gallery;
    }
}

if (! function_exists('getRecruters')) {
    function getRecruiters(){
        $recruiters = DB::table('recruiters')->get();
        return $recruiters;
    }
}

if (! function_exists('getPlacements')) {
    function getPlacements($limit = 1000){
        $placements = DB::table('placements')->limit($limit)->inRandomOrder()->get();
        return $placements;
    }
}

if (! function_exists('getAllBlogs')) {
    function getAllBlogs($limit = "100"){
        // Get Post
        $post = [];
        $url = env("APP_URL")."/blog/wp-json/wp/v2/posts?filter[orderby]=date&order=desc&per_page=".$limit."&_fields=id,title,date";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        if(json_decode($resp)){
            $post = json_decode($resp);
        }
        return $post;
    }
}

if (! function_exists('getBlogs')) {
    function getBlogs($ids = null,$limit=100,$offset=0){
        try {
            
            $post = array();
            $includes = '';
            if($ids != null){
                $ids = implode(",",json_decode($ids,true));
                $includes = "include=".$ids;
            }
            $url = env("APP_URL")."/blog/wp-json/wp/v2/posts?".$includes."&per_page=".$limit."&offset=".$offset."&_fields=&_fields=id,title,excerpt,featured_media,date,link,author,categories&date";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            //for debug only!
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $resp = curl_exec($curl);
            curl_close($curl);
            $post = json_decode($resp);

            foreach ($post as $key => $value) {
                $image_url = env("APP_URL")."/blog/wp-json/wp/v2/media/".$value->featured_media;
                $post[$key]->source_url = (curl_function($image_url)->source_url)?curl_function($image_url)->source_url:"";
                
                $author_url = env("APP_URL")."/blog/wp-json/wp/v2/users/".$value->author."?&_fields=id,name,avatar_urls,link";
                $post[$key]->author = (curl_function($author_url))?curl_function($author_url):[];

                if($value->categories){
                    $categories = implode(',',$value->categories);
                    $category_url = env("APP_URL")."/blog/wp-json/wp/v2/categories?include=".$categories."&_fields=name,link";
                    $post[$key]->category = (curl_function($category_url))?curl_function($category_url):[];
                }
            }
            return $post;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}

if (! function_exists('getUtmCampaign')) {
    function getUtmCampaign($params = null){
        if(request()->has('utm_campaign')){
            return request()->get('utm_campaign');
        }
        return ($params)?$params:get_theme_setting('utm_campaign');
    }
}

if (! function_exists('getUtmSource')) {
    function getUtmSource($params = null){
        if(request()->has('utm_source')){
            return request()->get('utm_source');
        }
        return ($params)?$params:get_theme_setting('utm_source');
    }
}

if (! function_exists('getCommunicationMedium')) {
    function getCommunicationMedium($params = null){
        if(request()->has('lead_type')){
            return request()->get('lead_type');
        }
        return ($params)?$params:get_theme_setting('lead_type');
    }
}

if (! function_exists('encryption')) {
    function encryption($plainText,$key)
    {
        $key = hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        $encryptedText = bin2hex($openMode);
        return $encryptedText;
    }
}

if (! function_exists('decryption')) {
    function decryption($encryptedText,$key)
    {
        $key = hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText = hextobin($encryptedText);
        $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        return $decryptedText;
    }
}

if (! function_exists('hextobin')) {
    function hextobin($hexString){ 
        $length = strlen($hexString); 
        $binString="";   
        $count=0; 
        while($count<$length) 
        {       
            $subString =substr($hexString,$count,2);           
            $packedString = pack("H*",$subString); 
            if ($count==0) {
                $binString=$packedString;
            } 
            
            else {
                $binString.=$packedString;
            } 
            
            $count+=2; 
        } 
        return $binString; 
    } 
}

if (! function_exists('random_strings')) {
    function random_strings($length_of_string) {
    
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
        // Shuffle the $str_result and returns substring
        // of specified length
        return substr(str_shuffle($str_result),
                        0, $length_of_string);
    }
}

if (! function_exists('curl_function')) {
    function curl_function($url,$data=null) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        $resp = curl_exec($curl);
        curl_close($curl);
        return json_decode($resp,true);
    }
}

if (! function_exists('curl_post_function')) {
    function curl_post_function($url,$data=null) {
        $data = json_encode($data);
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
        return json_decode($resp,true);
    }
}