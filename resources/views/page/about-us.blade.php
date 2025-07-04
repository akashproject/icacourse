@extends('layouts.main')
@section('content')
<div class="subheader relative z-1" style="background-image: url({{ url('/assets/frontend/images/banner/about-us.webp')}});">
    <div class="container relative z-1">
        <div class="row">
            <div class="col-12">
                <h1 class="page_title">{{ $contentMain->name }}</h1>
                <div class="page_breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $contentMain->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <img src="{{ url('/assets/frontend/images/elements/element_19.png')}}" alt="element" class="element_1 slideRightTwo">
        <img src="{{ url('/assets/frontend/images/elements/element_10.png')}}" alt="element" class="element_2 zoom-fade">
        <img src="{{ url('/assets/frontend/images/elements/element_20.png')}}" alt="element" class="element_3 rotate_elem">
        <img src="{{ url('/assets/frontend/images/elements/element_21.png')}}" alt="element" class="element_4 rotate_elem">
    </div>
</div>
<section class="section about_inner">
    <div class="container">
        <div class="row ">
            <div class="col-lg-5">
                <div class="image_box shadow_1 mb-md-80">                 
                    <img src="https://www.icacourse.in/wp-content/uploads/2023/07/icacourse-about.webp" alt="img" class="image-fit">
                </div>
            </div>

            <div class="col-lg-7">
                <div class="section-title left-align">
                    <p class="subtitle">
                        <i class="fal fa-book"></i>
                        About Us
                    </p>
                    <h3 class="title">26+ Years of Educational Excellence </h3>
                    <p><span style="font-weight: 400">India’s best accounts training institute, ICA Edu Skills offers various online courses with the aim of increasing employability of an individual.&nbsp;</span></p>
                </div>

                <ul class="about_list row">
                    <li class="col-md-6">
                            <div class="icon">                   
                                <img src="https://www.icacourse.in/wp-content/uploads/2022/04/2022-04-26-1.png" alt="img" class="image-fit">
                            </div>
                            <div class="text">
                                <h6 class="mb-2">90% Practical &amp; 10% Theory</h6>
                                <p class="mb-0">We believe in vocational education and hence our curriculum is based on 90% practical training and 10% theory. Our courses help you become job-ready.</p>
                            </div>
                        </li>
                        <li class="col-md-6">
                            <div class="icon">                        
                                <img src="https://www.icacourse.in/wp-content/uploads/2022/04/2022-04-26-1.png" alt="img" class="image-fit">                              
                            </div>
                            <div class="text">
                                <h6 class="mb-2">Learn From the Comfort of Your Home </h6>
                                <p class="mb-0">With our online course, you can learn from anywhere and everywhere at your convenience. Save time and money at the same time!</p>
                            </div>
                        </li>
                        <li class="col-md-6">
                            <div class="icon">
                                <img src="https://www.icacourse.in/wp-content/uploads/2022/04/2022-04-26-1.png" alt="img" class="image-fit">                       
                            </div>
                            <div class="text">
                                <h6 class="mb-2">Choose the Right Career Path</h6>
                                <p class="mb-0">Make the right career choice with our counseling sessions. Be guided towards the path of progress. </p>
                            </div>
                        </li>
                        <li class="col-md-6">
                            <div class="icon">                      
                                <img src="https://www.icacourse.in/wp-content/uploads/2022/06/2022-04-26-1.png" alt="img" class="image-fit">                    
                            </div>
                            <div class="text">
                                <h6 class="mb-2">1000+ Vacancies Weekly </h6>
                                <p class="mb-0">We have more than 1000+ vacancies weekly. Get discovered by recruiters and give your career a kickstart.</p>
                            </div>
                        </li>
                    </ul>   
                    <div class="text-center">
                    <a href="#about_video" class="thm-btn bg-thm-color-three thm-color-three-shadow btn-rectangle">
                        Know More <i class="fal fa-chevron-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="section-padding pt-0">
    <div class="container">
        <div class="row">
            <!-- Box -->
            <div class="col-lg-3 col-md-6">
                <div class="counter_box">
                    <div class="icon">                     
                        <img src="https://www.icacourse.in/wp-content/uploads/2022/04/About-us-Advisor-icon.png" alt="img" class="image-fit">
                    </div>
                    <div class="text">
                        <h3 class="counter1 mb-0">
                            <b data-to="26+">26+</b>
                        </h3>
                        <p class="mb-0">Years of Excellence</p>
                    </div>
                </div>
            </div>  
            <!-- Box -->
            <!-- Box -->
            <div class="col-lg-3 col-md-6">
                <div class="counter_box">
                    <div class="icon">                   
                        <img src="https://www.icacourse.in/wp-content/uploads/2022/04/About-us-Review-icon.png" alt="img" class="image-fit">
                    </div>
                    <div class="text">
                        <h3 class="counter1 mb-0">
                            <b data-to="70K">70K</b>
                        </h3>
                        <p class="mb-0">Registered Employers</p>
                    </div>
                </div>
            </div>  
            <!-- Box -->
            <!-- Box -->
            <div class="col-lg-3 col-md-6">
                <div class="counter_box">
                    <div class="icon">                  
                        <img src="https://www.icacourse.in/wp-content/uploads/2022/04/About-us-Advisor-icon.png" alt="img" class="image-fit">
                    </div>
                    <div class="text">
                        <h3 class="counter1 mb-0">
                            <b data-to="30">30</b>
                        </h3>
                        <p class="mb-0">Placement Offices in India</p>
                    </div>
                </div>
            </div>  
            <!-- Box -->
            <!-- Box -->
            <div class="col-lg-3 col-md-6">
                <div class="counter_box">
                    <div class="icon">                     
                        <img src="https://www.icacourse.in/wp-content/uploads/2022/04/About-us-coach-icon.png" alt="img" class="image-fit">
                    </div>
                    <div class="text">
                        <h3 class="counter1 mb-0">
                            <b data-to="400+">400+</b>
                        </h3>
                        <p class="mb-0">Satisfied Students</p>
                    </div>
                </div>
            </div>  
            <!-- Box -->
        </div>
    </div>
