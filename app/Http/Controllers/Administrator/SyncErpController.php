<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;

class SyncErpController extends Controller
{

    public function courses() {
        try {
            $params = ['authtoken' => 'TEST001','source' => 'ICAJOBGUARANTEE','CentreCode' => 'RT01'];
            $courses = curl_post_function('https://new.icaerp.com/api/online/GetCoursewithTP',$params);
            $status = [];
            foreach ($courses as $key => $value) {
                $exists = Course::where('erp_course_id',$value['Id'])->exists();
                if (!$exists) {
                    $course = Course::create([
                        'name' => $value['Name'],
                        'slug' => strtolower(str_replace(" ","-",$value['Name'])),
                        'description' => $value['Name'],
                        'excerpt' => $value['Name'],
                        'erp_course_id' => $value['Id'],
                        'status' => '0',
                    ]);
                    $status[] = ($course)?$value['Id'].'- Insert successful':$value['Id'].'- Insertion Failed<br>';
                }
            }
            return view('administrator.sync.sync',compact('status'));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        } 
    }

    public function fees() {
        try {
            DB::table('fees')->truncate();
            $courses = Course::all();
            $status = [];
            foreach ($courses as $key => $course) {
                $params = [
                    'authtoken' => 'TEST001',
                    'source' => 'ICAJOBGUARANTEE',
                    'CentreCode' => 'RT01',
                    'CourseId' => $course->erp_course_id
                ];
                $fees = curl_post_function('https://new.icaerp.com/api/online/Getfeecoursecenterwise',$params);
                foreach ($fees as $key => $value) {
                    $value['CourseId'] = $course->erp_course_id;
                    $fee = DB::table('fees')->insert($value);
                    $status[] = ($fee)?$value['FeeID'].'- Insert successful':$value['FeeID'].'- Insertion Failed<br>';
                }
            }
            return view('administrator.sync.sync',compact('status'));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        } 
    }

    public function states() {
        try {
            $params = ['authtoken' => 'TEST001','source' => 'ICAJOBGUARANTEE','CentreCode' => 'RT01'];
            $states = curl_post_function('https://new.icaerp.com/api/online/GetStatedetails',$params);
            $state = DB::table('states')->truncate();

            $status = [];
            foreach ($states as $key => $value) {
                $state = DB::table('states')->insert($value);
                $status[] = ($state)?$value['Id'].'- Insert successful':$value['Id'].'- Insertion Failed<br>';
            }

            return view('administrator.sync.sync',compact('status'));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        } 
    }

    public function highestQualification() {
        try {
            $params = ['authtoken' => 'TEST001','source' => 'ICAJOBGUARANTEE','CentreCode' => 'RT01'];
            $qualifications = curl_post_function('https://new.icaerp.com/api/online/GetQualification',$params);
            DB::table('highest_qualifications')->truncate();
                
            $status = [];
            foreach ($qualifications as $key => $value) {
                $qualification = DB::table('highest_qualifications')->insert(['id'=>$value['ID'],'name'=>$value['NAME'],]);
                $status[] = ($qualification)?$value['ID'].'- Insert successful':$value['ID'].'- Insertion Failed<br>';
            }

            return view('administrator.sync.sync',compact('status'));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        } 
    }


    
}
