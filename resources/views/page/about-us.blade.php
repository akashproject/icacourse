@extends('layouts.main')
@section('content')

<section class="banner-inner">
    <div class="container">
        <div class="inner-left"><img src="assets/frontend/images/round-dot.png" alt="" class="img-fluid"></div>
        <div class="inner-right"><img src="assets/frontend/images/round-dot.png" alt="" class="img-fluid"></div>
        <div class="inner-top"><img src="assets/frontend/images/top.svg" alt="" class="img-fluid"></div>
        <div class="inner-animation"><img src="assets/frontend/images/page-header-shape-2.png" alt="" class="img-fluid"></div>
        <div class="inner-bottom"><img src="assets/frontend/images/bottom.svg" alt="" class="img-fluid"></div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-4">
                        <div class="page_breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                                    <li class="breadcrumb-item active text-white" aria-current="page">{{ $contentMain->name }}</li>
                                </ol>
                            </nav>
                        </div>
                        <h1 class="page_title">{{ $contentMain->name }}</h1>
                    </div>
                    <div class="col-lg-6">
                        <p class="text-white">
                            {{ $contentMain->excerpt }}                     
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section about_inner">

    <div class="container">

        <div class="row">

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

                    <p><span style="font-weight: 400">ICA Edu Skills is India's premier institute for account, taxation, and MIS analysis training. Our online courses go beyond the classroom, offering hands-on, real-world projects and in-house simulation software to boost your employability and prepare you for immediate professional success.</span></p>

                </div>



                <ul class="about_list row">

                    <li class="col-md-6">

                        <div class="icon">                   

                            <img src="https://www.icacourse.in/wp-content/uploads/2022/04/2022-04-26-1.png" alt="img" class="image-fit">

                        </div>

                        <div class="text">

                            <h6 class="mb-2">90% Practical &amp; 10% Theory</h6>

                            <p class="mb-0"><ol><li>Virtual Office - BAP</li><li>GST and ITR Filings on Simulation</li><li>JET: Journal Entry Test (Over 200+)</li></ol></p>

                        </div>

                    </li>

                    <li class="col-md-6">

                        <div class="icon">                        

                            <img src="https://www.icacourse.in/wp-content/uploads/2022/04/2022-04-26-1.png" alt="img" class="image-fit">                              

                        </div>

                        <div class="text">

                            <h6 class="mb-2">Learn From Anywhere, Anytime</h6>

                            <p class="mb-0">

                                <ul>

                                    <li>Self-Paced (Recordings Only): Ideal for working professionals, those with rotational shifts, new parents, or aspiring entrepreneurs.</li>

                                    <li>Live Classes Only: Students, Part Time workers, Own Business</li>

                                </ul>

                            </p>

                        </div>

                    </li>

                    <li class="col-md-6">

                        <div class="icon">

                            <img src="https://www.icacourse.in/wp-content/uploads/2022/04/2022-04-26-1.png" alt="img" class="image-fit">                       

                        </div>

                        <div class="text">

                            <h6 class="mb-2">Internship Focused Training</h6>

                            <p class="mb-0">For all Job Assured Candidates, internship is strongly suggested which helps in building stronger CV and thereby confidence before stepping into corporate world.</p>

                        </div>

                    </li>

                    <li class="col-md-6">

                        <div class="icon">                      

                            <img src="https://www.icacourse.in/wp-content/uploads/2022/06/2022-04-26-1.png" alt="img" class="image-fit">                    

                        </div>

                        <div class="text">

                            <h6 class="mb-2">900+ Vacancies Weekly Pan-India</h6>

                            <p class="mb-0">Make your resume strong with relevant skills and practice. Get discovered by recruiters and give your career a kickstart.</p>

                        </div>

                    </li>

                </ul>

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



<!-- Start Awards section -->

