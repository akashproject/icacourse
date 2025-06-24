<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentMeta;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index()
    {
        try {
            $students = Student::all();
            return view('administrator.students.index',compact('students'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
    }

    public function students()
    {
        try {
            $students = Student::all();
            return view('administrator.students.index',compact('students'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
    }

    public function add() {
        return view('administrator.students.add');
    }

    public function studentByCategory($role){
        try {
            $students = Student::role($role)->get();
            return view('administrator.students.index',compact('students'));

        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
    }

    public function show($id){
        try {
            $student = Student::findOrFail($id);
            return view('administrator.students.show',compact('student'));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }        
    }

    public function insert(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required',
            ]);

            $student = Student::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
            ]);
            unset($data['_token']);
            unset($data['name']);
            unset($data['email']);
            unset($data['mobile']);

            foreach($data as $key => $value){
                $student_meta = StudentMeta::where('key', $key)->where('student_id',$student->id);
                $value = (is_array($value))?json_encode($value):$value;
                if($student_meta->exists()){
                    $student_meta->update(array("student_id"=>$student->id,"key"=>$key,"value"=>$value));  
                } else {
                    $student_meta->create(array("student_id"=>$student->id,"key"=>$key,"value"=>$value)); 
                }
            }

            return redirect()->back()->with('message', 'Student inserted successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required',
            ]);

            $student = Student::findOrFail($data['student_id']);
            $student->update($data);

            return redirect()->back()->with('message', 'Student updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function bulkUpload(){
        try {
            return view('administrator.students.upload');

        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function import(Request $request) {
        try {
            $data = $request->all();
            
            $validatedData = $request->validate([
                'bulkupload' => 'required|file|mimes:csv,txt',
            ]);

            // Get the uploaded file
            $file = $request->file('bulkupload');

            $students = [];
            if (($handle = fopen($file->getRealPath(), 'r')) !== FALSE) {
                // Optional: If your CSV has a header row, use the first row as keys
                $headers = fgetcsv($handle);
    
                while (($data = fgetcsv($handle)) !== FALSE) {
                    $students = array_combine($headers, $data);
                    $student = Student::create([
                        'name' => $students['name'],
                        'email' => $students['email'],
                        'mobile' => $students['mobile'],
                    ]);
                    unset($students['name']);
                    unset($students['email']);
                    unset($students['mobile']);
        
                    foreach($students as $key => $value){
                        $student_meta = StudentMeta::where('key', $key)->where('student_id',$student->id);
                        $value = (is_array($value))?json_encode($value):$value;
                        if($student_meta->exists()){
                            $student_meta->update(array("student_id"=>$student->id,"key"=>$key,"value"=>$value));  
                        } else {
                            $student_meta->create(array("student_id"=>$student->id,"key"=>$key,"value"=>$value)); 
                        }
                    }
                }
    
                fclose($handle);
            }
            return redirect()->back()->with('message', 'Student updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function approve($id,$is_approve) {
        $student = Student::findOrFail($id);
        $student->is_approved = $is_approve;
        $student->save();
        return redirect()->back()->with('success', 'Student approved successfully.');
    }

    public function delete($id) {
        try {
            $student = Student::findOrFail($id);
            $student->delete();
            return redirect()->back()->with('message', 'Student deleted successfully!');
       } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }
}