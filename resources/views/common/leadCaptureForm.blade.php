<div class="leadModel lead-capture_popup__form contact-form-validated form-one" >
    <div class="row">
        <div class="col-md-7">
            <div class="leadModelHeader">
                <div class="headerLogo">
                    <a class="td_site_branding td_accent_color" href="{{ url('/') }}">
                        <img src="{{ url('assets/logo/logo.png') }}" class="width-100">                         
                    </a> 
                </div>
            </div>
            <div class="leadModelBody">
                <div class="">
                    <a >Contact Details</a>
                </div>
                <form id="leadCaptureForm" class="" action="{{ route('capture-lead')}}" method="post" >
                    @csrf
                    @include('common.leadCaptureFormField')
                </form>
            </div>
        </div>
        <div class="col-md-5 position-relative form-right">
            <div class="modelSideBanner">
                <img src="{{ url('assets/frontend/images/right-obj.png') }}" alt="" class="right-object">
                <img src="{{ url('assets/frontend/images/right-obj.png') }}" alt="" class="bottom-object">
                <div class="sec-title sec-title--center wow fadeInUp mb-3 mt-5" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <!-- <h3 class="sec-title__title text-center pe-lg-4" style="font-size:22px"><span>Placed </span> <span class="sec-title__title__shape">Students</span><span class="sec-title__title__text"> Story</span></h3> -->
                </div>
                <img src="{{ url('assets/frontend/images/stycky-pin.png') }}" alt="" class="img-fluid stycky-pin">
                <div class="right-card">    
                    <h2>Still Thinking? Seats Are Filling Fast!</h2>
                    <img src="{{ url('assets/frontend/images/girl-2.jpg') }}" alt="" class="img-fluid right-profile mb-4">
                    <p>You’ve seen the opportunity, now grab it! Get job-ready skills with ICA’s expert-led, practical training — anytime, anywhere..</p>
                </div>
            </div>
        </div>
    </div>
</div>
