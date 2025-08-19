@extends('layouts.main')
@section('content')
<section class="banner-inner">
    <div class="container">
        <div class="inner-left"><img src="{{ url('assets/frontend/images/round-dot.png')}}" alt="" class="img-fluid"></div>
        <div class="inner-right"><img src="{{ url('assets/frontend/images/round-dot.png')}}" alt="" class="img-fluid"></div>
        <div class="inner-top"><img src="{{ url('assets/frontend/images/top.svg')}}" alt="" class="img-fluid"></div>
        <div class="inner-animation"><img src="{{ url('assets/frontend/images/page-header-shape-2.png')}}" alt="" class="img-fluid"></div>
        <div class="inner-bottom"><img src="{{ url('assets/frontend/images/bottom.svg')}}" alt="" class="img-fluid"></div>
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
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <p class="subtitle">
                        <i class="fal fa-book"></i>
                        Support Team
                    </p>
                    <h3 class="title">Speak to our expert-counselor </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="contact_faq_box shadow_1">
                    <div class="icon">
                        <img src="{{ url('/assets/frontend/images/icons/customer-support-Icon.png')}}" alt="icon" class="image-fit-contain">
                    </div>
                    <div class="text">
                        <h4>Get instant support</h4>
                        <p>Talk to our expert counselor to enter into the career enhancement you are looking for.</p>
                        <a href="tel:+918100704872" class="thm-btn bg-thm-color-three thm-color-three-shadow btn-rectangle">Call <i class="fal fa-chevron-right ml-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact_faq_box shadow_1">
                    <div class="icon">
                        <img src="{{ url('/assets/frontend/images/icons/question-Icon.png')}}" alt="icon" class="image-fit-contain">
                    </div>
                    <div class="text">
                        <h4>Still have doubts?</h4>
                        <p>Let's connect &amp; escalate all the doubts regarding the specialized course curriculum!</p>
                        <a href="mailto:online@icacourse.in" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle">Contact Us <i class="fal fa-chevron-right ml-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Map & Info Start -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-4 col-lg-5">
                <div class="section-title left-align">
                    <p class="subtitle">
                        <i class="fal fa-book"></i>
                        Contact Us
                    </p>
                    <h3 class="title">Get In Touch</h3>
                </div>

                <div class="contact_info mb-md-80">
                    <ul>
                        <li>
                            <i class="icon fal fa-map-marker-alt"></i>
                            <div class="text" style="width: 83%;">
                                <h6>Location</h6>
                                <p>Unit No. ECSL1401, EcoCentre Business Park, EM Block, Sector V, Salt Lake, Kolkata, West Bengal 700091</p>
                            </div>
                        </li>

                        <li>
                            <i class="icon fal fa-envelope-open-text"></i>
                            <div class="text">
                                <h6>Email Address</h6>
                                <p><a href="mailto:online@icacourse.in">online@icacourse.in</a></p>
                            </div>
                        </li>

                        <li>
                            <i class="icon fal fa-phone"></i>
                            <div class="text">
                                <h6>Contact Us</h6>
                                <p><strong>Mobile: </strong><a href="tel:+918100704872">+918100704872</a></p>
                                <p><strong>WhatsApp: </strong><a href="">+918450006000</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="contact_map relative z-1 wow fadeInRight" id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14736.231182837615!2d88.4279651!3d22.5769416!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x205e80384d040e8f!2sICA%20Edu%20Skills%20%7C%20Head%20Office!5e0!3m2!1sen!2sin!4v1654757742888!5m2!1sen!2sin" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Map & Info End -->
    <!-- Contact Form Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title wow fadeInDown">
                        <p class="subtitle">
                            <i class="fal fa-book"></i>
                            Drop A Message
                        </p>
                        <h3 class="title">Have Any Questions Let’s Started Talk</h3>
                    </div>
                </div>
            </div>
            <form id="contactForm" action="assets/php/form-process.php" name="contactForm" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group form_style">
                            <label>Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" autocomplete="off" placeholder="Full Name" required data-error="Please enter your name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form_style">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form_style">
                            <label>Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" autocomplete="off" placeholder="Email Address" required data-error="Please enter your Email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form_style">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control" autocomplete="off" placeholder="I Would Like To Discuss">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group form_style">
                            <label>Message</label>
                            <textarea rows="10" id="message" class="form-control" placeholder="Write Message" autocomplete="off" name="message" required data-error="Please enter your Message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="thm-btn bg-thm-color-three thm-color-three-shadow btn-rectangle">Send Your Message <i class="fal fa-chevron-right ml-2"></i></button>
                        <div id="msgSubmit" class="hidden"></div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Contact Form End -->
@endsection