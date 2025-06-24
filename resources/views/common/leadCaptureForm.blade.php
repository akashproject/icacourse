<div class="leadModel lead-capture_popup__form contact-form-validated form-one" >
    <div class="row">
        <div class="col-md-7">
            <div class="leadModelHeader">
                <div class="headerLogo">
                    <a class="td_site_branding td_accent_color" href="{{ url('/') }}">
                        <img src="{{ url('assets/logo/logo.gif') }}" class="width-100">                         
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
        <div class="col-md-5 position-relative">
            <div class="modelSideBanner">
                <div class="sec-title sec-title--center wow fadeInUp mb-3 mt-5" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <h3 class="sec-title__title" style="font-size:22px"><span>Placed </span> <span class="sec-title__title__shape">Students</span><span class="sec-title__title__text"> Story</span></h3><!-- /.sec-title__title -->
                </div><!-- /.sec-title -->
                <div class="row justified-content-center">
                    @foreach(getPlacements(1) as $placement)
                        <div class="col-10"> 
                            <div class="placed-student-container placement-featured my-2">
                                <div class="placed-student-content text-white margin-20px-right">
                                    <h6 class="margin-10px-bottom"> <strong>{{$placement->name }}</strong> </h6>
                                    <p> Designation: <strong>{{ $placement->dasignation}}</strong></p>
                                    <p> Placed At: <strong>{{ $placement->placed_at}}</strong></p>
                                </div>
                                <div class="student-image">                     
                                    <img src="{{ getSizedImage($placement->featured_image) }}" alt="{{$placement->name }}" data-no-retina="">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
