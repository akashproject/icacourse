<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\VarthanaLoanApplicationForm;

class CartController extends Controller
{
    //
    public $_statusOK = 200;
    public $_statusErr = 500;

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
            $data = $request->all();
            $fileData = $request->file('file');
            dd($fileData);
            return redirect()->back()->with('message', 'Loan Application Form Submitted successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            //throw $th;
        }
    }

    

    
    
}
