@extends('layouts.main')
@section('content')
<div class="subheader relative z-1" style="background-image: url(https://www.icacourse.in/wp-content/uploads/2022/06/contact-us-banner-back.jpg);">
    <div class="container relative z-1">
        <div class="row">
            <div class="col-12">
                <h1 class="page_title">Contact Us</h1>
                <div class="page_breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="https://www.icacourse.in/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/elements/element_19.png" alt="element" class="element_1 slideRightTwo">
        <img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/elements/element_10.png" alt="element" class="element_2 zoom-fade">
        <img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/elements/element_20.png" alt="element" class="element_3 rotate_elem">
        <img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/elements/element_21.png" alt="element" class="element_4 rotate_elem">
    </div>
</div>
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
                        <img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/icons/customer-support-Icon.png" alt="icon" class="image-fit-contain">
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
                        <img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/icons/question-Icon.png" alt="icon" class="image-fit-contain">
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

<!-- Contact Form Start -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <p class="subtitle">
                        <i class="fal fa-book"></i>
                        Drop A Message
                    </p>
                    <h3 class="title"><?php echo get_field("contact_form_title"); ?></h3>
                </div>
            </div>
        </div>
        <?php echo do_shortcode('[contact-form-7 id="39" title="Contact Us"]'); ?>
    </div>
</section>
<!-- Contact Form End -->
@endsection