<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VarthanaLoanApplicationForm extends Model
{
    use HasFactory;
    protected $table = 'varthana_loan_application_forms';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','course_name','course_id','funded_by','full_name','father_name','date_of_birth','marital_status','gender','highest_qualification','mobile','emailaddress','current_address','current_pincode','current_city','current_residence_type','no_of_years_current_residence','permanent_address','permanent_pincode','permanent_city','permanent_residence_type','no_of_years_permanent_residence','occupation','designation','company_name','employer_address','state_city','pincode','e_mployer_address','work_experience','work_experience_in_month','business_type','business_name','number_of_years_in_business','business_address','total_business_experience','city_state','loan_amount','monthly_salary','loan_tenure','bank_name','account_holder_name','account_type','bank_account_number','payslips','created_at',
    ];
}
