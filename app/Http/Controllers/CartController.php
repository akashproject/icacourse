<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\VarthanaLoanApplicationForm;

class CartController extends Controller
{
    //
    public $_statusOK = 200;
    public $_statusErr = 500;
    private $counter = 1;

    public function addToCart(Request $request)
    {
        try {
            $data = $request->all();      
            $carts = ($request->cookie('cartItems'))?json_decode($request->cookie('cartItems'),true):[];
            $carts[$data['course_id']] = $data['course_fee_id'];
            $carts = json_encode($carts);
            return response($carts)->cookie('cartItems', $carts, 600000);
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }

    public function carts(Request $request)
    {
       
        $carts = json_decode($request->cookie('cartItems'),true);
    }

    public function removeFromCart(Request $request) {
        try {
            $data = $request->all(); 
            $carts = ($request->cookie('cartItems'))?json_decode($request->cookie('cartItems'),true):[];
            unset($carts[$data['course_id']]);
            $carts = json_encode($carts);
            return response(true)->cookie('cartItems', $carts, 600000);
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }

    public function checkLoanEligibility($course_id)
    {
        
        $contentMain = (object)[
            'enable_otp' => get_theme_setting('enable_otp')
        ];
        $course_id = base64_decode($course_id);
        return view("cart.check-loan-eligibility",compact('course_id','contentMain'));
    }

    public function submitLoanEligibilityForm(Request $request)
    {
        try {
            $data = $request->all();
            VarthanaLoanApplicationForm::create($data);
            return redirect()->back()->with('message', 'Loan Application Form Submitted successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }

    public function uploadPayslips(Request $request)
    {
        try {
            if (!$request->hasFile('file')) {
                return false;                
            }
            $request->validate([
                'file' => 'required|mimes:jpeg,jfif,webp,png,jpg,gif,svg,doc,docx,pdf,mp4,m3u8,flv,wmv,avi,mov,3gp',
            ]); 
            $fileData = $request->file('file');
            $today = date("Y-m-d");
            $fileName = $this->rename(str_replace(" ","-",strtolower($request->file->getClientOriginalName())));
            
            $folder = public_path('upload/'.$today);
            if(!File::exists($folder)) {
                File::makeDirectory($folder, 0777, true); //creates directory
            }

            if(!$request->file('file')->move(public_path('upload/'.date("Y-m-d")),$fileName)){
                return false;
            }
            
            return config('app.url').'public/upload/'.$today.'/'.$fileName;
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }

    public function rename($filename){
        
        if(!file_exists(public_path('upload/'.date("Y-m-d")).'/'.$filename)){
            return $filename;
        } else {
            if($this->counter > 1){
                $filenameArr = explode("-",$filename);
                $filenameArr['0'] = $this->counter;
                $filename = implode("-",$filenameArr);
            } else {
                $filename = $this->counter.'-'.$filename;
            }
            $this->counter++;
            return $this->rename($filename);
        }
    }

    

    
    
}
