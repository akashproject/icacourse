<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($contentMain->title)?$contentMain->title:'IDCM: Institute of Digital & Content Marketing' }}</title>
    <meta name="description" content="{{ isset($contentMain->meta_description)?$contentMain->meta_description:'IDCM, best digital marketing Institute in Delhi & Kolkata. Get 100% job assurance at affordable fees and 100% Industry Training. Book Your Free Demo Class Now.' }}" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="{{url()->current()}}"/>
    <meta name="author" content="MyIdcm">
    <meta property="og:locale" content="en_IN" />
	<meta name="p:domain_verify" content="2757c24fbba370f3d146a24c9c17d66a"/>
	<meta name="google-site-verification" content="37KdQ39QcywGtqdFHMds0Q9LCbypRJICjnGKONQbLqU" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="IDCM: Institute of Digital & Content Marketing">
    <meta property="og:locale" content="en_IN" />
    <meta property="og:site_name" content="Institute of Digital & Content Marketing" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ isset($contentMain->title)?$contentMain->title:'IDCM: Institute of Digital & Content Marketing' }}" />
    <meta property="og:description" content="{{ isset($contentMain->meta_description)?$contentMain->meta_description:'IDCM, best digital marketing Institute in Delhi & Kolkata. Get 100% job assurance at affordable fees and 100% Industry Training. Book Your Free Demo Class Now.' }}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@IDCM_dmtraining" />
    <meta name="twitter:title" content="{{ isset($contentMain->title)?$contentMain->title:'IDCM: Institute of Digital & Content Marketing' }}" />
    <meta name="twitter:description" content="{{ isset($contentMain->meta_description)?$contentMain->meta_description:'IDCM, best digital marketing Institute in Delhi & Kolkata. Get 100% job assurance at affordable fees and 100% Industry Training. Book Your Free Demo Class Now.' }}" />
    <meta name="twitter:creator" content="@IDCM_dmtraining" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="admin" />
    <meta name="twitter:label2" content="Est. reading time" />
    <meta name="twitter:data2" content="2 minute" />
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/frontend/images/favicon.ico') }}">
    <!-- Fonts and Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Alex+Brush&family=Cormorant:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/frontend/vendors/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/frontend/vendors/bootstrap-select/bootstrap-select.min.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/frontend/vendors/animate/animate.min.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/frontend/vendors/fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/frontend/vendors/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/frontend/vendors/jarallax/jarallax.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('assets/frontend/vendors/nouislider/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/frontend/vendors/nouislider/nouislider.pips.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/frontend/vendors/tiny-slider/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/frontend/vendors/eduhive-icons/style.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/frontend/vendors/owl-carousel/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/frontend/vendors/owl-carousel/css/owl.theme.default.min.css')}}" />
    <link  rel="stylesheet" href="{{ url('assets/frontend/css/ad-eduhive.css') }}">
    @yield('style')    
    <script>
        let popUp = 1
	</script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TR496XN');</script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://web.archive.org/web/20250514003503if_/https://www.googletagmanager.com/ns.html?id=GTM-TR496XN" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) --> 
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>
    <div class="preloader">
        <div class="preloader__image" style="background-image: url(/assets/frontend/images/idcm-loader.gif);"></div>
    </div>
        <!-- /.preloader -->
        <div class="page-wrapper">
            @yield('content')
            <footer class="main-footer section-space-top">
                <div class="main-footer__bottom">
                    <div class="container">
                        <div class="main-footer__bottom__inner">
                            <p class="main-footer__copyright">
                                &copy; Copyright <span class="dynamic-year"></span> by MYDICM
                            </p>
                        </div><!-- /.main-footer__inner -->
                    </div><!-- /.container -->
                </div><!-- /.main-footer__bottom -->
                <img src="{{ url('/assets/frontend/images/shapes/footer-shape-1.png') }}" alt="shape" class="main-footer__shape-one">
                <img src="{{ url('/assets/frontend/images/shapes/footer-shape-2.png') }}" alt="shape" class="main-footer__shape-two">
                <img src="{{ url('/assets/frontend/images/shapes/footer-shape-3.png') }}" alt="shape" class="main-footer__shape-three">
                <img src="{{ url('/assets/frontend/images/shapes/footer-shape-4.png') }}" alt="shape" class="main-footer__shape-four">
                <img src="{{ url('/assets/frontend/images/shapes/footer-shape-5.png') }}" alt="shape" class="main-footer__shape-five">
            </footer><!-- /.main-footer section-space-top -->

        </div><!-- /.page-wrapper -->
        <div id="lead-generate-popup" class="white-popup mfp-hide">
            @include('common.leadCaptureForm')
        </div>
    <script>
        let globalUrl = "{{ env("APP_URL") }}"
        let isEnableOtp = {{ (get_theme_setting('enable_otp') == "1")?get_theme_setting('enable_otp'):$contentMain->enable_otp }}
        let isAjaxSubmit = "{{ get_theme_setting('ajax_submit') }}"
    </script>

    <script src="{{ url('/assets/frontend/vendors/jquery/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ url('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/tiny-slider/tiny-slider.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/owl-carousel/js/owlcarousel2-filter.min.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/owl-carousel/js/owlcarousel2-progressbar.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/wow/wow.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/imagesloaded/imagesloaded.min.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ url('/assets/frontend/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ url('assets/frontend/vendors/jquery-circleType/jquery.circleType.js')}}"></script>
    <script src="{{ url('/assets/frontend/vendors/jquery-lettering/jquery.lettering.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/HichemTab-tech/OTP-designer-jquery@2.0.1/dist/otpdesigner.min.js"></script>
    <!-- template js -->
    <script src="{{ url('/assets/frontend/js/eduhive.js')}}"></script>
</body>

</html>