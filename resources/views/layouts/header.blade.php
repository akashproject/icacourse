@if(Request::is('/'))
<header class="header header-absolute can-sticky">
    <div class="topbar bg-thm-color-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 xs-display-none">
                    <ul class="right-side">
                        <li>
                            <a href="tel:+918100704872">
                                <i class="fal fa-phone"></i>
                                Call : +918100704872                                
                            </a>
                        </li>
                        <li>
                            <a href="mailto:online@icacourse.in">
                                <i class="fal fa-envelope"></i>
                                online@icacourse.in                                
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
                <!-- logo -->
                <a href="{{ url('/') }}" class="logo">
                    <!--<img src="" alt="logo">-->
                    <img src="https://www.icacourse.in/wp-content/uploads/2025/05/ICAOnlineCourseLogowithNSDC.png" alt="logo">
                </a>
                <!-- logo -->
                <!-- Navigation Start -->
                <div class="menu-header-menu-container">
                    <ul id="accordion" class="main-menu">
                        @foreach($primaryMenu as $key => $menuItem)
                        <li class="menu-item"><a target="_blank" href="{{ url($menuItem['url']) }}">{{ $menuItem['name'] }}</a></li>
                        @endforeach
                        
                    </ul>
                </div>    
                <!-- Navigation Ens -->
            </nav>
            <!-- Head Actions -->
            <div class="head_actions">
                <!-- Search -->
                <a href="#lead-generate-popup" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle open-popup-link"> Apply Now </a>
                
                <a href="{{ url('cart') }}" class="product-bag-icon"> 
                    <i class="fal fa-shopping-bag"></i> 
                    <span class="header_cart-items"> 0 </span>
                </a>
                <button type="button" class="head_trigger desktop_trigger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button type="button" class="head_trigger mobile_trigger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <!-- Head Actions -->
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
                            <a href="tel:+918100704872">
                                <i class="fal fa-phone"></i>
                                Call : +918100704872                                
                            </a>
                        </li>
                        <li>
                            <a href="mailto:online@icacourse.in">
                                <i class="fal fa-envelope"></i>
                                online@icacourse.in                                
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
                        <img src="https://www.icacourse.in/wp-content/uploads/2022/02/ICAwithNSDC.png" alt="logo">
                    </a>
                </div>
                <!-- logo end -->
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
                    
                    <a href="https://www.icacourse.in/cart" class="product-bag-icon"> 
                        <i class="fal fa-shopping-bag"></i> 
                        <span class="header_cart-items"> 
                            {{ count($cartItems) }}                   
                        </span>
                    </a>

                    <button type="button" class="head_trigger desktop_trigger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button type="button" class="head_trigger mobile_trigger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
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