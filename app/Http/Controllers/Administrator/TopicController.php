<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Topic;

class TopicController extends Controller
{
    //
    public function index()
    {
       
        try {
            $topics = Topic::all();
            return view('administrator.topics.index',compact('topics'));

        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }        
    }

    public function add() {
        try {
            return view('administrator.topics.add');
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
        
    }

    public function show($id)
    {
        try {
            $topic = Topic::findorFail($id);
            return view('administrator.topics.show',compact('topic'));
        } catch(\Illuminate\Database\QueryException $e){
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'name' => 'required',
                'duration' => 'required',
                'subject_id' => 'required',
                'status' => 'required',
            ]);
           
            if($data['topic_id'] <= 0){
                Topic::create($data);
            } else {
                $institute = Topic::findOrFail($data['topic_id']);
                $institute->update($data);
            }
            return redirect()->back()->with('message', 'Topic updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function delete($id) {
        $course = Topic::findOrFail($id);
        $course->delete();
        return redirect()->back()->with('message', 'Topic deleted successfully!');
    }
}
