<div class="form-one__group">
    <div class="lead_steps step_1 active">
        <h3 class="td_mb_20 td_fs_24 td_semibold mb-3">Let’s get you started!</h3>
        <div class="row td_mb_10 td_row_gap_16">
            <div class="col-md-6 mb-2">
                <input type="text" name="lead_full_name" class="td_form_field_2 td_mb_16" placeholder="Enter Full name" required>
            </div>
            <div class="col-md-6 mb-2">
                <input type="email" name="lead_email" class="td_form_field_2 td_mb_16" placeholder="Enter Email Address" required>
            </div>
            <div class="col-md-6 mb-2">
                <input type="hidden" name="lead_mobile_number[0]" value="+91"><input type="tel" id="lead_mobile_info" name="lead_mobile_number[1]" class="td_form_field_2 td_mb_16" placeholder="Enter Mobile Number" required>
            </div>
            <div class="col-md-6 mb-2">
                <input type="number" name="pincode" min="000000" max="999999" class="td_form_field_2 td_mb_16" placeholder="Enter Pincode" required>
            </div>
        </div>
        <p class="td_fs_14 td_mb_20 mt-3">By entering the OTP and clicking continue I confirm that I have read, understood and agree with the <a href="{{ url('/term-condition') }}" >Terms and Conditions</a> and <a href="{{ url('/privacy-policy') }}" >Privacy Policy</a>.</p>
        <div class="row align-items-center td_row_reverse_lg td_gap_y_20">
            <div class="col-lg-6 text-center-lg">
            
            </div>
            <div class="col-lg-6 d-flex" style="align-items: center;">
                <div class="form-one__control form-one__control--full mx-2">
                    <button type="submit" class="eduhive-btn">
                        <span>Continue OTP</span>
                        <span class="eduhive-btn__icon"><i class="icon-right-up"></i></span>
                    </button>
                </div>
                <span > <img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/loader.gif" alt="working" style="width: 42px;display:none" class="checkout_loader"></span>
            </div>

        </div>
    </div>
    <div class="lead_steps step_2">
        <h3 class="td_mb_20 td_fs_24 td_semibold">We’ve sent you an OTP</h3>
        <p class="td_fs_14 m-0">On your phone number <a href="javascript:void(0)" class="backstep">+91 <span class="submitted_lead_mobile_no">62905-65997</span> <i class="fa fa-edit" ></i> </a></p>
        <div id="otp_target"></div>
        <span id="otp_target-error" class="otp_error" style="display:none">Please Enter valid OTP</span>
        <div class="otp-content">
            <p class="message"> Did not receive OTP?
                <span class="countdown_label"> Resend in <span class="countdown" >59</span> Sec </span>
                <a class="resendOtp display-none" href="javascript:void(0)"> Resend OTP </a>
            </p>
        </div>
        <p class="td_fs_14 td_mb_20 mt-3">By entering the OTP and clicking continue I confirm that I have read, understood and agree with the <a href="{{ url('/term-condition') }}" >Terms and Conditions</a> and <a href="{{ url('/privacy-policy') }}" >Privacy Policy</a>.</p>
        <div class="row align-items-center td_row_reverse_lg td_gap_y_20">
            <div class="col-lg-6 text-center-lg">
            
            </div>
            <div class="col-lg-6">
                <div class="form-one__control form-one__control--full">
                    <button type="submit" class="eduhive-btn">
                        <span>Register Now</span>
                        <span class="eduhive-btn__icon"><i class="icon-right-up"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" class="formFieldOtpResponse" >
    <input type="hidden" class="lead_id" name="lead_id"> 
</div>
@if(isset($institute))
<input type="hidden" name="institute" value="{{ $institute }}" >
@endif
<input type="hidden" name="utm_campaign" value="{{ getUtmCampaign(isset($contentMain->utm_campaign)?$contentMain->utm_campaign:null) }}">
<input type="hidden" name="utm_source" value="{{ getUtmSource(isset($contentMain->utm_source)?$contentMain->utm_source:null) }}">
<input type="hidden" name ="lead_type" value="{{ getCommunicationMedium(isset($contentMain->lead_type)?$contentMain->lead_type:null) }}" >
<input type="hidden" name ="store_area" value="{{ isset($contentMain->store_area)?$contentMain->store_area:'1' }}" >
<input type="hidden" name ="utm_term" value="{{ (isset($_GET['utm_term']))?$_GET['utm_term']:'' }}" >  
<input type="hidden" name ="utm_device" value="{{ (isset($_GET['utm_device']))?$_GET['utm_device']:'' }}" >  
<input type="hidden" name ="utm_adgroup" value="{{(isset($_GET['utm_adgroup']))?$_GET['utm_adgroup']:''}}" >  
<input type="hidden" name ="utm_content" value="{{(isset($_GET['utm_content']))?$_GET['utm_content']:''}}" > 
<input type="hidden" name ="utm_creative" value="{{(isset($_GET['utm_creative']))?$_GET['utm_creative']:''}}" > 
<input type="hidden" name ="utm_adset" value="{{(isset($_GET['utm_adset']))?$_GET['utm_adset']:''}}" >
<input type="hidden" name ="ref_code" value="{{ (isset($_GET['ref']))?$_GET['ref']:'' }}" >  
<input type="hidden" name ="source_url" value="{{ url()->current() }}" >