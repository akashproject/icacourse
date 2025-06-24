<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','code','discount','discount_type','message','number_of_use','expire_date','status','created_at',
    ];
}
