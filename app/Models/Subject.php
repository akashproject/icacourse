<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    use HasFactory;
    protected $table = 'subjects';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','name','slug','description','excerpt','duration','no_of_topic','title','meta_description','schema','robots','utm_campaign','utm_source','status','created_at',
    ];
}
