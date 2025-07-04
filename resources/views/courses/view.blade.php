@extends('layouts.main')
    @section('content')
    <div class="subheader relative z-1" style="background-image: url({{ url('/assets/frontend/images/banner/course-banner-min.webp')}});">
        <div class="container relative z-1">
            <div class="row">
                <div class="col-12">
                    <h1 class="page_title">{{ $contentMain->name }}</h1>
                    <div class="page_banner_description text-white">
                        {{ $contentMain->excerpt }}                     
                    </div>
                    <div class="page_banner_meta">
                        <div class="total-rating">
                            <a href="javascript:void(0)" style="color: #ffbd3f;"> 4.0 </a>
                            <div class="ratings " style="display: inline;margin: 0 6px;">
                                <i class="fal fa-star active"></i>
                                <i class="fal fa-star active"></i>
                                <i class="fal fa-star active"></i>
                                <i class="fal fa-star active"></i>
                                <i class="fal fa-star"></i>
                            </div>
                            <a href="javascript:void(0)" class="text-white" style="cursor: auto;margin: 0 6px;"> (388 Reviews )</a>
                        </div>
                        
                        <span class="text-white total-enroll"> 964 students </span>
                    </div>
                </div>
            </div>
            <img src="{{ url('/assets/frontend/images/elements/element_19.png')}}" alt="element" class="element_1 slideRightTwo">
            <img src="{{ url('/assets/frontend/images/elements/element_10.png')}}" alt="element" class="element_2 zoom-fade">
            <img src="{{ url('/assets/frontend/images/elements/element_20.png')}}" alt="element" class="element_3 rotate_elem">
            <img src="{{ url('/assets/frontend/images/elements/element_21.png')}}" alt="element" class="element_4 rotate_elem">
        </div>
    </div>

    <!-- Details Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course_details mb-md-80">
                        <ul class="nav nav-tabs style_4">
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-toggle="tab">Summary</a>
                            </li>
                            <li class="nav-item">
                                <a href="#features" class="nav-link" data-toggle="tab">Features</a>
                            </li>
                            <li class="nav-item">
                                <a href="#criteria" class="nav-link" data-toggle="tab">Criteria</a>
                            </li>
                            <li class="nav-item">
                                <a href="#highlights" class="nav-link" data-toggle="tab">Highlights</a>
                            </li> 
                            <li class="nav-item">
                                <a href="#curriculum" class="nav-link" data-toggle="tab">Curriculum</a>
                            </li>                                                    
                            <!-- <li class="nav-item">
                                <a href="#reviews" class="nav-link" data-toggle="tab">Reviews</a>
                            </li>                            -->
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description">
                                <div class="row" >
                                    <div class="course_heading">
                                        {{ $contentMain->description}}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="features">
                                <div class="desc_box">
                                    <h2 class="course_title" > Course at a glance </h2>
                                    <div class="course_tags" >
                                          {{ $contentMain->feature}}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="criteria">
                                <div class="desc_box">
                                    <h2 class="course_title">Eligibility Criteria</h2>
                                </div>
                                <div class="row">
                                    <div class="col-6 course_criteria">
                                        <span > <i class="fal fa-graduation-cap"></i> {{ $contentMain->criteria }}</span>    
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="highlights">
                                <div class="about_list style_2">
                                highlights
                                </div>
                               
                            </div>
                            <div class="tab-pane fade" id="curriculum">
                                <div class="about_list accordion accordion-style style_2 mb-xl-30" id="generalaccordion">
                                    ssss 
                                </div>
                            </div>
                        </div>

                    </div>
 
                    
                   
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar_widget info_widgets">
                            <ul>     
                                <li class="active">
                                    <div class="left-side">
                                        <i class="fal fa-usd-circle"></i>
                                        <h6 class="mb-0">Course Value</h6>
                                    </div>
                                    <div class="right-side" style="color:#3e4095">
                                        Rs. {{ $contentMain->price }}/-
                                    </div>
                                </li>
                                <li>
                                    <div class="left-side">
                                        <i class="fal fa-clock"></i>
                                        <h6 class="mb-0">Duration</h6>
                                    </div>
                                    <div class="right-side">
                                        {{ $contentMain->duration }}                                   
                                     </div>
                                </li>
                                <li>
                                    <div class="left-side">
                                        <i class="fal fa-graduation-cap"></i>
                                        <h6 class="mb-0">Eligibility</h6>
                                    </div>
                                    <div class="right-side">
                                        12+ / Graduate                                    
                                    </div>
                                </li>
                                <li>
                                    <div class="left-side">
                                        <i class="fal fa-book"></i>
                                        <h6 class="mb-0">Course Type</h6>
                                    </div>
                                    <div class="right-side">
                                        100% Job Assurance                                    
                                    </div>
                                </li>
                                <li>
                                    <div class="left-side">
                                        <i class="fal fa-file-certificate"></i>
                                        <h6 class="mb-0">Certification</h6>
                                    </div>
                                    <div class="right-side">
                                        ICA+NSDC                                    
                                    </div>
                                </li>
                            </ul>
                            <div class="payment_option">                                
                            </div>   
                        </div>
                           
                    </div>
                        <form id="add_course_to_cart_{{ $contentMain->id }}" class="add_course_to_cart" data-id="{{ $contentMain->id }}">
                            @csrf
                            <div class="sidebar mt-3">
                                <h6 class="mb-1"> Limited Time Offer </h6>
                                    
                                <div class="price_info_widgets"> 
                                    @foreach(getCourseFees($contentMain->erp_course_id) as $fee)
                                        @php 
                                            @$checked = ($fee->Install_Payable == "N")?"checked":"";
                                            if(in_array($fee->FeeID,$cartItems)) {
                                                $checked = "checked";
                                            }
                                        @endphp
                                  
                                        <input type="radio" name="course_fee_id" class="course_fee_selection" id="select_price_option_{{ $fee->FeeID }}" value="{{ $fee->FeeID }}" {{$checked}} > 
                                        <label for="select_price_option_{{ $fee->FeeID }}" class="price_options border-4px-radious">
                                            <span> {{ ($fee->Install_Payable == "N")?"One Time Pay":"Pay"; }}</span>
                                            <h3> ₹{{ number_format($fee->Down_Payment)}} </h3>
                                            <span class="mt-2" style="font-size: 12px;"> </span>
                                            <span class="mt-2" style="font-size: 12px;" > {{ ($fee->Install_Payable == "N")?"":"₹".number_format($fee->InstallAmount)." X ".$fee->NoOfInstall." Months"; }}</span>
                                        </label>
                                    @endforeach                               
                                </div>
                                 
                                <div class="price_info_widgets"> 
                                      <a href="/apply-for-loan?course=MTM0" class="price_options" style="height: auto;font-size: 13px;font-weight: 800;color: #111010;border-radius: 5px;">
                                        Check Loan Eligibility
                                      </a>
                                </div>
                            </div>

                            <div class="sidebar">
                                <div class="info_widgets text-center">
                                    <div class="cart-button">
                                        @php    
                                            $props = (array_key_exists($contentMain->id, $cartItems))?"disabled":""
                                        @endphp
                                        <button class="{{$props}} add_to_cart_btn_{{ $contentMain->id }} border-4px-radious thm-btn btn-large bg-thm-color-three thm-color-three-shadow" style="margin-top: 25px;background: #7129b5;" {{$props}}> Add to cart &nbsp;<i class="fal fa-shopping-bag"></i></button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="course_id" value="{{ $contentMain->id }}">
                        </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Details End -->

    <div class="bg-thm-color-two plane_box relative z-1">
        <div class="container relative z-1">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-11 relative z-1">
                    <img src="{{ url('/assets/frontend/images/elements/element_6.png')}}" class="element_1 rotate_elem" alt="Element">
                    <h2 class="thm-color-white">Get The Best E-learning Experience with ICA!</h2>
                </div>
            </div>
            <img src="{{ url('/assets/frontend/images/elements/element_7.png')}}" class="element_2 zoom-fade" alt="Element">
        </div>
    </div>
    @endsection 