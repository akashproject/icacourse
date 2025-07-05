@extends('layouts.main')
@section('content')
<!-- Coach Grid Start -->
<section class="section-padding">
    <div class="container">
        <form method="post" action="{{ route('validate-lead') }}" id="lead_validate_form">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <h3> Checkout </h3>
                    <div class="checkout_information mb-2 active">
                        <h5> Personal Infomation </h5>
                        <div class="checkout_form_info">
                            <div class="lead_steps active">
                                <div class="row">
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" name="mobile" id="lead_mobile_info" placeholder="Mobile Number"  autocomplete="off" required>
                                            <label for="lead_mobile_info">Mobile Number</label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-right">
                                        <div class="my-3">
                                            <button type="submit" id="send_otp_validation" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle"> Next <i class="fal fa-chevron-right ml-2"></i></button>
                                        </div>
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
                                    <div class="col-lg-12 text-right">
                                        <div class="form-one__control form-one__control--full">
                                            <button type="submit" class="form-submit-btn disabled thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle" disabled>
                                                <span>next <i class="fal fa-chevron-right ml-2"></i></span>
                                            </button>
                                        </div>
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
                                            <a href="#">{{ $course->name }}</a>
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
                                        
                                        <h6 class="mb-0">Subtotal</h6>
                                    </div>
                                    <div class="right-side">
                                        <i class="fal fa-rupee-sign"></i>{{ number_format(totalCartAmount()) }}/-
                                    </div>
                                </li>
                                <li>
                                    <div class="left-side">
                                        <h6 class="mb-0">Total Payable</h6>
                                    </div>
                                    <div class="right-side">
                                        <i class="fal fa-rupee-sign"></i>{{ number_format(totalCartAmount()) }}/-
                                    </div>
                                </li>
                            </ul>                            
                        </div>
                    </div>
                    <!-- <table class="table table-condensed">                       
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
                    </table> -->
                    
                </div>
            </div>            
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