@extends('layouts.main')
@section('content')
<div class="subheader relative z-1" style="background-image: url(assets/frontend/images/banner/courses.webp);">
    <div class="container relative z-1">
        <div class="row">
            <div class="col-12">
                <h1 class="page_title">Courses</h1>
                <div class="page_breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Courses</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <img src="assets/frontend/images/elements/element_19.png" alt="element" class="element_1 slideRightTwo">
        <img src="assets/frontend/images/elements/element_10.png" alt="element" class="element_2 zoom-fade">
        <img src="assets/frontend/images/elements/element_20.png" alt="element" class="element_3 rotate_elem">
        <img src="assets/frontend/images/elements/element_21.png" alt="element" class="element_4 rotate_elem">
    </div>
</div>
 <!-- Video Start -->
<section class="section-padding isotope-filter-items">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <p class="subtitle">
                        <i class="fal fa-book"></i>
                        Featured Courses
                    </p>

                    <h3 class="title">Browse the Popular Online Accounting Courses</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="filter-btns mb-5"> 
                <div class="col-lg-12">                    
                    <ul class="m-0 p-0">
                        <li class="active filter-trigger" data-filter="*">
                            <a href="#">All</a>
                        </li>
                        @foreach(getCourseTypeById() as $value)
                        <li class="filter-trigger" data-filter=".{{ $value->slug }}">
                            <a href="javascript:void(0);" >{{$value->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-12 filter-subcategory job-assurance jg-with-tally jg-with-zoho">
                    <ul>
                        <li class="filter-trigger" data-filter=".short-term">
                            <a href="javascript:void(0);" >JG</a>
                        </li>
                        
                    </ul>
                </div>
            </div>  
        </div>
        
        <div class="row filteritems justify-content-center">
            <!-- Box Start -->
            @foreach(get_courses() as $course)
            
            <div class="col-xl-3 col-lg-4 col-md-6 masonry-item .short-term">
                <div class="coach_block">
                    <div class="coach_hover_tooltip"> 
                        <h4> {{ $course->name }} </h4>
                        <div class="course_hover_content" >
                            {{ $course->excerpt }}
                        </div>
                        <div class="course_hover_stat" >
                            <div class="total-rating" >
                                <a href="javascript:void(0)" style="color: #ffbd3f;" > 4.0 </a>
                                <div class="ratings " style="display: inline;margin: 0 6px;">
                                    <i class="fal fa-star active"></i>
                                    <i class="fal fa-star active"></i>
                                    <i class="fal fa-star active"></i>
                                    <i class="fal fa-star active"></i>
                                    <i class="fal fa-star"></i>
                                </div>
                            </div>
                            <p class="course_price" > Course Price : <strong> Rs. {{ $course->price }}/- </strong></p>
                        </div>
                        {!! $course->feature !!}
                        <div class="author text-center">
                            <a href="/course-link" class="btn btn-small thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle"> Know More </a>
                        </div>
                    </div>
                    <div class="best-selling" >
                        <span > Best Selling </span>
                    </div>
                    <div class="fast-selling" >
                        <span > Fast Selling </span>
                    </div>
                    <div class="coach_img">
                        <a href="/" class="">
                            <img src="https://dummyimage.com/300x200" alt="Image" class="">
                        </a>
                    </div>
                    <div class="coach_caption">
                        <div class="coach_meta">
                            <div class="coach_cat thm-color-three-shadow" >
                                <p href="javascript:void(0)" style="text-transform: capitalize;">Type : Short Term </p>
                                <p > Course Duration : 5 Month </p>
                                <p > Delivery Mode : Online </p>
                            </div>
                            <div class="price_wrap text-center"> 
                                <div class="sell_price">
                                    Rs. <?php echo number_format("1000"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="author mt-3">
                            <form method="post" action="#" id="add_course_to_cart_1" class="add_course_to_cart" data-id="1">
                                <input type="hidden" name="course_fee_id" value="1" >
                                <input type="hidden" name="course_id" value="1" >
                                <button type="submit" class=" add_to_cart_btn_1 btn btn-small thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle"> 
                                    <i class="fal fa-shopping-bag mr-3"></i> Add to cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Box End -->
            @endforeach
        </div>
    </div>
</section>
<!-- Video End -->
@endsection