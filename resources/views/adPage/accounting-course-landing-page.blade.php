
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>	
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="icon" href="https://www.icacourse.in/wp-admin/images/favicon/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.10.2/video-js.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css?ver=6.8.2' rel='stylesheet' />
    <link href="{{ url('assets/frontend/css/plugins/slick.css') }}" rel="stylesheet">
    <link href="{{ url('assets/frontend/css/plugins/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ url('assets/frontend/css/plugins/animate.css') }}" rel="stylesheet">
    <link href="{{ url('assets/frontend/fonts/flaticon/flaticon.css') }}" rel="stylesheet">
    <link href="{{ url('assets/frontend/fonts/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('assets/frontend/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ url('assets/frontend/css/ad-page.css') }}" rel="stylesheet">
</head>
<body>
    <div class="aside-overlay trigger-right"></div>

    <header class="header header-3" style="background:#fff">
        <div class="topbar bg-thm-color-two">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 xs-display-none">
                        <ul class="right-side">
                            <li>
                                <a href="tel:{{ get_theme_setting('mobile') }}">
                                    <i class="fal fa-phone"></i>
                                    Call : {{ get_theme_setting('mobile') }}                                
                                </a>
                            </li>
                            <li>
                                <a href="mailto:{{ get_theme_setting('email') }}">
                                    <i class="fal fa-envelope"></i>
                                    {{ get_theme_setting('email') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-5 xs-display-none">
                        <div class="left-side">
                            
                        </div>
                    </div>
                    <div class="col-lg-3 xs-display-none">
                        <ul class="right-side">
                            <li style="margin-right: 20px;">
                                <a target="_blank" href="https://www.facebook.com/onlinevertical">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li style="margin-right: 20px;">
                                <a target="_blank" href="https://api.whatsapp.com/send?phone=+91https://api.whatsapp.com/send?phone=8100704872">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </li>
                            <li style="margin-right: 20px;">
                                <a target="_blank" href="https://www.instagram.com/icaeduskills_onlinecourse/">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li style="margin-right: 20px;">
                                <a target="_blank" href="https://www.linkedin.com/showcase/ica-edu-skills-online-course/">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </li>
                            <li style="margin-right: 20px;">
                                <a target="_blank" href="">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- inner -->
            <div class="nav_warp">
                <nav>
                    <!-- logo start -->
                    <div class="logo">
                        <a href="javascript:void(0)">
                            <img src="{{ url('/assets/frontend/images/logo.png') }}" alt="logo">
                        </a>
                    </div>
                    <!-- logo end -->
                    
                    <!-- Navigation Start -->
                    <div class="menu-header-menu-container">
                        <ul id="accordion" class="main-menu">
                            <li class="menu-item"><a href="#brochure">Home</a></li>
                            <li class="menu-item"><a href="#courses">Courses</a></li>
                            <li class="menu-item"><a href="#certifications">Certifications</a></li>
                            <li class="menu-item"><a href="#testimonials">Testimonials</a></li>
                            <li class="menu-item"><a href="#brochure">Contact Us</a></li>
                        </ul>
                    </div>                   
                    <!-- Navigation Ens -->
                </nav>
            </div>
            <!-- inner -->
        </div>
        <div class="nav_sec" style="padding-top: 0;"> </div>
        
    </header>

    <div class="banner-pagelanding" id="brochure" style="background-image: url('/assets/frontend/images/accounting/banner-landin-ac.jpg');">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-7">
                    <div class="my-4">
                        <h1 class="mb-0">Online Accounting Courses</h1>
                        <h2 class="mb-3">Develop Job-Ready Accounting Skills</h2>
                        
                        <ul class="banner-list">
               
                            <li><i class="fal fa-check-circle text-warning"></i>100% Job Assurance</li>
                            <li><i class="fal fa-check-circle text-warning"></i>4 Certifications</li>
                            <li><i class="fal fa-check-circle text-warning"></i>10 Simulation Software</li>
                        </ul>
                        
                        <h4 class="text-assurance">Job Assurance Courses | Short Term Courses | Combo Courses</h4>
                        <div class="banner-line mb-4"></div>
                        <ul class="list-unstyled">
                            <li class="text-white"><i class="fal fa-check-circle text-warning me-2"></i>For 12+ or Graduates or Professionals</li>
                            <li class="text-white"><i class="fal fa-check-circle text-warning me-2"></i>Learn In English or Hindi</li>
                            <li class="text-white"><i class="fal fa-check-circle text-warning me-2"></i>Courses for Beginners to Pro Level</li>
                            <li class="text-white"><i class="fal fa-check-circle text-warning me-2"></i>Doubt Clearing Sessions</li>
                            <li class="text-white"><i class="fal fa-check-circle text-warning me-2"></i>Live Projects</li>
                        </ul>

                        <div class="row my-4 align-items-center">
                            <div class="col-lg-6">
                                <h4 class="partner-heading mb-2">Authorised Training Partner of</h4>
                                <div class="d-flex">
                                    <div class="item">
                                        <div class="partner-logo me-2">
                                            <img src="/assets/frontend/images/accounting/ms-logo.webp" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="partner-logo me-2">
                                            <img src="/assets/frontend/images/accounting/sap-fico-logo.webp" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="partner-logo me-2">
                                            <img src="/assets/frontend/images/accounting/zoho-logo.webp" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="logo-bar">-->
                                <!--    <img src="/assets/frontend/images/accounting/banner-logo.png" alt="" class="banner-logo">-->
                                <!--</div>-->
                            </div>
                            <div class="col-lg-6">
                                <div class="review-section mt-3">
                                    <div class="review-bar mb-2">
                                        <h6 class="text-white d-inline me-3">Rating: 4.8</h6>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                    </div>
                                    <h6 class="text-white">11028 Votes | 13683 Students</h6>
                                </div>
                            </div>
                        </div>

                        
                        
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="my-4">
                        <div class="banner-form text-center" id="banner-form">
                            <h5 class="fw-bold mb-4">Develop Your Job-Ready Skills</h5>
                            <form id="leadCaptureForm" class="" action="{{ route('ad-page-capture-lead')}}" method="post" >
                                @csrf
                                @include('common.leadCaptureFormField')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <section class="landing-about position-relative" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="my-4 text-center">            
                        <h3 class="about-heading mb-4">Since 1999 with 26 Years of Training Legacy</h3>
                    </div>
                </div>
            </div>    
            <div class="row">
                <div class="col-lg-6">
                    <div class="my-4">
                        <img src="/assets/frontend/images/accounting/about-img-0.jpg" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="my-4 content-bar">
                        
                        <h2 class="pre-heading">After competion of this course course, what you will be able to do</h2>

                        <h4><i class="fal fa-check-circle fs-5 mr-2"></i> Manage daily accounting operations with accuracy</h4>
                        <br />
                        <h4><i class="fal fa-check-circle fs-5 mr-2"></i> Prepare and analyze financial statements</h4>
                        <br />
                        <h4><i class="fal fa-check-circle fs-5 mr-2"></i> Manage accounting tasks using Tally Prime</h4>
                        <br />
                        <h4><i class="fal fa-check-circle fs-5 mr-2"></i> Drive financial control using SAP FICO</h4>
                        <br />
                        <h4><i class="fal fa-check-circle fs-5 mr-2"></i> File GST & tax returns flawlessly</h4>
                        <br />
                        <h4><i class="fal fa-check-circle fs-5 mr-2"></i> Maintain compliance with financial regulations</h4>
                        <br />
                        <h4><i class="fal fa-check-circle fs-5 mr-2"></i> Boost productivity using MS Office</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="section courses-wrapper" id="courses">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="my-4 text-center">
                        <h2 class="pre-heading">List of Courses</h2>
                        <h3>Explore the Best Industrial Accounting Training Programs</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($course_ids as $course_id)
                @php 
                    $course = getCourseById($course_id);
                @endphp
                <div class="col-lg-4 my-4" id="course_{{$course_id}}">
                    <div class="card courses-bar">
                        <img src="{{ url('/assets/frontend/images/course/'.$course->slug.'.webp') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 id="courses-details" class="courses-title">{{ $course->name }}</h4>
                            <div class="meta-courses">
                                <h6>Course Duration :<span> {{ $course->duration }}</span></h6>
                                <h6>Course Module :<span> {{ $course->number_of_modules }} Modules</span></h6>
                                <h6>Delivery Mode :<span> Online</span></h6>
                            </div>
                            <a href="#banner-form" class="btn btn-brochure " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Download Brochure</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row">
                @foreach($course_ids as $key => $course_id)
                @php 
                    $course = getCourseById($course_id);
                @endphp
                <div class="col-lg-12">
                    <div class="course-details {{ ($key == 0)?'active':'' }} course_{{ $course->id }}">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="course_details mb-md-80">
                                    <h2 class="courses-details-heading">{{ $course->name }}</h2>
                                    <ul class="nav nav-tabs style_4 mb-3" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-description_{{ $course->id }}" type="button" role="tab" aria-controls="tab-description" aria-selected="true">Summary</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-criteria_{{ $course->id }}" type="button" role="tab" aria-controls="tab-criteria" aria-selected="false">Criteria</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-highlights_{{ $course->id }}" type="button" role="tab" aria-controls="tab-highlights" aria-selected="false">Highlights</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-curriculum_{{ $course->id }}" type="button" role="tab" aria-controls="tab-curriculum" aria-selected="false">Syllabus</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="tab-tabContent">
                                        <div class="tab-pane fade show active" id="tab-description_{{ $course->id }}" role="tabpanel" aria-labelledby="tab-description-tab_{{ $course->id }}">
                                            {!! $course->description !!}
                                        </div>
                                        <div class="tab-pane fade" id="tab-criteria_{{ $course->id }}" role="tabpanel" aria-labelledby="tab-criteria-tab_{{ $course->id }}">
                                            <div class="desc_box">
                                                <h2 class="course_title">Eligibility Criteria</h2>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 course_criteria">
                                                    {!! $course->criteria !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-highlights_{{ $course->id }}" role="tabpanel" aria-labelledby="tab-highlights-tab_{{ $course->id }}">
                                            <div class="about_list style_2">
                                                {!! $course->highlights !!}
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-curriculum_{{ $course->id }}" role="tabpanel" aria-labelledby="tab-curriculum-tab_{{ $course->id }}">
                                            <div class="syllabus_list accordion accordion-style style_2 mb-xl-30" id="generalaccordion">
                                                @if($course->subjects)
                                                    @foreach(getSubjectsByCourseId($course->subjects) as $key => $subject)
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
                                                                    <li aria-level="{{ $key +1}}">{{ $topic->name }}</li>
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
                                                    Rs. {{ $course->price }}/-
                                                </div>
                                            </li>
                                            <li>
                                                <div class="left-side">
                                                    <i class="fal fa-clock"></i>
                                                    <h6 class="mb-0">Duration</h6>
                                                </div>
                                                <div class="right-side">
                                                    {{ $course->duration }}                                   
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
                                                    {{ $course->certification}}                                 
                                                </div>
                                            </li>
                                        </ul> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                @endforeach
            </div>

        </div>
    </div>
  
    <div class="section section-learn">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="my-4">
                        <h2 class="mb-4">Learn 10 Simulation Software</h2>
                        <p>Master the world of accounting with hands-on experience! Our comprehensive course integrates essential software to bridge theory and practice. You'll gain proficiency in Tally, VO-BAP, ITR, PAN, TDS, GSTN, NET BANKING, PF, ESI, JET</p>
                        <a href="#banner-form" class="btn btn-banner-primary mt-4">Download Brochure</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="my-4">
                        <img src="/assets/frontend/images/accounting/learn.png" alt="" class="img-fluid learn-img">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-training" id="training">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="my-4 text-center">
                        <h2 class="pre-heading">Training Process</h2>
                        <h3>How Accounting Training Classes Works?</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <div class="my-4">
                        <div class="process-bar">
                            <i class="fal fa-check-circle"></i>
                            <h4>Up-to-Date Accounts Syllabus</h4>
                            <p>Ammended accounting course modules to keep you on track with the industry</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="my-4">
                        <div class="process-bar">
                            <i class="fal fa-check-circle"></i>
                            <h4>Get Hands on Experience</h4>
                            <p>With our real-life project made by industry experts and academia</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="my-4">
                        <div class="process-bar">
                            <i class="fal fa-check-circle"></i>
                            <h4>Get Doubts Cleared</h4>
                            <p>Our academia & trainers are always here to help you get your doubts solved</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="my-4">
                        <div class="process-bar">
                            <i class="fal fa-check-circle"></i>
                            <h4>Test Your Knowledge</h4>
                            <p>With our Learnersmall App, you can test your concepts with assignments and quizzes</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="my-4">
                        <div class="process-bar">
                            <i class="fal fa-check-circle"></i>
                            <h4>Sit for the Final Exam</h4>
                            <p>Your training will be completed once you take the final exam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="my-4">
                        <div class="process-bar">
                            <i class="fal fa-check-circle"></i>
                            <h4>Get Industry Recognized Certification</h4>
                            <p>You will be certified as Accounting Professional by ICA Edu Skills and NSDC</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="my-4 text-center">
                        <a href="#banner-form" class="btn btn-banner-primary mt-4">Download Brochure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-certifications" id="certifications">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="my-4 text-center">
                        <h2 class="pre-heading mb-2">Certifications</h2>
                        <h3>Accounting Certifications</h3>
                        <p>After getting certified in an accounting course, several career opportunities await the aspiring candidates to join. To get the right skill set, invest in your future now. Join the Accounting Certification Program today!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="my-4">
                        <div class="certifications-bar">
                            <img src="/assets/frontend/images/accounting/ms-office-course-certification.webp" alt="" class="img-fluid learn-img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="my-4">
                        <div class="certifications-bar">
                            <img src="/assets/frontend/images/accounting/plus-certificate.webp" alt="" class="img-fluid learn-img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="my-4">
                        <div class="certifications-bar">
                            <img src="/assets/frontend/images/accounting/sap-certificate.png" alt="" class="img-fluid learn-img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="my-4">
                        <div class="certifications-bar">
                            <img src="/assets/frontend/images/accounting/zoho-books-certification.webp" alt="" class="img-fluid learn-img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="my-4 text-center">
                        <a href="#banner-form" class="btn btn-banner-primary mt-4">Download Brochure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="landing-choose">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="my-4">
                        <h2 class="h4 pre-heading">Why choose us</h2>
                        <h3 class="choose-heading mb-4">Have a competitive edge over everyone with our online courses!</h3>

                        <h4 class="mt-4"><i class="fal fa-check-circle fs-4 mr-2"></i>Live Online Training Program</h4>
                        <p>We believe in real time learning, which is why we offer live classes for our students. With our online accounting courses, you can learn at your own convenience!</p>

                        <h4 class="mt-4"><i class="fal fa-check-circle fs-4 mr-2"></i>100% Placement Assurance</h4>
                        <p>Our accountant certification is industry recognized. When you enroll in Certified Industrial Accountant Plus courses, you get Triple Certification Advantage- ICA, SAP & MOS Certification. With ICA Edu Skills online courses, you can be rest assured of becoming job ready.</p>

                        <h4 class="mt-4"><i class="fal fa-check-circle fs-4 mr-2"></i>10 Simulation Softwares</h4>
                        <p>With our 10 simulation software, you will get hands-on experience on practicing GSTR, ITR, TDS Return Filing, PF & ESI and much more. Stand out in front of recruiters by enrolling in our courses.</p>

                        <a href="#banner-form" class="btn btn-banner-primary mt-4">Download Brochure</a>
                           

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="my-4 about-pagelanding-img position-relative">
                        <div class="shadow-shape"></div>
                        <img src="/assets/frontend/images/accounting/why-img-3.png" alt="" class="img-fluid about-img-1">
                        <!-- <img src="/assets/frontend/images/accounting/why-img-1.png" alt="" class="img-fluid about-img-2"> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-bg relative z-1 about_bg" style="background-image: url({{ url('assets/frontend/images/bg/bg_1.png')}});">
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

    <footer class="bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h5 class="text-white mb-0">Copyright © 2025 All Rights Reserved, ICA EDU SKILLS</h5>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        let globalUrl = "{{ env("APP_URL") }}"
        let isEnableOtp = {{ (get_theme_setting('enable_otp') == "1")?get_theme_setting('enable_otp'):$contentMain->enable_otp }}
        let isAjaxSubmit = "{{ get_theme_setting('ajax_submit') }}"
    </script>

    <script src="{{ url('assets/frontend/js/plugins/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/HichemTab-tech/OTP-designer-jquery@2.0.1/dist/otpdesigner.min.js"></script>
    <script src="{{ url('assets/frontend/js/plugins/slick.min.js') }}"></script>
    <script src="{{ url('assets/frontend/js/plugins/jquery.validate.min.js') }}"></script>
    <script src="{{ url('assets/frontend/js/ad-script.js') }}"></script>
    <script type="text/javascript" >
        jQuery('.courses-bar').on('click',function(){
            let id = jQuery(this).parent().attr("id");
            console.log(id);
            
            jQuery('.course-details').removeClass('active');
            jQuery('.'+id).addClass('active');
        })
    </script>
</body>
</html>