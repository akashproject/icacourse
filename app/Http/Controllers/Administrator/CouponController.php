<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function index()
    {
       
        try {
            $coupons = Coupon::all();
            return view('administrator.coupons.index',compact('coupons'));

        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }        
    }

    public function add() {
        try {
            return view('administrator.coupons.add');
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
        
    }

    public function show($id)
    {
        try {
            $coupon = Coupon::findorFail($id);
            return view('administrator.coupons.show',compact('coupon'));
        } catch(\Illuminate\Database\QueryException $e){
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'code' => 'required',
                'discount' => 'required',
                'discount_type' => 'required',
                'message' => 'required',
                'number_of_use' => 'required',
                'expire_date' => 'required',
                'status' => 'required',
            ]);
           
            if($data['coupon_id'] <= 0){
                Coupon::create($data);
            } else {
                $institute = Coupon::findOrFail($data['coupon_id']);
                $institute->update($data);
            }
            return redirect()->back()->with('message', 'Coupon updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function delete($id) {
        $course = Coupon::findOrFail($id);
        $course->delete();
        return redirect()->back()->with('message', 'Coupon deleted successfully!');
    }
}
