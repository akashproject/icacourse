<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    use HasFactory;
    protected $table = 'order_items';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','order_id','course_id','fee_id','amount','discount','created_at',
    ];
}
