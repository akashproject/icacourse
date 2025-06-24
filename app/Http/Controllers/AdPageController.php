<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adspage;
use App\Models\CourseType;
use Illuminate\Support\Facades\DB;

class AdPageController extends Controller
{
    public function index($slug,Request $request)
    {
        try {
            $institute = ($request->has("center"))?$request->input('center'):null;
            $contentMain = Adspage::where('slug', $slug)->firstOrFail();
            $courseType = null;
            $courses = null;
            if ($contentMain->course_type_id) {
                # code...
                $course_id = [];
                if($contentMain->course_id){
                    $course_id[] = $contentMain->course_id;
                } else {
                    $courses = DB::table('courses')->select('id')->whereIn('type_id',json_decode($contentMain->course_type_id))->get()->toArray();
                    foreach ($courses as $key => $value) {
                        $course_id[$key] = $value->id;
                    }
                }
                
                $courseType = CourseType::whereIn('id', json_decode($contentMain->course_type_id))->get();
                $courses = DB::table('courses')
                ->join('course_type', 'course_type.id', '=', 'courses.type_id')
                ->select('courses.*', 'courses.name as course_name','course_type.id as category_id','course_type.name as category','course_type.slug as categorySlug')
                ->whereIn('course_type.id', json_decode($contentMain->course_type_id))
                ->whereIn('courses.id', $course_id)
                ->where('courses.status', 1)
                ->distinct()
                ->orderBy('courses.id', 'asc')
                ->get();
            }
           
            
            return view("adPage.".$contentMain->template,compact('institute','contentMain','courseType','courses'));

        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
            var_dump($th);
        }
    }
}
