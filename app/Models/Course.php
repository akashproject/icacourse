<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','name','type_id','subjects','slug','banner_image','featured_image','course_video_title','course_video_link','course_video_image','description','excerpt','duration','no_of_module','criteria','feature','highlights','certification','number_of_enrolled','number_of_rating','erp_course_id','display_price','price','enable_otp','title','meta_description','schema','robots','utm_campaign','utm_source','status','created_at',
    ];

    public function category()
    {
        return $this->belongsTo(CourseType::class,'id');
    }
}
