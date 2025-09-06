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
            $success = Order::where('status','success')->whereNotNull('payment_id')->count();
            $erpStatusFailed = Order::where('erp_status','0')->where('status','success')->count();
            $admissions = Order::where('status','success')->whereNotNull('student_code')->whereNotNull('payment_id')->where('erp_status','1')->count();

            return view('administrator.orders.index',compact('orders','pending','success','admissions','erpStatusFailed'));

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

    public function filterOrder($status)
    { 
        try {

            $orders = Order::all();
            $pending = Order::where('status','pending')->count();
            $success = Order::where('status','success')->whereNotNull('payment_id')->count();
            $erpStatusFailed = Order::where('erp_status','0')->where('status','success')->count();
            $admissions = Order::where('status','success')->whereNotNull('student_code')->whereNotNull('payment_id')->where('erp_status','1')->count();

            $orders = Order::select();
            switch ($status) {
                case 'admissions':
                    $orders = $orders->where('status',"success")->whereNotNull('student_code')->whereNotNull('payment_id')->where('erp_status','1');
                    break;
                case 'success':
                    $orders = $orders->where('status',"success")->whereNotNull('payment_id');
                    break;
                case 'pending':
                    $orders = $orders->where('status',"pending")->whereNull('student_code')->whereNull('payment_id')->where('erp_status','0');
                    break;
                case 'erp-failed':
                    $orders = $orders->where('status',"success")->whereNotNull('payment_id')->where('erp_status','0');
                    break;
                default:
                    # code...
                    break;
            }

            $orders = $orders->orderBy("id","desc")->get();
            return view('administrator.orders.index',compact('orders','pending','success','admissions','erpStatusFailed'));
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
        $results = DB::table('orders')->select('orders.id as id','students.id as student_id','orders.order_id','orders.coupon','orders.amount','orders.discount','orders.student_code','orders.money_receipt','orders.payment_id','orders.payment_mode','orders.status','orders.erp_status','orders.created_at','students.first_name','students.last_name','students.guardian_name','students.mobile','students.email','students.date_of_birth','students.address','students.state','students.city','students.pincode')->join('students', 'orders.profile_id', '=', 'students.id')->get();
        $csvData = [];
        $csvData[] = ['Order ID','Name','Email','Mobile','Guardian Name','Date Of Birth','Address','State','City','Pincode','Courses','Course Price','Course Discount','Total Discount','Total Course Price','Total Paid','Student Code','Money Receipt','Payment Id','Payment Mode','Status','ERP Status','Created At'];
        foreach ($results as $row) {
            $courses = "";
            $course_price = "";
            $course_discount = "";
            $order_items = DB::table('order_items')
            ->join('courses', 'order_items.course_id', '=', 'courses.id')
            ->select('courses.name as course', 'order_items.fee_id', 'order_items.amount', 'order_items.discount')
            ->where('order_items.order_id',$row->id)
            ->get();
            foreach ($order_items as $key => $item) {
                $courses .= $item->course.' | ';
                $course_price .= $item->amount.' | ';
                $course_discount .= $item->discount.' | ';
            }
            $csvData[] = [
                $row->order_id,
                $row->first_name.' '.$row->last_name,
                $row->email,
                $row->mobile,
                $row->guardian_name,
                $row->date_of_birth,
                $row->address,
                $row->state,
                $row->city,
                $row->pincode,
                $courses,
                $course_price,
                $course_discount,
                $row->discount,
                $row->amount,
                $row->amount - $row->discount,
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
