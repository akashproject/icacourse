<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;

class SyncErpController extends Controller
{
    public function index()
    {
        try {
            $data = [
                'authtoken' => 'TEST001',
                'source' => 'ICAJOBGUARANTEE',
                'CentreCode' => 'RT01'
            ];
            $courses = curl_post_function('https://new.icaerp.com/api/online/GetCoursewithTP',$data);
            
            foreach ($courses as $key => $course) {
                // Insert Course
                $course = Course::create([
                    'name' => $course->Name,
                    'slug' => strtolower(str_replace(" ","-",$course->Name)),
                    'description' => $course->Name,
                    'excerpt' => $course->Name,
                    'erp_course_id' => $course->Id
                ]);


                $feeData = [
                    'authtoken' => 'TEST001',
                    'source' => 'ICAJOBGUARANTEE',
                    'CentreCode' => 'RT01',
                    'CourseId' => $course->Id
                ];
                $fees = curl_post_function('https://new.icaerp.com/api/online/Getfeecoursecenterwise',$feeData);
                
                DB::table('fees')->insert($fees);
            }

            echo "inserted";

        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }        
    }
}
