<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adpage extends Model
{
    use HasFactory;
    protected $table = 'adpages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','name','slug','banner_image','description','email','mobile','template','course_id','institute_id','faqs','title','enable_otp','store_area','meta_description','schema','robots','utm_campaign','utm_source','lead_type','status','created_at',
    ];
}
