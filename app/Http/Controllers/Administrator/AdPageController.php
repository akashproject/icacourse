<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adpage;
use App\Models\Institute;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class AdPageController extends Controller
{
    public function index()
    {
        try {
            $adPages = Adpage::all();
            
            return view('administrator.adPages.index',compact('adPages'));

        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }        
    }

    public function add() {
        try {
            $courses = Course::all();
            $institutes = Institute::all();
            return view('administrator.adPages.add',compact('institutes','courses'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
    }

    public function show($id)
    {
        try {
            $courses = Course::all();
            $institutes = Institute::all();
            $adPage = Adpage::findorFail($id);
            return view('administrator.adPages.show',compact('adPage','institutes','courses'));
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
            
            if (isset($data['course_id']) && $data['course_id']!='') {
                $data['course_id'] = json_encode($data['course_id']);
            }
            if (isset($data['faqs']) && $data['faqs']!='') {
                $data['faqs'] = json_encode($data['faqs']);
            }
            if($data['adPage_id'] <= 0){
                $adPage = Adpage::create($data);
            } else {
                $adPage = Adpage::findOrFail($data['adPage_id']);
                $adPage->update($data);
            }

            return redirect()->back()->with('message', 'Ad Page updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function delete($id) {
        $course = Adpage::findOrFail($id);
        $course->delete();
        return redirect('/administrator/ad-pages');
    }
}
