<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseType;

class CourseTypeController extends Controller
{
    public function index()
    {
        try {

            $courseType = CourseType::all();
            $listCourseType = CourseType::all();
            return view('administrator.coursetype.index',compact('courseType','listCourseType'));

        } catch(\Illuminate\Database\QueryException $e){
            throw $e;
        }
    }

    public function show($id)
    {
        try {
            $courseType = CourseType::find($id);
            $listCourseType = CourseType::all();

            return view('administrator.coursetype.show',compact('courseType','listCourseType'));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'status' => 'required',
            ]);
            if($data['course_type_id'] <= 0){
                CourseType::create($data);
            } else {
                $courseType = CourseType::findOrFail($data['course_type_id']);
                $courseType->update($data);
            }
            return redirect()->back()->with('message', 'Page updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    
    public function delete($id) {
        $course = CourseType::findOrFail($id);
        $course->delete();
        return redirect('/administrator/courses');
    }
}
