<!-- Mobile Menu Start -->
<aside class="aside_bar aside_bar_left aside_mobile">
    <!-- logo -->
    <a href="{{ route('website') }}" class="logo">
        <img src="{{ url('/assets/frontend/images/logo.png') }}" alt="logo">
    </a>
    <!-- logo -->
    <div class="container">
        <ul style="font-size:20px">
            <li>
                <a href="tel:{{ get_theme_setting('mobile') }}">
                    <i class="fal fa-phone"></i>
                    {{ get_theme_setting('mobile') }}
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
    <!-- Menu -->
    <nav>
        <ul class="main-menu">
            @foreach($primaryMenu as $key => $menuItem)
            <li class="menu-item">
                <a href="{{ url($menuItem['url']) }}">{{ $menuItem['name'] }}</a>
            </li>
            @endforeach
        <ul>
    </nav>
    <!-- Menu -->
</aside>
<div class="aside-overlay trigger-left"></div>
<!-- Mobile Menu End -->
@if(Request::is('/'))
<header class="header header-absolute can-sticky">
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
                        <!-- <p style="margin: auto;">Check Online Class Schedule 
                            <a href="https://www.icacourse.in/batch-schedule/" class="batch-schedule-link"> Click Here </a> 
                        </p> -->
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
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=8100704872">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </li>
                        <li style="margin-right: 20px;">
                            <a target="_blank" href="https://www.instagram.com/icaeduskills_onlinecourse/">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li style="margin-right: 20px;">
                            <a target="_blank" href="https://www.linkedin.com/showcase/ica-edu-skills-online-course/">
                                <i class="fab fa-linkedin"></i>
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
                <div class="logo">
                    <!-- logo -->
                    <a href="{{ url('/') }}" class="logo">
                        <!--<img src="" alt="logo">-->
                        <img src="{{ url('/assets/frontend/images/logo.png') }}" alt="logo">
                    </a>
                    <!-- logo -->
                </div>
                <div class="course-header-menu menu-item menu-item-has-children">
                    <a href="{{ route('page-view','courses') }}" class="thm-btn-border btn-rectangle" >
                    <span class="icon-list"><i class="fal fa-list"></i></span> Courses</a>
                    <ul class="sub-menu desktop-menu">
                        @foreach($courseTypes as $courseType)
                        <li class="more" data-id="category-accounting-courses">
                            <a target="_blank" href="{{ route('category',$courseType->slug) }}">{{ $courseType->name }}</a>
                            <!-- <ul class="more-sub-menu sub-menu">
                                <li><a href="">CIA With Tally </a></li>
                                <li><a href="">CIA With Sap</a></li>
                            </ul> -->
                        </li>
                        @endforeach                 
                    </ul>
                </div>
                <!-- Navigation Start -->
                <div class="menu-header-menu-container">
                    <ul id="accordion" class="main-menu">
                        @foreach($primaryMenu as $key => $menuItem)
                        <li class="menu-item"><a target="_blank" href="{{ url($menuItem['url']) }}">{{ $menuItem['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>    
                <!-- Navigation Ens -->
                 <!-- Head Actions -->
                <div class="head_actions">
                    <!-- Search -->
                    <a href="#lead-generate-popup" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle open-popup-link"> Apply Now </a>
                    
                    <a href="{{ url('cart') }}" class="product-bag-icon desktop-cart"> 
                        <i class="fal fa-shopping-bag"></i> 
                        <span class="header_cart-items"> {{ count($cartItems) }} </span>
                    </a>
                    <!-- <button type="button" class="head_trigger desktop_trigger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button> -->
                    <!-- <button type="button" class="head_trigger mobile_trigger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button> -->
                </div>
                <!-- Head Actions -->
            </nav>
        </div>
        <!-- inner -->
    </div>
</header>
@else
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
                    <a href="{{ url('/') }}">
                        <img src="{{ url('/assets/frontend/images/logo.png') }}" alt="logo">
                    </a>
                </div>
                <!-- logo end -->
                <div class="course-header-menu menu-item menu-item-has-children">
                    <a href="{{ route('page-view','courses') }}" class="thm-btn-border bg-white btn-rectangle" >
                    <span class="icon-list"><i class="fal fa-list"></i></span> Courses</a>
                    <ul class="sub-menu desktop-menu">
                        @foreach($courseTypes as $courseType)
                        <li data-id="category-accounting-courses">
                            <a target="_blank" href="{{ route('category',$courseType->slug) }}">{{ $courseType->name }}</a>
                        </li>
                        @endforeach                      
                    </ul>
                </div>
                <!-- Navigation Start -->
                <div class="menu-header-menu-container">
                    <ul id="accordion" class="main-menu">
                        @foreach($primaryMenu as $key => $menuItem)
                        <li class="menu-item"><a target="_blank" href="{{ url($menuItem['url']) }}">{{ $menuItem['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>                   
                <!-- Navigation Ens -->
                <!-- Head Actions -->
                <div class="head_actions">
                    <!-- Search -->
                    <a href="#lead-generate-popup" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle open-popup-link"> Apply Now </a>
                    
                    <a href="{{ url('/cart') }}" class="product-bag-icon desktop-cart"> 
                        <i class="fal fa-shopping-bag"></i> 
                        <span class="header_cart-items"> 
                            {{ count($cartItems) }}                   
                        </span>
                    </a>

                    <!-- <button type="button" class="head_trigger desktop_trigger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button> -->
                    <!-- <button type="button" class="head_trigger mobile_trigger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button> -->
                </div>
                <!-- Head Actions -->
            </nav>
        </div>
        <!-- inner -->
    </div>
    <div class="nav_sec" style="padding-top: 0;"> </div>
    <!-- Search Start -->
    <div class="search-form-wrapper">
        <div class="close-search-trigger close_trigger">
            <span></span>
            <span></span>
        </div>
        <form class="search-form">
            <input type="text" placeholder="Search..." value="" required="">
            <button type="submit" class="search-btn">
                <i class="fal fa-search m-0"></i>
            </button>
        </form>
    </div>
    <!-- Search End -->
</header>
@endif