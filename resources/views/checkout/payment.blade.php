@extends('layouts.main')
@section('content')
<!-- Coach Grid Start -->
<section class="section-padding">
    <div class="container">
        <form method="post" action="{{ route('proceed-to-checkout') }}" id="proceed_to_checkout_form">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <h3> Checkout </h3>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="checkout_information mb-2 active">
                        <h5>01. Registration Infomation </h5>
                        <div class="checkout_form_info">
                            <div class="row">
                                <div class="col-lg-4 mb-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="lead_full_name" id="lead_full_name" placeholder="Full Name" value="{{ isset($student['first_name'])?$student['first_name']:''}} {{ isset($student['last_name'])?$student['last_name']:''}}" autocomplete="off" required>
                                        <label for="lead_full_name">Full Name</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="form-floating">
                                        <input type="hidden" name="lead_mobile[0]" value="+91">
                                        <input type="text" class="form-control" name="lead_mobile[1]" id="lead_mobile_info" placeholder="Mobile Number" value="{{ isset($student['mobile'])?$student['mobile']:''}}" autocomplete="off" required readonly>
                                        <label for="lead_mobile_info">Mobile Number</label>
                                        <a href="{{ route('validate') }}" class="change_mobile_no"> Change </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="lead_email" id="lead_email" value="{{ isset($student['email'])?$student['email']:''}}" placeholder="Enter email" autocomplete="off" required="">
                                        <label for="email">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
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
                                <div class="col-lg-4 mb-2">
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

                                <div class="col-lg-4 mb-2">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="pincode" id="lead_pincode" value="{{ isset($student['pincode'])?$student['pincode']:''}}" placeholder="Enter Pincode" autocomplete="off" required="">
                                        <label for="lead_pincode">Pincode</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkout_information mb-2">
                        <h5>02. Admission Infomation </h5>
                        <div class="checkout_form_info">
                            <div class="row">
                                <div class="col-lg-4 mb-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="guardian_name" id="guardian_name" placeholder="Guardian Name" value="{{ isset($student['guardian_name'])?$student['guardian_name']:''}}" autocomplete="off" required>
                                        <label for="guardian_name">Guardian Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Date Of Birth" value="{{ isset($student['date_of_birth'])?$student['date_of_birth']:''}}" autocomplete="off" value="" required>
                                        <label for="date_of_birth">Date Of Birth</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-floating">
                                        <select class="form-control" name="gender" id="gender" required>
                                            <option value="">  Select Gender</option>
                                            <option value="M" {{ (isset($student['gender']) && $student['gender'] == 'M')?'selected':''}}> Male </option>
                                            <option value="F" {{ (isset($student['gender']) && $student['gender'] == 'F')?'selected':''}}> Female </option>
                                            <option value="O" {{ (isset($student['gender']) && $student['gender'] == '0')?'selected':''}}> Other </option> 
                                        </select>
                                        <label for="gender">Gender</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-floating">
                                        <textarea name="addressline_1" id="addressline_1" class="form-control" autocomplete="off" placeholder="Select Address" value="" required="">{{ isset($student['address'])?$student['address']:''}}</textarea>
                                        <label for="addressline_1" >Address</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-floating">
                                        <select class="form-control" name="qualification" id="qualification" required>
                                            <option value="">  Select Qualification</option>
                                            @foreach(getQualifications() as $value)
                                            <option value="{{ $value->id }}" {{ (isset($student['qualification']) && $student['qualification'] == $value->id )?'selected':''}}>  {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="qualification">Highest Qualification</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating">
                                        <select class="form-control" name="language_option" id="language_option" required>
                                            <option value=""> Select Preferred Language </option>
                                            <option value="Hindi-English" {{ (isset($student['language']) && $student['language'] == 'Hindi-English')?'selected':''}}> Hindi &amp; English (Mixed) </option>
                                            <option value="English" {{ (isset($student['language']) && $student['language'] == 'English')?'selected':''}}> English </option>
                                        </select>
                                        <label for="language_option">Prefferd Language</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group disclaimer">
                                        <p style="margin:0"><input type="checkbox" class="" checked=""> I agree to accept all  <a target="_blank" href="{{ route('page-view','term-condition') }}" >T&C</a> and the <a target="_blank" href="{{ route('page-view','guidelines') }}" >guidelines</a> before purchasing the course. </p>
                                    </div>
                                </div>
                                <div class="col-12 text-right">
                                    <div class="my-3">
                                        <button type="submit" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle"> Proceed to Payment <i class="fal fa-chevron-right ml-2"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3> Your order </h3>
                    <div class="sidebar">
                        <div class="sidebar_widget recent_widgets wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <h5 class="widget_title">Course{{ (count($cartItems) >1)?'s ':'' }} added to cart</h5>
                            <ul class="cart-course-list">
                                @foreach($cartItems as $key => $item)
                                @php 
                                    $course = getCourseById($key);
                                @endphp               
                                <li>
                                    <div class="image">
                                        <img src="{{ url('/assets/frontend/images/course/'.$course->slug.'.webp') }}" alt="img" class="image-fit">
                                    </div>
                                    <div class="text">
                                        <h6 class="mb-0">
                                            <a href="{{ route('view-courses',$course->slug) }}">{{ $course->name }}</a>
                                        </h6>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="sidebar_widget info_widgets wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <ul>
                                <li>
                                    <div class="left-side">
                                        <i class="fal fa-rupee-sign"></i>
                                        <h6 class="mb-0">Subtotal</h6>
                                    </div>
                                    <div class="right-side">
                                        {{ number_format(totalCartAmount()) }}/-
                                    </div>
                                </li>
                                <li class="coupon_discount" style="display:none;">
                                    <div class="left-side">
                                        <i class="fal fa-rupee-sign"></i>
                                        <h6 class="mb-0">Discount</h6>
                                    </div>
                                    <div class="right-side">
                                        <span class="display_coupon_discount"> </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="left-side">
                                        <i class="fal fa-rupee-sign"></i>
                                        <h6 class="mb-0">Total Payable</h6>
                                    </div>
                                    <div class="right-side total_payble_amount">
                                        {{ number_format(totalCartAmount()) }}/-
                                    </div>
                                </li>
                            </ul>
                            <hr>
                        </div>
                    </div>
                    
                    <h6 class="coupon_label" > Do you have Scholarship Code? <a href="javascript:void(0)" > Apply Code </a> </h6>
                    <span class="coupon_status" > </span>
                    <div class="apply_coupon_box">
                        <div class="row" >
                            <div class="col-md-12" >
                                <div class="form-group form_style" style="display: inline-flex;">
                                    <input type="text" id="coupon_code" name="coupon_code" placeholder="Place Scholarship Code" class="form-control valid" autocomplete="off" aria-invalid="false">
                                </div>    
                                <button id="appy_coupon_btn" type="button" onclick="apply_coupon_code()" class="thm-btn bg-thm-color-three"> 
                                    Apply Code
                                </button>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <input type="hidden" name="utm_campaign" value="{{ getUtmCampaign(isset($contentMain->utm_campaign)?$contentMain->utm_campaign:null) }}">
            <input type="hidden" name="utm_source" value="{{ get_theme_setting('utm_source') }}">
            <input type="hidden" name ="lead_type" value="{{ getCommunicationMedium(isset($contentMain->lead_type)?$contentMain->lead_type:null) }}" >
            <input type="hidden" name ="store_area" value="1" >
            <input type="hidden" name ="source_url" value="{{ url()->current() }}" >
            <input type="hidden" name="amount" id="amount" value="{{ base64_encode(totalCartAmount()) }}">
            <input type="hidden" name="discount" id="discount" value="">
        </form>

    </div>

</section>
<div id="coupon-offer-popup" class="white-popup mfp-hide">
    <div class="text-center">
        <img class="mr-2" src="{{ url('/assets/frontend/images/accept.png')}}">
    </div>
    <h5 class="text-center mb-2">
        <img class="mr-2" src="{{ url('/assets/frontend/images/confetti.png')}}">Congratulation
    </h2>
    <div class="coupon_offer_message text-center"></div>
    <div class="text-center mt-2">
        <button class="mfp-close-btn thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle"> ACCEPT OFFER </button>
    </div>
</div>
<!-- Coach Grid End -->
@endsection