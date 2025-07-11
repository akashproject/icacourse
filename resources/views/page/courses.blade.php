@extends('layouts.main')
@section('content')
<div class="subheader relative z-1" style="background-image: url(assets/frontend/images/banner/courses.webp);">
    <div class="container relative z-1">
        <div class="row">
            <div class="col-md-9">
                <div class="page_breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $contentMain->name }}</li>
                        </ol>
                    </nav>
                </div>
                <h1 class="page_title">{{ $contentMain->name }}</h1>
                <div class="page_banner_description text-white">
                    {{ $contentMain->excerpt }}                     
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
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <ul class="nav nav-tabs style_4 mb-3">
                        <li class="nav-item "> 
                            <a href="All" class="nav-link active" >All </a>
                        </li>
                        @foreach(getCourseTypeById() as $key => $category)
                        <li class="nav-item "> 
                            <a href="{{ route('category',$category->slug) }}" class="nav-link" >{{$category->name}} </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Box Start -->
            @foreach(get_courses() as $course)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="coach_block">
                    <div class="coach_hover_tooltip"> 
                        <h4> {{ $course->name }} </h4>
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
                            <a href="{{ route('view-courses',$course->slug) }}" class="btn btn-small thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle"> Know More </a>
                        </div>
                    </div>
                    <div class="coach_img">
                        <a href="{{ route('view-courses',$course->slug) }}" class="">
                            <img src="{{ url('/assets/frontend/images/course/'.$course->slug.'.webp') }}" alt="Image" class="">
                        </a>
                    </div>
                    <div class="coach_caption">
                        <div class="course_tag text-white">
                            <span class="tag bg-green px-3 py-1"><i class="fal fa-book"></i> {{ $course->no_of_module }} Modules</span>
                            <span class="tag bg-orange px-3 py-1"><i class="fal fa-clock"></i> {{ $course->duration }}</span>
                        </div>

                        <h5><a href="{{ route('view-courses',$course->slug) }}"> {{ $course->name }} </a></h5>
                        <div class="course_tag">
                            <div class="total-rating">
                                <div class="ratings " style="display: inline;margin: 0 6px;">
                                    <i class="fal fa-star active"></i>
                                    <i class="fal fa-star active"></i>
                                    <i class="fal fa-star active"></i>
                                    <i class="fal fa-star active"></i>
                                    <i class="fal fa-star active"></i>
                                </div>
                                ({{ $course->number_of_rating }}) Ratings
                            </div>
                        </div>
                        <div class="coach_meta">
                            <div class="price_wrap"> 
                                <div class="sell_price">
                                    ₹{{ number_format($course->price) }}/-
                                </div>
                            </div>
                        </div>

                        <div class="author mt-3">
                            <form method="post" id="add_course_to_cart_{{ $course->id }}" class="add_course_to_cart" data-id="{{ $course->id }}">
                                @csrf
                                <input type="hidden" name="course_fee_id" value="{{ getOneTimePayFee($course->erp_course_id)->FeeID }}" >
                                <input type="hidden" name="course_id" value="{{ $course->id }}" >
                                @php    
                                    $props = (array_key_exists($course->id, $cartItems))?"disabled":""
                                @endphp
                                <button type="submit" class="{{$props}} add_to_cart_btn_{{ $course->id }} btn btn-small thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle" {{$props}}> 
                                    <i class="fal fa-shopping-bag mx-3"></i> {{ ($props == "disabled")?"Added to cart":"Add to cart"; }}
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