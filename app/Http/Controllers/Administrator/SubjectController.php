<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Topic;

class SubjectController extends Controller
{
    //
    public function index()
    {
       
        try {
            $subjects = Subject::all();
            return view('administrator.subjects.index',compact('subjects'));

        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }        
    }

    public function add() {
        try {
            return view('administrator.subjects.add');
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
        
    }

    public function show($id)
    {
        try {
            $subject = Subject::findorFail($id);
            return view('administrator.subjects.show',compact('subject'));
        } catch(\Illuminate\Database\QueryException $e){
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'title' => 'required',
                'slug' => 'required',
            ]);
            
            if($data['subject_id'] <= 0){
                Subject::create($data);
            } else {
                $subject = Subject::findOrFail($data['subject_id']);
                $subject->update($data);
            }
            return redirect()->back()->with('message', 'Subject updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function delete($id) {
        $course = Subject::findOrFail($id);
        $course->delete();
        return redirect()->back()->with('message', 'Subject deleted successfully!');
    }
}
