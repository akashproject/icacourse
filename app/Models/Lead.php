<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    //
    use HasFactory;
    protected $table = 'leads';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','first_name','last_name','lead_email','mobile','city','institute','pincode','lead_type','utm_source','utm_campaign','utm_term','utm_device','utm_creative','utm_adgroup','utm_content','utm_adset','store_area','ref_code','source_url','otp_status','crm_status','crm_response','whatsapp_status','mail_status','message_status','created_at',
    ];
}
