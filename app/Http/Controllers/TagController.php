<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Course;

class TagController extends Controller
{
    //
    public function view($slug)
    {
        try {

            $contentMain = Tag::whereRaw("`slug` COLLATE utf8mb4_bin = ?", [$slug])->first();                           
            $tagCourses = Course::where('tags', 'like', '%"' . $contentMain->id . '"%')->where('status',"1")->where('visibility',"1")->get();
            $utm_campaign = $contentMain->utm_campaign;
            $utm_source = $contentMain->utm_source;
            
            
            return view('tags.view',compact('contentMain','tagCourses'));
        } catch(\Illuminate\Database\QueryException $e){
            return response()->json($e->getMessage(), 200);
        }
    }
}
