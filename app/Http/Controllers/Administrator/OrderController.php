<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Student;


class OrderController extends Controller
{
    public function index()
    { 
        try {

            $orders = Order::all();
            return view('administrator.orders.index',compact('orders'));

        } catch(\Illuminate\Database\QueryException $e){

        }        
    }

    public function show($id)
    { 
        try {

            $order = Order::findOrFail($id);
            $orderItems = OrderItem::where('order_id',$id)->get();
            $studentData = Student::findOrFail($order->profile_id);
            return view('administrator.orders.show',compact('order','orderItems','studentData'));

        } catch(\Illuminate\Database\QueryException $e){

        }        
    }

    public function admissions()
    { 
        try {

            $admissions = Order::where('status','success')->get();
            return view('administrator.admissions.index',compact('admissions'));

        } catch(\Illuminate\Database\QueryException $e){
            
        }        
    }
}
