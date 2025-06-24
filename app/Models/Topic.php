<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;
    protected $table = 'topics';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','subject_id','name','duration','status','created_at',
    ];
}
