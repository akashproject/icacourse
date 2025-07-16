<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseType;

class CourseController extends Controller
{
    //
    public function index()
    {
        try {
            $courses = Course::all();
            return view('administrator.courses.index',compact('courses'));

        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
        
    }

    public function add() {
        $courseTypes = CourseType::all();
        return view('administrator.courses.add',compact('courseTypes'));
    }

    public function show($id)
    {
        try {
            $categories = CourseType::all();
            $course = Course::find($id);
            $course->subjects = json_decode($course->subjects);
            $course->faqs = json_decode($course->faqs);
            return view('administrator.courses.show',compact('course','categories'));
        } catch(\Illuminate\Database\QueryException $e){
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'name' => 'required',
                'slug' => 'required',
            ]);
            $data['subjects'] = isset($data['subjects'])?json_encode($data['subjects']):null;
            if($data['course_id'] <= 0){
                $course = Course::create($data);
            } else {
                $course = Course::findOrFail($data['course_id']);
                $course->update($data);
            }

            return redirect()->back()->with('message', 'Course updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function delete($id) {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect('/administrator/courses');
    }
}
