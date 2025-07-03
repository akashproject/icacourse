<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','order_id','profile_id','coupon','student_code','money_receipt','payment_id','payment_mode','status','erp_status','erp_response','gateway_response','mail_status','source','created_at',
    ];
}
