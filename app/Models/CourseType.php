<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    use HasFactory;
    protected $table = 'course_types';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','parent_id','name','slug','excerpt','description','banner_image','featured_image','enable_otp','title','meta_description','schema','robots','canonical','utm_campaign','utm_source','status','created_at',
    ];


    public function course()
    {
        return $this->morphMany(Course::class, 'type_id');
    }

    public function children()
    {
        return $this->hasMany(CourseType::class, 'parent_id');
    }

}
