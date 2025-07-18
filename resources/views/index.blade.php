@extends('layouts.main')
@section('content')

<div class="hero-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>Reinvent the <span class="">online learning</span> experience with us</h2>
                <p>India’s #1 Accounts, Finance & Taxation Training Institute to Provide Online Job Assurance Courses</p>
                <div class="d-flex">
                    <a href="{{ route('page-view','courses') }}" class="thm-btn bg-thm-color-two thm-color-two-shadow mr-4 mb-4">Explore Courses <i class="fal fa-chevron-right ml-2"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-img">
                    <img src="assets/frontend/images/students.svg" alt="" class="img-fluid students-img">
                    <img src="assets/frontend/images/chat-up.svg" alt="" class="img-fluid chat-up">
                    <img src="assets/frontend/images/stape.svg" alt="" class="img-fluid stape">
                    <img src="assets/frontend/images/banner-img-right.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 aos-init" data-aos="fade-up" data-aos-delay="">
                <h3 class="title">Explore the Best Online <span class="curve-text">Accounting and Taxation</span> Courses</h3>
            </div>
            <div class="col-md-4 text-right">
                <a href="{{ route('page-view','courses') }}" target="_blank" class="thm-btn bg-thm-color-two thm-color-two-shadow mr-4 mb-4">View All <i class="fal fa-chevron-right ml-2"></i></a>
            </div>
        </div>
        @include('common.courses')
    </div>
</section>

