<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recruiter;

class RecruiterController extends Controller
{
    public function index()
    {
        try {
            $recruiters = Recruiter::all();
            return view('administrator.recruiters.index',compact('recruiters'));

        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
    }

    public function add() {        
        return view('administrator.recruiters.add');
    }

    public function show($id)
    {
        try {
            $recruiter = Recruiter::findOrFail($id);
            return view('administrator.recruiters.show',compact('recruiter'));
        } catch(\Illuminate\Database\QueryException $e){
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'name' => 'required',
                'status' => 'required',
            ]);

            if($data['recruiter_id'] <= 0){
                Recruiter::create($data);
            } else {
                $recruiter = Recruiter::findOrFail($data['recruiter_id']);
                $recruiter->update($data);
            }
            return redirect()->back()->with('message', 'Recruiter updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function delete($id) {
        $recruiter = Recruiter::findOrFail($id);
        $recruiter->delete();
        return redirect()->back()->with('message', 'Recruiter deleted successfully!');
    }
}
