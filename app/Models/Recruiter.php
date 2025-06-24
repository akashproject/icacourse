<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;
    protected $table = 'recruiters';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id','featured_image','name','status','created_at'
    ];
}