<section class="why-wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 my-4">
                <img src="assets/frontend/images/about-img-home.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 ps-lg-5 my-4">
                <h2 class="pre-heading">Our Offerings</h2>
                <h3 class="sec-heading mb-5">Take Charge of Your Career with ICA Edu Skills!</h3>
                <p>ICA Edu Skills is regarded as the leading vocational training institute and the best accounts training institute in India. ICA Online Courses, a venture of ICA Edu Skills aims to make the youth industry ready by curating job-oriented accounting classes online. These courses are designed following the best industry practices.</p>
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="assets/frontend/images/live-img.png" alt="..." class="img-fluid">
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h5>Pocket-Friendly Fees</h5>
                        <p>Our course fees are affordable and allow you to learn from the comfort of your home.</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="assets/frontend/images/plece-img.png" alt="..." class="img-fluid">
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h5>Develop Job-Ready Skills</h5>
                        <p>With a cutting edge curriculum, designed with the guidance of the industry and academia, you will have developed job-ready skills at the end of the course.</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="assets/frontend/images/soft-img.png" alt="..." class="img-fluid">
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h5>Learn From Industry Experts</h5>
                        <p>Our faculty are leading practitioners in the field of Accounting, Taxation and Finance. They utilize case studies and live classes, making the course interactive.</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="assets/frontend/images/soft-img.png" alt="..." class="img-fluid">
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h5>Work on Live Projects</h5>
                        <p>Live projects involving real world data to give you firsthand experience. What are you waiting for?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="price-wrap" class="section-padding price">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-12 text-center aos-init" data-aos="fade-up" data-aos-delay="">
                <h3 class="title">Courses For Your Career</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="price-wrapper xs-display-none">
                    <div class="price-box">
                        <div class="price-coll"><span class="modules-text">Modules</span></div>
                        <div class="price-coll"><span class="modules-text">Hours</span></div>
                        <div class="price-coll">
                            <h5>CIA Express<br> (3Months)</h5>

                            <span>40999</span>

                            <a href="#lead-generate-popup" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle open-popup-link">Enquire now</a>

                        </div>

                        <div class="price-coll"><h5>CIA <br>(4Months)</h5>

                            <span>49999</span>

                            <a href="#lead-generate-popup" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle open-popup-link">Enquire now</a>

                        </div>

                        <div class="price-coll"><h5>CIA With SAP <br>(6Months)</h5>

                            <span>72999</span>

                            <a href="#lead-generate-popup" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle open-popup-link">Enquire now</a>

                        </div>

                    </div>

                    <div class="price-box">

                        <div class="price-coll">Business Computer Applications</div>

                        <div class="price-coll">45</div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                    </div>

                    <div class="price-box">

                        <div class="price-coll">Business Accounting</div>

                        <div class="price-coll">36</div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                    </div>

                    <div class="price-box">

                        <div class="price-coll">TallyPrime</div>

                        <div class="price-coll">51</div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                    </div>

                    <div class="price-box">

                        <div class="price-coll">Business Communication</div>

                        <div class="price-coll">45</div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                    </div>

                    <div class="price-box">

                        <div class="price-coll">Live Project 1</div>

                        <div class="price-coll">3</div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                    </div>

                    <div class="price-box">

                        <div class="price-coll">Direct Tax</div>

                        <div class="price-coll">39</div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/cancel.png" alt="not available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                    </div>

                    <div class="price-box">

                        <div class="price-coll">TDS</div>

                        <div class="price-coll">11</div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/cancel.png" alt="not available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/cancel.png" alt="not available"></div>

                    </div>

                    <div class="price-box">

                        <div class="price-coll">Goods and Services Tax (GST)</div>

                        <div class="price-coll">27</div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                    </div>

                    <div class="price-box">

                    <div class="price-coll">Advanced Accounts</div>

                        <div class="price-coll">30</div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/cancel.png" alt="not available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                    </div>

                    <div class="price-box">

                        <div class="price-coll">Live Project 2</div>

                        <div class="price-coll">9</div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                    </div> 

                    <div class="price-box">

                        <div class="price-coll">SAP (Finance &amp; Controlling)</div>

                        <div class="price-coll">80</div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/cancel.png" alt="not available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/cancel.png" alt="not available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                    </div>

                

                    <div class="price-box">

                        <div class="price-coll">Final Exam</div>

                        <div class="price-coll">12</div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                        <div class="price-coll"><img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                    </div>

                    <div class="price-box">

                        <div class="price-coll"></div>

                        <div class="price-coll">Total Hours</div>

                        <div class="price-coll">230</div>

                        <div class="price-coll">288</div>

                        <div class="price-coll">368</div>

                    </div>

                    <div class="price-box">

                        <div class="price-coll" style="visibility: hidden;"><span class="modules-text">Modules</span></div>

                        <div class="price-coll" style="visibility: hidden;"><span class="modules-text">Hours</span></div>

                        <div class="price-coll">                   

                            <a href="#lead-generate-popup" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle open-popup-link">Enroll now</a>

                        </div>

                        <div class="price-coll">

                        <a href="#lead-generate-popup" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle open-popup-link">Enroll now</a>

                        </div>

                        <div class="price-coll">

                            <a href="#lead-generate-popup" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle open-popup-link">Enroll now</a>

                        </div>

                    </div>

                </div>

                <div class="mobile-price lg-display-none">

                    <div class="group mobile-gap">

                        <div class="grid-1-5">

                            <h2>Business Computer Applications</h2>                          

                            <div class="price-info-wrap">

                                <div class="price-info-box">

                                    <div class="price-text">CIA Express (3Months)<span>40999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA (4Months)<span>49999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA With SAP(6Months)<span>72999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>



                                <div class="price-select">

                                <div class="price-select-full">

                                    <select>

                                    <option>CIA Express (3Months)</option>

                                    <option>CIA (4Months)</option>

                                    <option>CIA With SAP(6Months)</option>

                                </select>

                                </div>

                                <div class="price-select-btn">

                                    <a href="#lead-generate-popup" class="bg-thm-color-two btn-rectangle open-popup-link">Enroll Now</a>

                                    <span>or <a href="#lead-generate-popup" class="enquire_now_btn open-popup-link">Enquire now</a></span>

                                </div>

                                </div>

                            </div>              

                        </div>



                        <div class="grid-1-5">

                            <h2>Business Accounting</h2>               

                            <div class="price-info-wrap">

                                <div class="price-info-box">

                                    <div class="price-text">CIA Express (3Months)<span>40999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA (4Months)<span>49999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA With SAP(6Months)<span>72999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>



                                <div class="price-select">

                                <div class="price-select-full">

                                    <select>

                                    <option>CIA Express (3Months)</option>

                                    <option>CIA (4Months)</option>

                                    <option>CIA With SAP(6Months)</option>

                                </select>

                                </div>

                                <div class="price-select-btn">

                                    <a href="#lead-generate-popup" class="bg-thm-color-two btn-rectangle open-popup-link">Enroll Now</a>

                                    <span>or <a href="#lead-generate-popup" class="enquire_now_btn open-popup-link">Enquire now</a></span>

                                </div>

                                </div>

                                

                                

                            </div>            

                        </div>



                        <div class="grid-1-5">

                            <h2>TallyPrime</h2>

                            <div class="price-info-wrap">

                                <div class="price-info-box">

                                    <div class="price-text">CIA Express (3Months)<span>40999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA (4Months)<span>49999</span></div>

                                    <div class="price-text-valu">

                                        <img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available">

                                    </div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA With SAP(6Months)<span>72999</span></div>

                                    <div class="price-text-valu">

                                        <img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available">

                                    </div>

                                </div>



                                <div class="price-select">

                                    <div class="price-select-full">

                                    <select>

                                        <option>CIA Express (3Months)</option>

                                        <option>CIA (4Months)</option>

                                        <option>CIA With SAP(6Months)</option>

                                    </select>

                                </div>

                                <div class="price-select-btn">

                                    <a href="#lead-generate-popup" class="bg-thm-color-two btn-rectangle open-popup-link">Enroll Now</a>

                                    <span>or <a href="#lead-generate-popup" class="enquire_now_btn open-popup-link">Enquire now</a></span>

                                </div>

                            </div>      

                        </div>



                        <div class="grid-1-5">

                            <h2>Business Communication</h2>                          

                            <div class="price-info-wrap">

                                <div class="price-info-box">

                                    <div class="price-text">CIA Express (3Months)<span>40999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA (4Months)<span>49999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA With SAP(6Months)<span>72999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>



                                <div class="price-select">

                                    <div class="price-select-full">

                                        <select>

                                            <option>CIA Express (3Months)</option>

                                            <option>CIA (4Months)</option>

                                            <option>CIA With SAP(6Months)</option>

                                        </select>

                                    </div>

                                    <div class="price-select-btn">

                                        <a href="#lead-generate-popup" class="bg-thm-color-two btn-rectangle open-popup-link">Enroll Now</a>

                                        <span>or <a href="#lead-generate-popup" class="enquire_now_btn open-popup-link">Enquire now</a></span>

                                    </div>

                                </div>

                            </div>   

                        </div>



                        <div class="grid-1-5">

                            <h2>Live Project 1</h2>                          

                            <div class="price-info-wrap">

                                <div class="price-info-box">

                                    <div class="price-text">CIA Express (3Months)<span>40999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA (4Months)<span>49999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA With SAP(6Months)<span>72999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>



                                <div class="price-select">

                                    <div class="price-select-full">

                                        <select>

                                            <option>CIA Express (3Months)</option>

                                            <option>CIA (4Months)</option>

                                            <option>CIA With SAP(6Months)</option>

                                        </select>

                                    </div>

                                    <div class="price-select-btn">

                                        <a href="#lead-generate-popup" class="bg-thm-color-two btn-rectangle open-popup-link">Enroll Now</a>

                                        <span>or <a href="#lead-generate-popup" class="enquire_now_btn open-popup-link">Enquire now</a></span>

                                    </div>

                                </div>

                            </div>                          

                        </div>



                        <div class="grid-1-5">

                            <h2>Direct Tax</h2>                          

                            <div class="price-info-wrap">

                                <div class="price-info-box">

                                    <div class="price-text">CIA Express (3Months)<span>40999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/cancel.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA (4Months)<span>49999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA With SAP(6Months)<span>72999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>



                                <div class="price-select">

                                    <div class="price-select-full">

                                        <select>

                                            <option>CIA Express (3Months)</option>

                                            <option>CIA (4Months)</option>

                                            <option>CIA With SAP(6Months)</option>

                                        </select>

                                    </div>

                                    <div class="price-select-btn">

                                        <a href="#lead-generate-popup" class="bg-thm-color-two btn-rectangle open-popup-link">Enroll Now</a>

                                        <span>or <a href="#lead-generate-popup" class="enquire_now_btn open-popup-link">Enquire now</a></span>

                                    </div>

                                </div>

                            </div>                         

                        </div>



                        <div class="grid-1-5">

                            <h2>TDS</h2>

                        

                            <div class="price-info-wrap">

                                <div class="price-info-box">

                                    <div class="price-text">CIA Express (3Months)<span>40999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA (4Months)<span>49999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/cancel.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA With SAP(6Months)<span>72999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/cancel.png" alt="available"></div>

                                </div>



                                <div class="price-select">

                                <div class="price-select-full">

                                    <select>

                                    <option>CIA Express (3Months)</option>

                                    <option>CIA (4Months)</option>

                                    <option>CIA With SAP(6Months)</option>

                                </select>

                                </div>

                                <div class="price-select-btn">

                                    <a href="#lead-generate-popup" class="bg-thm-color-two btn-rectangle open-popup-link">Enroll Now</a>

                                    <span>or <a href="#lead-generate-popup" class="enquire_now_btn open-popup-link">Enquire now</a></span>

                                </div>

                            </div>

                                

                                

                        </div>



                        <div class="grid-1-5">

                            <h2>Goods and Services Tax (GST)</h2>

                        

                            <div class="price-info-wrap">

                                <div class="price-info-box">

                                    <div class="price-text">CIA Express (3Months)<span>40999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA (4Months)<span>49999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA With SAP(6Months)<span>72999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>



                                <div class="price-select">

                                <div class="price-select-full">

                                    <select>

                                    <option>CIA Express (3Months)</option>

                                    <option>CIA (4Months)</option>

                                    <option>CIA With SAP(6Months)</option>

                                </select>

                                </div>

                                <div class="price-select-btn">

                                    <a href="#lead-generate-popup" class="bg-thm-color-two btn-rectangle open-popup-link">Enroll Now</a>

                                    <span>or <a href="#lead-generate-popup" class="enquire_now_btn open-popup-link">Enquire now</a></span>

                                </div>

                                </div>

                                

                                

                            </div>



                        

                        </div>



                        <div class="grid-1-5">

                            <h2>Advanced Accounts</h2>

                        

                            <div class="price-info-wrap">

                                <div class="price-info-box">

                                    <div class="price-text">CIA Express (3Months)<span>40999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/cancel.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA (4Months)<span>49999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA With SAP(6Months)<span>72999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>



                                <div class="price-select">

                                <div class="price-select-full">

                                    <select>

                                    <option>CIA Express (3Months)</option>

                                    <option>CIA (4Months)</option>

                                    <option>CIA With SAP(6Months)</option>

                                </select>

                                </div>

                                <div class="price-select-btn">

                                    <a href="#lead-generate-popup" class="bg-thm-color-two btn-rectangle open-popup-link">Enroll Now</a>

                                    <span>or <a href="#lead-generate-popup" class="enquire_now_btn open-popup-link">Enquire now</a></span>

                                </div>

                                </div>

                                

                                

                            </div>



                        

                        </div>



                        <div class="grid-1-5">

                            <h2>Live Project 2</h2>

                        

                            <div class="price-info-wrap">

                                <div class="price-info-box">

                                    <div class="price-text">CIA Express (3Months)<span>40999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA (4Months)<span>49999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA With SAP(6Months)<span>72999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>



                                <div class="price-select">

                                <div class="price-select-full">

                                    <select>

                                    <option>CIA Express (3Months)</option>

                                    <option>CIA (4Months)</option>

                                    <option>CIA With SAP(6Months)</option>

                                </select>

                                </div>

                                <div class="price-select-btn">

                                    <a href="#lead-generate-popup" class="bg-thm-color-two btn-rectangle open-popup-link">Enroll Now</a>

                                    <span>or <a href="#lead-generate-popup" class="enquire_now_btn open-popup-link">Enquire now</a></span>

                                </div>

                                </div>

                                

                                

                            </div>



                        

                        </div>



                        <div class="grid-1-5">

                            <h2>SAP (Finance &amp; Controlling)</h2>

                        

                            <div class="price-info-wrap">

                                <div class="price-info-box">

                                    <div class="price-text">CIA Express (3Months)<span>40999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/cancel.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA (4Months)<span>49999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/cancel.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA With SAP(6Months)<span>72999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>



                                <div class="price-select">

                                <div class="price-select-full">

                                    <select>

                                    <option>CIA Express (3Months)</option>

                                    <option>CIA (4Months)</option>

                                    <option>CIA With SAP(6Months)</option>

                                </select>

                                </div>

                                <div class="price-select-btn">

                                    <a href="#lead-generate-popup" class="bg-thm-color-two btn-rectangle open-popup-link">Enroll Now</a>

                                    <span>or <a href="#lead-generate-popup" class="enquire_now_btn open-popup-link">Enquire now</a></span>

                                </div>

                                </div>

                            </div>

                        </div>

                        <div class="grid-1-5">

                            <h2>Final Exam</h2>

                    

                            <div class="price-info-wrap">

                                <div class="price-info-box">

                                    <div class="price-text">CIA Express (3Months)<span>40999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA (4Months)<span>49999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>

                                <div class="price-info-box">

                                    <div class="price-text">CIA With SAP(6Months)<span>72999</span></div>

                                    <div class="price-text-valu"><img style="width: 20px;" src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/tick.png" alt="available"></div>

                                </div>



                                <div class="price-select">

                                    <div class="price-select-full">

                                        <select>

                                        <option>CIA Express (3Months)</option>

                                        <option>CIA (4Months)</option>

                                        <option>CIA With SAP(6Months)</option>

                                    </select>

                                </div>

                                    <div class="price-select-btn">

                                        <a href="#lead-generate-popup" class="bg-thm-color-two btn-rectangle open-popup-link">Enroll Now</a>

                                        <span>or <a href="#lead-generate-popup" class="enquire_now_btn open-popup-link">Enquire now</a></span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<section class="section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <h3 class="title">Our Top <span class="curve-text">Recruiters</span></h3>
                    <p>We connect you with top companies, and our dedicated placement assistance helps you land your dream job in the digital marketing industry. Our strong ties with leading recruiters ensure IDCM Alumni are highly sought after for cutting-edge job roles.</p>
                </div><!-- /.sec-title -->
            </div>
            <div class="col-md-8">
                <ul class="recruiters ">
                    @foreach(getRecruiters() as $key => $recruiter)
                    <div class="placement-redious-grid">
                        <span class="placement-grid-img">
                            <img src="{{ getSizedImage($recruiter->featured_image) }}" alt="{{ $recruiter->name }}" class="width-100">
                        </span>
                    </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Why Us Start -->

