<?php

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
use App\Models\StudentMeta;


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
    function get_courses(){
        $value = Course::where('status','1')->get();
        return (isset($value))?$value:"null";
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
    function getSubjectsBySubjectId($subject_id){
        $value = Topic::where('subject_id',$subject_id)->where('status','1')->get();
        return (isset($value))?$value:"null";
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

if (! function_exists('getStates')) {
    function getStates(){
        try {
            $states = State::where('status', 1)->orderBy("name","asc")->get();
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
            ->where('states.name',$state)
            ->select('cities.*')
            ->get();
            return $cities;
        } catch(\Illuminate\Database\QueryException $e){
            throw $e;
        }
    }
}

if (! function_exists('getInstitutes')) {
    function getInstitutes($course_id=null, $institute_id=null){    
        $institutes = DB::table('institutes')->orderBy("name","asc")->where('status',"1")->get();
        return $institutes;
    }
}

if (!function_exists('getCenterByCityId')) {
    function getCenterByCityId($city = null,$centername = null){
        $center = DB::table('centers')
                ->join('cities', 'cities.id', '=', 'centers.city_id')
                ->select('centers.id','centers.name');
        if($city){
            $center->where('cities.name',$city);
        }

        if($centername){
            $center->where('centers.name',$centername);
        }

        $center->where('centers.status','1');
        $center = $center->get();       
        return $center;
    }
}

if (!function_exists('getCenterById')) {
    function getCenterById($center_id = null){
        $center = DB::table('centers');
        if($center_id){
            $center->where('id',$center_id);
        }
        $center = $center->first();       
        return $center;
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

if (! function_exists('get_student_meta')) {
    function get_student_meta($student_id,$value){
        $student_meta = StudentMeta::where('student_id',$student_id)->where('key',$value)->first();
        return (isset($student_meta->value))?$student_meta->value:null;
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
        return json_decode($resp);
    }
}


if (! function_exists('curl_post_function')) {
    function curl_post_function($url,$data=null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($ch);
        curl_close ($ch);
        return json_decode($resp);
    }
}