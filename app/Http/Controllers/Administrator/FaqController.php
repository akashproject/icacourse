<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    //
    public function index()
    {
        try {
            $faqs = Faq::all();
            return view('administrator.faqs.index',compact('faqs'));

        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }        
    }

    public function add() {
        try {
            return view('administrator.faqs.add');
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
        
    }

    public function show($id)
    {
        try {
            $faq = Faq::findorFail($id);
            return view('administrator.faqs.show',compact('faq'));
        } catch(\Illuminate\Database\QueryException $e){
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'question' => 'required',
                'answer' => 'required',
            ]);
           
            if($data['faq_id'] <= 0){
                Faq::create($data);
            } else {
                $faq = Faq::findOrFail($data['faq_id']);
                $faq->update($data);
            }
            return redirect()->back()->with('message', 'Faq updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function delete($id) {
        $course = Faq::findOrFail($id);
        $course->delete();
        return redirect()->back()->with('message', 'Faq deleted successfully!');
    }
}
