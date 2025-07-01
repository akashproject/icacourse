<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','first_name','last_name','guardian_name','mobile','email','date_of_birth','gender','qualification','language','address','state','city','pincode','created_at',
    ];
}