</div>
<section class="section section-bg about_bg about style_2" style="background-image: url(/assets/frontend/images/bg/bg_1.png);">
        <div class="container">
            <div class="row justify-content-between flex-row-reverse">
                <div class="col-lg-6">
                    <div class="image_boxes style_2 relative z-1 h-100" id="about_video">
                        <div class="video_warp style_2 relative z-1 big_img">
                            <img src="{{ url('/assets/frontend/images/about/who-we-are-thumbnail.png')}}" alt="img">
                            <a href="https://www.youtube.com/watch?v=6rYaBEggzqk" class="popup-youtube transform-center justify-content-center d-flex">
                                <img src="{{ url('/assets/frontend/images/icons/youtube.png')}}" alt="icon">
                            </a>
                        </div>

                        <!-- elements -->
                        <img src="{{ url('/assets/frontend/images/elements/element_23.png')}}" class="element_2 rotate_elem" alt="Element">
                        <img src="{{ url('/assets/frontend/images/elements/element_24.png')}}" class="element_3 rotate_elem" alt="Element">
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-md-80">
                    <div class="section-title left-align">
                        <p class="subtitle">
                            <i class="fal fa-book"></i>
                            Who We Are
                        </p>
                        <h3 class="title">What are Job-Assurance Courses? </h3>
                        Certified Industrial Accountant or CIA courses are popularly known as Job Assurance Courses.  These are designed for students who aspire to make a career in the Accounting, Finance &amp; Taxation domain.  After completion of these CIA courses, you have the opportunity to get placed with our 70K+ registered employers. 
                    </div>

                    <ul class="about_list style_2 mb-xl-30">
                        <p><span style="font-weight: 400">Here are the salient features of our online accounting courses:&nbsp;</span></p>
                        <ul>
                            <li style="font-weight: 400"><span style="font-weight: 400">100% Job Assurance&nbsp;</span></li>
                            <li style="font-weight: 400"><span style="font-weight: 400">Experienced CA Faculty</span></li>
                            <li style="font-weight: 400"><span style="font-weight: 400">26+ Years of Industry Exposure&nbsp;</span></li>
                            <li style="font-weight: 400"><span style="font-weight: 400">4 Certification Advantage</span></li>
                            <li style="font-weight: 400"><span style="font-weight: 400">400+ Students Trained</span></li>
                        </ul>
                    </ul>
                    <a href="#lead-generate-popup" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle open-popup-link">
                        Know More<i class="fal fa-chevron-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </section>
@endsection