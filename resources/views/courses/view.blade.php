@extends('layouts.main')
    @section('content')
    <section class="banner-inner py-3">
        <div class="container">
            <div class="inner-left"><img src="/assets/frontend/images/round-dot.png" alt="" class="img-fluid"></div>
            <div class="inner-right"><img src="/assets/frontend/images/round-dot.png" alt="" class="img-fluid"></div>
            <div class="inner-top"><img src="/assets/frontend/images/top.svg" alt="" class="img-fluid"></div>
            <div class="inner-animation"><img src="/assets/frontend/images/page-header-shape-2.png" alt="" class="img-fluid"></div>
            <div class="inner-bottom"><img src="/assets/frontend/images/bottom.svg" alt="" class="img-fluid"></div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-11">
                            <h1 class="page_title">{{ $contentMain->name }}</h1>
                            <div class="page_banner_description text-white">
                                {{ $contentMain->excerpt }}                     
                            </div>

                            <div class="page_banner_meta mt-3">
                                <div class="total-rating">
                                    <a href="javascript:void(0)" style="color: #ffbd3f;"> 4.0 </a>
                                    <div class="ratings " style="display: inline;margin: 0 6px;">
                                        <i class="fal fa-star active"></i>
                                        <i class="fal fa-star active"></i>
                                        <i class="fal fa-star active"></i>
                                        <i class="fal fa-star active"></i>
                                        <i class="fal fa-star"></i>
                                    </div>
                                    <a href="javascript:void(0)" class="text-white" style="cursor: auto;margin: 0 6px;"> ({{ $contentMain->number_of_rating }} Reviews )</a>
                                </div>
                                
                                <span class="text-white total-enroll"> {{ $contentMain->number_of_enrolled }} students </span>
                                <div class="course_features text-white mt-5" >
                                    {!! $contentMain->feature !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Details Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course_details mb-md-80">
                        <ul class="nav nav-tabs style_4 mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-description" type="button" role="tab" aria-controls="tab-description" aria-selected="true">Summary</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-criteria" type="button" role="tab" aria-controls="tab-criteria" aria-selected="false">Eligibility</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-highlights" type="button" role="tab" aria-controls="tab-highlights" aria-selected="false">Highlights</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-curriculum" type="button" role="tab" aria-controls="tab-curriculum" aria-selected="false">Syllabus</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="tab-tabContent">
                            <div class="tab-pane fade show active" id="tab-description" role="tabpanel" aria-labelledby="tab-description-tab">
                                <div class="course-description">
                                    {!! $contentMain->description !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-criteria" role="tabpanel" aria-labelledby="tab-criteria-tab">
                                <div class="desc_box">
                                    <h2 class="course_title">Eligibility Criteria</h2>
                                </div>
                                <div class="row">
                                    <div class="col-12 course_criteria">
                                        {!! $contentMain->criteria !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-highlights" role="tabpanel" aria-labelledby="tab-highlights-tab">
                                <div class="about_list style_2">
                                    {!! $contentMain->highlights !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-curriculum" role="tabpanel" aria-labelledby="tab-curriculum-tab">
                                <div class="syllabus_list accordion accordion-style style_2 mb-xl-30" id="generalaccordion">
                                    @if($contentMain->subjects)
                                        @foreach(getSubjectsByCourseId($contentMain->subjects) as $key => $subject)
                                        <ul class="card">
                                            <li class="card-header" id="heading_{{ $key }}" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $key }}" aria-expanded="true" aria-controls="collapse_{{ $key }}">
                                                <a class="btn btn-link" type="button" >
                                                    <span class="mx-2"><i class="fal fa-book"></i></span> {{ $subject->name }}
                                                </a>
                                                <span class="accordion-time__duration"> {{ $subject->duration }} </span>
                                            </li>
                                            <div id="collapse_{{ $key }}" class="accordion-collapse collapse" aria-labelledby="heading_{{ $key }}" data-bs-parent="#accordionExample">
                                                <div class="card-body">
                                                    <ul>
                                                        @foreach(getTopicsBySubjectId($subject->id) as $key => $topic)
                                                        <li aria-level="{{ $key +1}}"> {{ $key +1}}. {{ $topic->name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </ul>
                                        @endforeach
                                    @endif
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
                                        <h6 class="mb-0">Course Price</h6>
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
                                        {{ $contentMain->eligibility }}
                                    </div>
                                </li>
                                <li>
                                    <div class="left-side">
                                        <i class="fal fa-book"></i>
                                        <h6 class="mb-0">Course Type</h6>
                                    </div>
                                    <div class="right-side">
                                        {{ (in_array('1',json_decode($contentMain->type_id)))?"100% Job Assurance":"Short Term" }}                                   
                                    </div>
                                </li>
                                <li>
                                    <div class="left-side">
                                        <i class="fal fa-file-certificate"></i>
                                        <h6 class="mb-0">Certification</h6>
                                    </div>
                                    <div class="right-side">
                                        {{ $contentMain->certification}}                                 
                                    </div>
                                </li>
                            </ul>
                            <div class="payment_option">                                
                            </div>   
                        </div>
                           
                    </div>
                    @if(!check_device("mobile"))
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
                        </div>

                        <div class="sidebar">
                            <div class="info_widgets mt-5 text-center">
                                <div class="cart-button">
                                    @php    
                                        $props = (array_key_exists($contentMain->id, $cartItems))?"disabled":""
                                    @endphp
                                    <button class="{{$props}} add_to_cart_btn_{{ $contentMain->id }} border-4px-radious thm-btn btn-large bg-thm-color-three thm-color-three-shadow" style="background: #7129b5;" {{$props}}> Add to cart &nbsp;<i class="fal fa-shopping-bag"></i></button>
                                </div>
                                @if(in_array('1',json_decode($contentMain->type_id))) 
                                    <span class="division"> Or </span>
                                    <div class="cart-button">
                                        <a href="{{ route('loan-check-eligibility',base64_encode($contentMain->id)) }}" class="border-4px-radious thm-btn btn-large bg-thm-color-three thm-color-three-shadow" > Check Loan Eligibility</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="course_id" value="{{ $contentMain->id }}">
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Details End -->

    <section class="experience-wrapper">
        <img src="{{ url('assets/frontend/images/experience-img-left.png')}}" alt="" class="experience-img-left">
        <img src="{{ url('assets/frontend/images/experience-img-right.png')}}" alt="" class="experience-img-right">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <h2>Get The Best E-learning Experience with ICA!</h2>
                    <div class="text-center z-2 position-relative">
                        <a href="#lead-generate-popup" class="open-popup-link thm-btn bg-thm-color-two thm-color-two-shadow"><i class="fal fa-phone mx-2"></i> Talk to Our Exparts</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Start -->
    <section class="section section-bg relative z-1 about_bg" style="background-image: url({{ url('/assets/frontend/images/bg/bg_1.png')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title left-align wow fadeInLeft">
                                <p class="subtitle mb-4">
                                    <i class="fal fa-book"></i>
                                    Our Testimonials
                                </p>
                                <h3 class="title mb-3">What’s Our Students Says<br> About Us</h3>
                                <p> We take pride in the success of our students. Hear directly from them as they share their experiences, growth, and how our programs have helped shape their journey. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="testimonial_slider style_2">
                            @foreach(getTestimonials() as $testimonial)
                            <div class="slide-item col-12">
                                <div class="testimonial_item">
                                    <div class="author">
                                        <div class="image bg-thm-color-two">
                                            <img src="{{ getSizedImage($testimonial->featured_image) }}" alt="img" class="image-fit">
                                        </div>
                                        <div class="text">
                                            <h6 class="mb-0">{{ $testimonial->name }}</h6>
                                            <p class="mb-0 font-weight-bold thm-color-two">{{ $testimonial->dasignation }}</p>
                                        </div>
                                    </div>
                                    <div class="comment">
                                        {!! $testimonial->comment !!}
                                    </div>
                                    <div class="ratings">
                                        <i class="fal fa-star active"></i>
                                        <i class="fal fa-star active"></i>
                                        <i class="fal fa-star active"></i>
                                        <i class="fal fa-star active"></i>
                                        <i class="fal fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($contentMain->faqs)
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <p class="subtitle">
                            <i class="fal fa-book"></i>
                            Faqs 
                        </p>
                        <h3 class="title">Frequently Asked Questions</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                
                <div class="accordion accordion-style accordion-style-2 style_2 mb-xl-30">
                    @foreach(getFaqsById($contentMain->faqs) as $key => $faq)
                    <div class="card">
                        <div class="card-header" data-bs-toggle="collapse" data-bs-target="#faq_item_{{ $key }}" aria-expanded="false" aria-controls="faq_item_{{ $key }}">
                            <button class="btn btn-link" type="button" >
                                {{ $faq->question }} </button>
                        </div>
                        <div id="faq_item_{{ $key }}" class="collapse" aria-labelledby="faq_item_{{ $key }}" >
                            <div class="card-body">
                                {!! $faq->answer !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </section>
    @endif  

    @endsection 