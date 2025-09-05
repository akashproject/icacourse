<div class="lead_steps step_1 active">
    <h3 class="td_mb_20 td_fs_24 td_semibold mb-3">Let’s get you started!</h3>
    <div class="row">
        <div class="col-lg-6 mb-2">
            <div class="form-floating">
                <input type="text" class="form-control" name="lead_full_name" id="lead_full_name" placeholder="Full Name" autocomplete="off" required="">
                <label for="lead_full_name">Full Name</label>
            </div>
        </div>

        <div class="col-lg-6 mb-2">
            <div class="form-floating">
                <input type="hidden" name="lead_mobile[0]" value="+91">
                <input type="number" class="form-control" name="lead_mobile[1]" id="lead_mobile_info" placeholder="Mobile Number" autocomplete="off" required min="6000000000" max="9999999999">
                <label for="email">Mobile Number</label>
            </div>
        </div>

        <div class="col-lg-6 mb-2">
            <div class="form-floating">
                <input type="email" class="form-control" name="lead_email" id="lead_email" placeholder="Enter email" autocomplete="off" required="">
                <label for="email">Email Address</label>
            </div>
        </div>
        <!-- 
        <div class="col-lg-6 mb-2">
            <div class="form-floating">
                <input type="number" class="form-control" name="pincode" id="lead_pincode" placeholder="Enter Pincode" autocomplete="off" required="">
                <label for="lead_pincode">Pincode</label>
            </div>
        </div> -->

        <div class="col-lg-6 mb-2">
            <div class="form-floating">
                <select class="form-control" name="state" id="state" onChange="getCitiesByStateId(this);" required>
                    <option value="">  Select your state</option>
                    @foreach(getStates() as $value)
                    <option value="{{ $value->Id }}" {{ (isset($student['state']) && $student['state'] == $value->Id )?'selected':''}}> {{ $value->name }} </option>
                    @endforeach
                </select>
                <label for="state" >State</label>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group disclaimer">
                <p style="margin:0"><input type="checkbox" class="" checked> I agree to receive updates on <i class="fab fa-whatsapp" style="color: green;"></i> whatsapp. 
                </p>
                <p><input type="checkbox" class="" checked> I agree to <a target="_blank" href="/privacy-policy" >Privacy Policy</a> & overriding DNC/NDNC request for Call/SMS. 
                </p>
            </div>
        </div>
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <button type="submit" class="thm-btn bg-thm-color-three thm-color-three-shadow btn-rectangle"> Continue
                 <i class="fal fa-chevron-right ml-2"></i></button>
        </div>
    </div>
</div>
<div class="lead_steps step_2">
    <h3 class="td_mb_20 td_fs_24 td_semibold">We’ve sent you an OTP</h3>
    <p class="td_fs_14 m-0">On your phone number <a href="javascript:void(0)" class="backstep">+91 <span class="submitted_lead_mobile_no"></span> <i class="fa fa-edit" ></i> </a></p>
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
                <button type="submit" class="form-submit-btn disabled thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle" disabled>
                    <span>Register Now</span>
                </button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" class="formFieldOtpResponse" >
<input type="hidden" class="lead_id" name="lead_id"> 
@if(isset($contentMain->course_id))
<input type="hidden" name="course_id" value="{{$contentMain->course_id}}">
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