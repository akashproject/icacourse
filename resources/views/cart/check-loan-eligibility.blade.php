@extends('layouts.main')
@section('content')

<div class="section-padding" style="background: #f9f6f6;">
    <div class="container ">
        <div class="row">
            <div class="col-md-12 text-center " >
                <div class="lead_page_form">
                    <form method="post" id="varthana_loan_application_form" action="{{ route('submit-loan-eligibility-form') }}">
                        @csrf
                        <h3 class="intro_title my-4"> Funded By </h3>
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-control funded_by" name="funded_by" id="funded_by" required="">
                                        <option value="">Select Funded By</option>
                                        <option value="Self">Self</option>
                                        <option value="Parent/Gurdian">Parent/Gurdian</option>
                                    </select>
                                    <label for="funded_by" >Funded By<span class="required">*</span></label>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h3 class="intro_title my-4"> Personal Information </h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Enter Full Name" autocomplete="off" required="">
                                    <label for="full_name">Full Name<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="text" id="father_name" name="father_name" class="form-control" placeholder="Enter Father Name" autocomplete="off" required="">
                                    <label for="father_name">Father Name<span class="required">*</span></label>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" placeholder="Enter Date of Birth" autocomplete="off" required="">
                                    <label for="date_of_birth">Date of Birth<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    
                                    <select class="form-control" id="marital_status" name="marital_status" required="">
                                        <option value="">Select Marital Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                    </select>
                                    <label id="marital_status" >Marital Status<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <select class="form-control gender" name="gender" id="gender" required="">
                                        <option value=""></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label for="gender" >Gender<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="text" name="highest_qualification" class="form-control" placeholder="Please Enter Highest Qualification" autocomplete="off" required="">
                                    <label for="highest_qualification" >Highest Qualification<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="number" id="lead_mobile_info" name="lead_mobile[1]" class="form-control" placeholder="Mobile Number" min="6000000000" max="9999999999" autocomplete="off" required>
                                    <label for="lead_mobile_info">Mobile <span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2"> 
                                    <input type="email" id="emailaddress" name="emailaddress" class="form-control" placeholder="Please Enter Email Address" autocomplete="off" required="">
                                    <label for="emailaddress">Email Address<span class="required">*</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-left">
                                <p class="mb-0"> <strong>Please Provide Address Information</strong> </p>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="text" name="current_address" id="current_address" class="form-control" placeholder="Enter Current Address" autocomplete="off" required="">
                                    <label for="current_address">Current Address<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" id="current_pincode" name="current_pincode" class="form-control" placeholder="Enter Current pincode" autocomplete="off" required="">
                                    <label for="current_pincode" >Current Pincode<span class="required">*</span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-control" name="state" id="state" onChange="getCitiesByStateId(this);" required>
                                        <option value="">  Select State</option>
                                        @foreach(getStates() as $value)
                                        <option value="{{ $value->Id }}" {{ (isset($student['state']) && $student['state'] == $value->Id )?'selected':''}}> {{ $value->name }} </option>
                                        @endforeach
                                    </select>
                                    <label for="state" >State</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-control" name="city" id="city" required="">
                                        <option value="">  Select City</option>
                                        @if(isset($student['state']))
                                            @foreach(getCitiesByStateName($student['state']) as $value)
                                            <option value="{{ $value->id }}" {{ (isset($student['city']) && $student['city'] == $value->id )?'selected':''}}> {{ $value->name }} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <label for="city">City</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    
                                    <select class="form-control current_residence_type" name="current_residence_type" id="" required="">
                                        <option value="">Select Residencial Type</option>
                                        <option value="Rented">Rented</option>
                                        <option value="Owned">Owned</option>
                                    </select>
                                    <label>Residence Type<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="text" name="no_of_years_current_residence" class="form-control" placeholder="Enter Number of Years in current Residence" autocomplete="off" required="">
                                    <label>Number of Years in current Residence<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-12 text-left">
                                <p class="mb-0"> <strong><input type="checkbox" class="copy_address"> My Permant address same as current</strong> </p>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="text" name="permanent_address" class="form-control" placeholder="Enter Current Address" autocomplete="off" required="">
                                    <label>Permanent Address<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="text" name="permanent_pincode" class="form-control" placeholder="Enter Current pincode" autocomplete="off" required="">
                                    <label>Permanent Pincode<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="text" name="permanent_city" class="form-control" placeholder="Enter Current city" autocomplete="off" required="">
                                    <label>Permanent City<span class="required">*</span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <select class="form-control residence_type" name="permanent_residence_type" id="" required="">
                                        <option value="">Select Residencial Type</option>
                                        <option value="Rented">Rented</option>
                                        <option value="Owned">Owned</option>
                                    </select>
                                    <label>Permanent Residence Type<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="text" name="no_of_years_permanent_residence" class="form-control" placeholder="Enter Number of Years in current Residence" autocomplete="off" required="">
                                    <label>Number of Years in permanent Residence<span class="required">*</span></label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3 class="intro_title my-4"> Please Share Professionals Details </h3>
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    
                                    <select class="form-control occupation" name="occupation" id="occupation" required="">
                                        <option  value="">Select Occupation</option>
                                        <option data-id="self_employed" value="Self Employed">Self Employed</option>
                                        <option data-id="retired" value="Retired">Retired</option>
                                        <option data-id="salaried"  value="Salaried">Salaried</option>
                                    </select>
                                    <label>Occupation<span class="required">*</span></label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="professional_section salaried">
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="designation" class="form-control" placeholder="Designation" autocomplete="off" required="">
                                         <label>Designation<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="company_name" class="form-control" placeholder="Company name" autocomplete="off" required="">
                                        <label>Company name<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="employer_address" class="form-control" placeholder="Company name" autocomplete="off" required="">
                                        <label>Address of Employer<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="state_city" class="form-control" placeholder="Enter State & City" autocomplete="off" required="">
                                        <label>State & City<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="pincode" class="form-control" placeholder="Pincode" autocomplete="off" required="">
                                        <label>Pincode<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="employer_address" class="form-control" placeholder="Company name" autocomplete="off" required="">
                                        <label>Current Employment in years<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="employer_address" class="form-control" placeholder="Company name" autocomplete="off" required="">
                                        <label>Current Employment in Month<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="work_experience" class="form-control" placeholder="Total Work Experience" autocomplete="off" required="">
                                        <label>Total Work Experience<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="work_experience_in_month" class="form-control" placeholder="Work Experience In Month" autocomplete="off" required="">
                                        <label>Work Experience In Month<span class="required">*</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="professional_section self_employed">
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <select class="form-control business_type" name="business_type" id="" required="">
                                            <option value="">Select Business Type</option>
                                            <option value="Private Limited">Private Limited</option>
                                            <option value="Propriter">Propriter</option>
                                            <option value="Partnership Firm">Partnership Firm</option>
                                        </select>
                                        <label>Business Type<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="business_name" class="form-control" placeholder="Enter Business Name" autocomplete="off" required="">
                                        <label>Name of Business<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="number_of_years_in_business" class="form-control" placeholder="Enter Number of Yeas in Business" autocomplete="off" required="">
                                        <label>Number of Yeas in Business<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="business_address" class="form-control" placeholder="Enter Address of Business" autocomplete="off" required="">
                                        <label>Address of Business<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="employer_address" class="form-control" placeholder="Company name" autocomplete="off" required="">
                                        <label>Current Employment in Month<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="total_business_experience" class="form-control" placeholder="Total Business Experience" autocomplete="off" required="">
                                        <label>Total Business Experience<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="work_experience_in_month" class="form-control" placeholder="Work Experience In Month" autocomplete="off" required="">
                                        <label>Work Experience In Month<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="pincode" class="form-control" placeholder="Work Experience In Month" autocomplete="off" required="">
                                         <label>Pincode<span class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="city_state" class="form-control" placeholder="City State" autocomplete="off" required="">
                                        <label>City & State<span class="required">*</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="intro_title my-4"> Loan & Finance Account Details </h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="text" name="loan_amount" class="form-control" placeholder="Enter Loan Amount" autocomplete="off" required="">
                                    <label>Loan Amount<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    
                                    <input type="text" name="monthly_salary" class="form-control" placeholder="Enter Monthly Salary In Hand" autocomplete="off" required="">
                                    <label>Monthly Salary In Hand<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    
                                    <select class="form-control loan_tenure" name="loan_tenure" id="" required="">
                                        <option value="">Select Loan Tenure</option>
                                       
                                    </select>
                                    <label>Loan Tenure<span class="required">*</span></label>
                                </div>
                            </div>
                        </div>
                        <h3 class="intro_title my-4"> Bank Accout Information </h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="text" name="bank_name" class="form-control" placeholder="Enter Bank Name" autocomplete="off" required="">
                                    <label>Bank Name<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="text" name="account_holder_name" class="form-control" placeholder="Enter Account Holder Name" autocomplete="off" required="">
                                    <label>Account Holder Name<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <select class="form-control account_type" name="account_type" id="" required="">
                                        <option value="">Select Account Type</option>
                                        <option value="Savings">Savings</option>
                                        <option value="Current">Current</option>
                                        <option value="Salaried">Salaried</option>
                                    </select>
                                    <label>Account Type<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="text" name="bank_account_number" class="form-control" placeholder="Enter Bank Account Number" autocomplete="off" required>
                                    <label>Bank Account Number<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-2">
                                    <input type="password" name="confirm_bank_account_number" class="form-control" placeholder="Confirm Bank Account Number" autocomplete="off" required>
                                    <label>Confirm Bank Account Number<span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <h6> Upload 3 Months Payslips </h6>
                                <div class="dropzone" id="file-dropzone"></div>
                            </div>
                            <input type="hidden" name="payslips" value="" id="varthana_payslips" required>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-center response_success" style="display:none;">
                                <div >
                                    <p class="margin-0px-bottom response_status" > Invalid One Time Password </p>
                                    <p class="margin-0px-bottom" >Please Enter OTP or <a href="javascript:void(0)" class="resendOtp" >Resend OTP</a> </p>
                                    <p class="margin-0px-bottom" >OTP will expire after 2mins : <span class="countdown"> 2:00 </span></p>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-floating mb-2 response_success"  style="display:none;">
                                    <label>One time password<span class="required">*</span></label>
                                    <input type="number" name="verify_otp" class="form-control verify_otp" autocomplete="off" >
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group disclaimer">
                                    <p style="margin:0">
                                        <input type="checkbox" class="" checked> I agree to receive updates on <i class="fab fa-whatsapp" style="color: green;"></i> whatsapp. 
                                    </p>
                                    <p>
                                        <input type="checkbox" class="" checked> I agree to <a href="/privacy-policy" >Privacy Policy</a> & overriding DNC/NDNC request for Call/SMS. 
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="thm-btn bg-thm-color-three thm-color-three-shadow btn-rectangle submit_varthana_loan_application_form"> Submit <i class="fal fa-chevron-right ml-2"></i></button>
                                <input type="hidden" name ="course_name" value="{{ $course_id }}" >
                                <input type="hidden" name ="course_id" value="{{ $course_id }}" >
                                <input type="hidden" name="responsed_otp" class="responsed_otp" value="">
                                <input type="hidden" name="is_enable_otp" class="is_enable_otp" value="1">
                                <input type="hidden" name ="utm_campaign" value="Varthana Application Form" >
                                <input type="hidden" name ="utm_source" value="" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection