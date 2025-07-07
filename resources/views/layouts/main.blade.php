<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/frontend/images/favicon.ico') }}">
    <title>{{ isset($contentMain->title)?$contentMain->title:'Accounting and Taxation Courses Online | ICA Edu Skills' }}</title>
    <meta name="description" content="{{ isset($contentMain->meta_description)?$contentMain->meta_description:'Best Accounting and Taxation courses Online by India’s No. 1 Vocational Training Institute. Courses with Triple Certification & 100% Placement Support.' }}" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="{{url()->current()}}"/>
    <meta name="author" content="MyIdcm">
    <meta property="og:locale" content="en_IN" />
	<meta name="p:domain_verify" content="2757c24fbba370f3d146a24c9c17d66a"/>
	<meta name="google-site-verification" content="37KdQ39QcywGtqdFHMds0Q9LCbypRJICjnGKONQbLqU" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="Accounting and Taxation Courses Online | ICA Edu Skills">
    <meta property="og:locale" content="en_IN" />
    <meta property="og:site_name" content="Institute of Digital & Content Marketing" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ isset($contentMain->title)?$contentMain->title:'Accounting and Taxation Courses Online | ICA Edu Skills' }}" />
    <meta property="og:description" content="{{ isset($contentMain->meta_description)?$contentMain->meta_description:'Best Accounting and Taxation courses Online by India’s No. 1 Vocational Training Institute. Courses with Triple Certification & 100% Placement Support.' }}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@IDCM_dmtraining" />
    <meta name="twitter:title" content="{{ isset($contentMain->title)?$contentMain->title:'Accounting and Taxation Courses Online | ICA Edu Skills' }}" />
    <meta name="twitter:description" content="{{ isset($contentMain->meta_description)?$contentMain->meta_description:'Best Accounting and Taxation courses Online by India’s No. 1 Vocational Training Institute. Courses with Triple Certification Best Accounting and Taxation courses Online by India’s No. 1 Vocational Training Institute. Courses with Triple Certification & 100% Placement Support. 100% Placement Support.' }}" />
    <meta name="twitter:creator" content="@IDCM_dmtraining" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="admin" />
    <meta name="twitter:label2" content="Est. reading time" />
    <meta name="twitter:data2" content="2 minute" />
    
    <!-- Fonts and Styles -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.10.2/video-js.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('assets/frontend/css/plugins/slick.css') }}" rel="stylesheet">
    <link href="{{ url('assets/frontend/css/plugins/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ url('assets/frontend/css/plugins/animate.css') }}" rel="stylesheet">
    <link href="{{ url('assets/frontend/fonts/flaticon/flaticon.css') }}" rel="stylesheet">
    <link href="{{ url('assets/frontend/fonts/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('assets/frontend/css/responsive.css') }}" rel="stylesheet">

    @yield('style')    
    @if(isset($contentMain->schema) && $contentMain->schema != "null")
        {!! $contentMain->schema !!}
    @else
    {!! get_theme_setting('schema') !!}
    @endif
    <script>
        let popUp = 1
	</script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://web.archive.org/web/20250514003503if_/https://www.googletagmanager.com/ns.html?id=GTM-TR496XN" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) --> 
    <!-- <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div> -->

    <!-- <div class="preloader">
        <div class="preloader__image" style="background-image: url(/assets/frontend/images/idcm-loader.gif);"></div>
    </div> -->
    <!-- /.preloader -->
    <div class="page-wrapper">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
        <div id="lead-generate-popup" class="white-popup mfp-hide">
            @include('common.leadCaptureForm')
        </div>
        
        <script>
            let globalUrl = "{{ env("APP_URL") }}"
            let isEnableOtp = {{ (get_theme_setting('enable_otp') == "1")?get_theme_setting('enable_otp'):$contentMain->enable_otp }}
            let isAjaxSubmit = "{{ get_theme_setting('ajax_submit') }}"
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
        <script src="{{ url('assets/frontend/js/plugins/jquery-3.6.0.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/HichemTab-tech/OTP-designer-jquery@2.0.1/dist/otpdesigner.min.js"></script>
        <script src="{{ url('assets/frontend/js/plugins/slick.min.js') }}"></script>
        <script src="{{ url('assets/frontend/js/plugins/imagesloaded.min.js') }}"></script>
        <script src="{{ url('assets/frontend/js/plugins/isotope.pkgd.min.js') }}"></script>
        <script src="{{ url('assets/frontend/js/plugins/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ url('assets/frontend/js/plugins/jquery.counterup.min.js') }}"></script>
        <script src="{{ url('assets/frontend/js/plugins/jquery.inview.min.js') }}"></script>
        <script src="{{ url('assets/frontend/js/plugins/jquery.easypiechart.js') }}"></script>
        <script src="{{ url('assets/frontend/js/plugins/jquery.countdown.min.js') }}"></script>
        <script src="{{ url('assets/frontend/js/plugins/wow.min.js') }}"></script>
        <script src="{{ url('assets/frontend/js/plugins/jquery.validate.min.js') }}"></script>
        <script src="{{ url('assets/frontend/js/custom.js') }}"></script>
        <script src="{{ url('assets/frontend/js/functions.js') }}"></script>
    </div>
</body>

</html>