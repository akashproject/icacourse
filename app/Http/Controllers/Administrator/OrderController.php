<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
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
            $pending = Order::where('status','pending')->count();
            $success = Order::where('status','success')->count();
            $erpStatusFailed = Order::where('erp_status','0')->where('status','success')->count();
            $erpStatusSuccess = Order::where('erp_status','1')->count();

            return view('administrator.orders.index',compact('orders','pending','success','erpStatusSuccess','erpStatusFailed'));

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

    public function exportCsv()
    {
        $results = DB::table('orders')->join('students', 'orders.profile_id', '=', 'students.id')->get();
        $csvData = [];
        $csvData[] = ['Order ID','Name','Email','Mobile','Date Of Birth','Address','State','City','Pincode','Courses','Total Amount', 'Discount','Student Code','Money Receipt','Payment Id','Payment Mode','Status','ERP Status','Created At'];

        foreach ($results as $row) {
            $courses = "";
            $order_items = DB::table('order_items')
            ->join('courses', 'order_items.course_id', '=', 'courses.id')
            ->select('courses.name as course', 'order_items.fee_id', 'order_items.amount', 'order_items.discount')
            ->where('order_items.order_id',$row->id)
            ->get();
            foreach ($order_items as $key => $item) {
                $courses .= $item->course.': Rs.'.$item->amount.' Discount Rs.'.$item->discount.' ,';
            }
            $csvData[] = [
                $row->order_id,
                $row->first_name.' '.$row->last_name,
                $row->email,
                $row->mobile,
                $row->date_of_birth,
                $row->address,
                $row->state,
                $row->city,
                $row->pincode,
                $courses,
                $row->amount,
                $row->discount,
                $row->student_code,
                $row->money_receipt,
                $row->payment_id,
                $row->payment_mode,
                $row->status,
                $row->erp_status,
                $row->created_at,
            ];
        }

        return response()->streamDownload(function () use ($csvData) {
            $handle = fopen('php://output', 'w');
            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }
            fclose($handle);
        }, 'orders_export.csv');
    }

}
