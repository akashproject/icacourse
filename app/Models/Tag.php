<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    use HasFactory;
    protected $table = 'tags';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','name','slug','excerpt','description','banner_image','featured_image','enable_otp','title','meta_description','schema','robots','canonical','utm_campaign','utm_source','status','created_at',
    ];
}
