<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = 'pages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','name','slug','banner_image','excerpt','description','template','title','enable_otp','meta_description','schema','robots','utm_campaign','utm_source','lead_type','status','created_at',
    ];
}