<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $table = 'testimonials';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','name','featured_image','course_id','dasignation','placed_at','comment','video','status','created_at'
    ];
}
