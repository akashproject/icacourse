<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\CourseType;
use App\Models\Course;

class CourseTypeController extends Controller
{
    //
    public function view($slug)
    {
        try {

            $contentMain = CourseType::whereRaw("`slug` COLLATE utf8mb4_bin = ?", [$slug])->first();
                            
            $categoryCourses = Course::where('type_id', 'like', '%"' . $contentMain->id . '"%')->get();

            $utm_campaign = $contentMain->utm_campaign;
            $utm_source = $contentMain->utm_source;
            
            
            return view('courseTypes.view',compact('contentMain','categoryCourses'));
        } catch(\Illuminate\Database\QueryException $e){
            return response()->json($e->getMessage(), 200);
        }
    }
}