<section class="why-wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 pe-lg-5">
                <h2 class="pre-heading">Why choose us</h2>
                <h3 class="sec-heading mb-5">Have a competitive edge over everyone with our online courses!</h3>
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="assets/frontend/images/live-img.png" alt="..." class="img-fluid">
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h5>Live Online Training Program</h5>
                        <p>We believe in real time learning, which is why we offer live classes for our students. With our online accounting courses, you can learn at your own convenience!</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="assets/frontend/images/plece-img.png" alt="..." class="img-fluid">
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h5>100% Placement Assurance</h5>
                        <p>Our accountant certification is industry recognized. When you enroll in Certified Industrial Accountant Plus courses, you get Triple Certification Advantage- ICA, SAP & MOS Certification. With ICA Edu Skills online courses, you can be rest assured of becoming job ready.</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="assets/frontend/images/soft-img.png" alt="..." class="img-fluid">
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h5>7 Simulation Softwares</h5>
                        <p>With our 7 simulation software, you will get hands-on experience on practicing GSTR, ITR, TDS Return Filing, PF & ESI and much more. Stand out in front of recruiters by enrolling in our courses.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="assets/frontend/images/why-img-new.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="experience-wrapper">
    <img src="assets/frontend/images/experience-img-left.png" alt="" class="experience-img-left">
    <img src="assets/frontend/images/experience-img-right.png" alt="" class="experience-img-right">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <h2>Get The Best E-learning Experience with ICA!</h2>
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
<!-- Testimonials End -->
@endsection