<section class="section about_inner">

    <div class="container">

        <div class="row">

            <div class="col-lg-5">

                <div class="">

                    <img src="https://www.icajobguarantee.com/assets/img/awards-recognition.png" alt="ICA Edu Skills: Awards & Recognition" class="image-fit" />

                </div>

            </div>



            <div class="col-lg-7">

                <div class="section-title left-align">

                    <p class="subtitle">

                        <i class="fal fa-book"></i>

                        Awards

                    </p>

                    <h3 class="title"> Awards & Recognition </h3>

                </div>

                <p>When we call ICA Edu Skills Pvt. Ltd. the ‘No.1 Training Institute in Accounts and Finance’, it’s not just our own claim—it’s supported by numerous respected brands and organisations that have recognised our dedication and achievements over the years.</p>

				<p>Each year, ICA Edu Skills Pvt. Ltd. receives awards and accolades that we proudly consider our badges of honour. While there isn’t enough space to showcase every recognition at once, we’re delighted to share some of our most treasured honours here.</p>

                <div class="text-center">

                   <a href="https://www.icajobguarantee.com/awards-recognitions" target="_blank" class="thm-btn bg-thm-color-three thm-color-three-shadow btn-rectangle"> View Awards <i class="fal fa-chevron-right ml-2"></i></a>

                </div>

            </div>

        </div>

    </div>    

</section>

<!-- End Awards section -->





<!-- Start Team Management Section -->

<section  class="section">

	<div class="container">

		<div class="section-title mb35 headline text-left">

			<span class="subtitle ml42  text-uppercase">Team</span>

			<h3 class="title"> Management Team </h3>

		</div>

		<div class="row">

			<div class="col-xl-3 col-sm-6">

                <div class="team_card">

                    <div class="team_image">

                        <img src="{{ url('assets/frontend/images/team/nks.webp')}}" alt="Dr.Narendra Shyamsukha">

                        <div class="team_card_hover">

                            <div class="instructor-card__info">

                                <h3 class="instructor-card__name">

                                    Dr.Narendra Shyamsukha

                                </h3>

                                <h6 class="instructor-card__designation">Chairman</h6>

                            </div>

                        </div>

                    </div>

                </div>

		    </div>

            <div class="col-xl-3 col-sm-6">

                <div class="team_card">

                    <div class="team_image">

                        <img src="{{ url('assets/frontend/images/team/ankit.webp')}}" alt="Ankit Shyamsukha">

                        <div class="team_card_hover">

                            <div class="instructor-card__info">

                                <h3 class="instructor-card__name">

                                    Ankit Shyamsukha

                                </h3>

                                <h6 class="instructor-card__designation">CEO</h6>

                            </div>

                        </div>

                    </div>

                </div>

		    </div>

            <div class="col-xl-3 col-sm-6">

                <div class="team_card">

                    <div class="team_image">

                        <img src="{{ url('assets/frontend/images/team/kanhaiya.webp')}}" alt="Kanhaiya Poddar">

                        <div class="team_card_hover">

                            <div class="instructor-card__info">

                                <h3 class="instructor-card__name">

                                    Kanhaiya Poddar

                                </h3>

                                <h6 class="instructor-card__designation">CFO</h6>

                            </div>

                        </div>

                    </div>

                </div>

		    </div>

            <div class="col-xl-3 col-sm-6">

                <div class="team_card">

                    <div class="team_image">

                        <img src="https://dummyimage.com/390x450" alt="Kanhaiya Poddar">

                        <div class="team_card_hover">

                            <div class="instructor-card__info">

                                <h3 class="instructor-card__name">

                                    Shreya Dugar Shyamsukha

                                </h3>

                                <h6 class="instructor-card__designation"> Team Leader</h6>

                            </div>

                        </div>

                    </div>

                </div>

		    </div>

		</div>

</section>

<!-- End Team Management Section -->





<!--section class="section section-bg about_bg about style_2" style="background-image: url(/assets/frontend/images/bg/bg_1.png);">

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

</section-->



@endsection