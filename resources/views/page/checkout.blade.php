@extends('layouts.main')
@section('content')
<!-- Coach Grid Start -->
<section class="section-padding">
    <div class="container">
        <form method="post" action="{{ route('proceed-to-checkout') }}" id="checkoutform">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <h3> Checkout </h3>
                    <div class="checkout_information mb-2 active">
                        <h5> Personal Infomation </h5>
                        <div class="checkout_form_info">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group form_style">
                                        <label class="padding-30px-left-right">First Name<span class="required">*</span></label>
                                        <input type="text" name="lead_first_name" placeholder="Enter Your First Name" class="form-control" autocomplete="off" value="" required="">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group form_style">
                                        <label class="padding-30px-left-right">Last Name<span class="required">*</span></label>
                                        <input type="text" name="lead_last_name" placeholder="Enter Your Full Name" class="form-control" autocomplete="off" value="" required="">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group form_style">
                                        <label class="padding-30px-left-right">Guardian Name<span class="required">*</span></label>                                 
                                        <input type="text" name="guardian_name" placeholder="Enter Your Guardian Name" class="form-control" autocomplete="off" required="">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group form_style">
                                        <label class="padding-30px-left-right">Mobile Number<span class="required">*</span></label>
                                        <input type="hidden" name="lead_mobile[0]" class="form-control" autocomplete="off" required="" value="+91" style="width: 45px;" readonly="">
                                        <input type="number" id="lead_mobile_info" name="lead_mobile[1]" class="form-control" placeholder="Mobile Number" min="6000000000" max="9999999999" autocomplete="off" required="">                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group form_style">
                                        <label class="padding-30px-left-right">Email Address<span class="required">*</span></label>
                                        <input type="email" name="lead_email_address" class="form-control" placeholder="Enter Your Email Address" autocomplete="off" value="" required="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group form_style">
                                        <label>Date Of Birth<span class="required">*</span></label>
                                        <input type="date" name="date_of_birth" class="form-control" placeholder="Select Your Birth Date" id="datePickerId" autocomplete="off"  >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group form_style">
                                        <label>Gender<span class="required">*</span></label>
                                        <select class="form-control" name="gender" id="gender" required="">
                                            <option value="">  Select Gender</option>
                                            <option value="M"> Male </option>
                                            <option value="F"> Female </option>
                                            <option value="O"> Other </option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group form_style">
                                        <label>Highest Qualification<span class="required">*</span></label>
                                        <select class="form-control" name="qualification" id="qualification" required="">
                                            <option value="">  Select Qualification</option>
                                            @foreach(getQualifications() as $value)
                                            <option value="{{ $value->id }}">  {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group form_style">
                                        <label>Prefferd Language<span class="required">*</span></label>
                                        <select class="form-control" name="language_option" id="language_option" data-init-id="0" required="">
                                            <option value=""> Select Preferred Language </option>
                                            <option value="Hindi-English"> Hindi &amp; English (Mixed) </option>
                                            <option value="English"> English </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkout_information mb-2">
                        <h5> Billing Address </h5>
                        <div class="checkout_form_info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group form_style">
                                        <label>Address<span class="required">*</span></label>
                                        <textarea name="addressline_1" class="form-control" autocomplete="off" placeholder="Select Address" required=""></textarea>
                                    </div>

                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group form_style">
                                        <label>State<span class="required">*</span></label>
                                        <select class="form-control" name="state" id="state" onChange="getCitiesByStateId(this);" required>
                                            <option value="">  Select State</option>
                                            @foreach(getStates() as $value)
                                            <option value="{{ $value->Id }}" > {{ $value->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group form_style">
                                        <label>City<span class="required">*</span></label>
                                        <select class="form-control" name="city" id="city" required="">
                                            <option value="">  Select City</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group form_style">
                                        <label>Pincode<span class="required">*</span></label>
                                        <input type="text" name="pincode" placeholder="Select Pincode" class="form-control" autocomplete="off" value="" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3> Your order </h3>
                    <table class="table table-condensed">                       
                        <tbody>
                            <tr>
                                <th> Course </th>
                                <td> 
                                    <ul>       
                                        @foreach($cartItems as $key => $item)
                                        @php 
                                            $course = getCourseById($key);
                                        @endphp                           
                                        <li><i class="fa fa-check-circle mr-2" style="color:#4c8b16"></i> {{ $course->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th> Subtotal 
                                </th>
                                    <td><span class="subtotal">  ₹{{ number_format(totalCartAmount()) }}/- </span>
                                </td>
                            </tr>
                            <tr class="coupon_discount" style="display:none;">
                                <th> Discount  </th>
                                <td><span class="display_coupon_discount"> </span></td>
                            </tr>
                            <tr>
                                <th> Total Payable </th>
                                <td> 
                                    <p> <span class="total_payble_amount">₹{{ number_format(totalCartAmount()) }}/- </span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h6 class="coupon_label" > Do you have Scholarship Code? <a href="javascript:void(0)" > Apply Code </a> </h6>
                    <span class="coupon_status" > </span>
                    <div class="apply_coupon_box">
                        <div class="row" >
                            <div class="col-md-12" >
                                <div class="form-group form_style" style="display: inline-flex;">
                                    <input type="text" id="coupon_code" name="coupon_code" placeholder="Place Coupon Code" class="form-control valid" autocomplete="off" aria-invalid="false">
                                </div>    
                                <button id="appy_coupon_btn" type="button" onclick="apply_coupon_code()" class="thm-btn bg-thm-color-three"> 
                                    Apply Code
                                </button>       
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle"> Purchase Your Course <i class="fal fa-chevron-right ml-2"></i></button>
                </div>
            </div>            
            <input type="hidden" name="utm_campaign" value=""> 
            <input type="hidden" name="utm_source" value=""> 
            <input type="hidden" name="merchant_id" value="415669"> 
            <input type="hidden" name="amount" id="amount" value="{{ base64_encode(totalCartAmount()) }}">
            <input type="hidden" name="discount" id="discount" value="">
            <input type="hidden" name="language" value="EN">
            <input type="hidden" name="currency" value="INR"> 
            <input type="hidden" name="redirect_url" value="{{ route('page-view','order-success') }}"> 
            <input type="hidden" name="cancel_url" value="{{ route('page-view','order-failed') }}"> 
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