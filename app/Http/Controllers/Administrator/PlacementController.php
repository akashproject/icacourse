<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Placement;
use App\Models\Course;
use App\Models\Recruiter;
use App\Models\Institute;
use Illuminate\Support\Facades\Storage;

class PlacementController extends Controller
{
    //
    public function index()
    {
        try {
            $placements = Placement::all();
            return view('administrator.placements.index',compact('placements'));
        } catch(\Illuminate\Database\QueryException $e){
            throw $e;
        }        
    }

    public function add() {
        try {
            $courses = Course::all();
            $recruiters = Recruiter::all();
            $institutes = Institute::all();
            return view('administrator.placements.add',compact('institutes','courses','recruiters'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
    }

    public function show($id)
    {
        try {
            $placement = Placement::findOrFail($id);
            $courses = Course::all();
            $recruiters = Recruiter::all();
            $centers = Institute::all();
            return view('administrator.placements.show',compact('placement','courses','centers','recruiters'));
        } catch(\Illuminate\Database\QueryException $e){
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'name' => 'required',
                'course_id' => 'required',
                'placed_at' => 'required',
            ]);
            if($data['placement_id'] <= 0){
                Placement::create($data);
            } else {
                $placement = Placement::findOrFail($data['placement_id']);
                $placement->update($data);
            }
            return redirect()->back()->with('message', 'Placement updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function delete($id) {
        $centerCourse = Placement::findOrFail($id);
        $centerCourse->delete();
        return redirect()->back()->with('message', 'Placement deleted successfully!');
    }

    public function import() {
        return view('administrator.placements.import');
    }

    public function upload(Request $request) {
        try {
            $data = $request->all();
            $request->validate([
                'placement' => 'required|file|mimes:csv,txt',
            ]);
            echo "<pre>";
            $file = $_FILES["placement"]["tmp_name"];
            if (($handle = fopen($file, "r")) !== false) {
                // Loop through the file line by line
                while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                    $student = [
                        'name'=> $data['0'],
                        'course_id'=> $data['1'],
                        'dasignation'=> $data['2'],
                        'placed_at'=> $data['3'],
                        'joining_salary'=> $data['4'],
                        'center_id'=> $data['5'],
                        'status'=> '1',
                    ];
                    Placement::create($student);
                    //print_r($student);
                }
        
                fclose($handle);
            }
            //exit;
            return redirect()->back()->with('message', 'Imported updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

}
