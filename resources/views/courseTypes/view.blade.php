@extends('layouts.main')
@section('content')
<section class="banner-inner">
    <div class="container">
        <div class="inner-left"><img src="{{ url('assets/frontend/images/round-dot.png')}}" alt="" class="img-fluid"></div>
        <div class="inner-right"><img src="{{ url('assets/frontend/images/round-dot.png')}}" alt="" class="img-fluid"></div>
        <div class="inner-top"><img src="{{ url('assets/frontend/images/top.svg')}}" alt="" class="img-fluid"></div>
        <div class="inner-animation"><img src="{{ url('assets/frontend/images/page-header-shape-2.png')}}" alt="" class="img-fluid"></div>
        <div class="inner-bottom"><img src="{{ url('assets/frontend/images/bottom.svg')}}" alt="" class="img-fluid"></div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-4">
                        <div class="page_breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                                    <li class="breadcrumb-item active text-white" aria-current="page">{{ $contentMain->name }}</li>
                                </ol>
                            </nav>
                        </div>
                        <h1 class="page_title">{{ $contentMain->name }}</h1>
                    </div>
                    <div class="col-lg-6">
                        <p class="text-white">
                            {{ $contentMain->excerpt }}                     
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding isotope-filter-items">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="sort_by">
                    <h5> Sort By Category </h5>
                    <div class="form-floating mb-3">
                        <select class="form-control sort_by_category" >
                            <option value="" >All </option>
                            @foreach(getCourseTypeById() as $key => $category)
                                <option value="{{ route('category',$category->slug) }}" {{ ($contentMain->slug == $category->slug) ?"selected":"" }}> {{$category->name}} </option>
                            @endforeach
                        </select>
                        <label for="email">Select Category</label>
                    </div>
                    @if($contentMain->parent_id)
                    <div class="form-floating mb-3">
                        <select class="form-control sort_by_category" >
                            <option value="" >All </option>
                            @foreach(getCourseTypeById($contentMain->parent_id) as $key => $category)
                                <option value="{{ route('category',$category->slug) }}" {{ ($contentMain->slug == $category->slug) ?"selected":"" }}> {{$category->name}} </option>
                            @endforeach
                        </select>
                        <label for="email">Select Category</label>
                    </div>
                    @endif
                    @if(($contentMain->children->count() > 0))
                    <div class="form-floating mb-3">
                        <select class="form-control sort_by_category" >
                            <option value="" > </option>
                            @foreach($contentMain->children as $key => $category)
                                <option value="{{ route('category',$category->slug) }}" > {{$category->name}} </option>
                            @endforeach
                        </select>
                        <label for="email">Select Sub Category</label>
                    </div>
                    @endif
                    <h5> Filter By Field </h5>
                    <div class="form-floating mb-3">
                        <select class="form-control filter_by_tag" >
                            <option value="" >All </option>
                            @foreach(getTags() as $key => $tag)
                                <option value="{{ route('tag',$tag->slug) }}"> {{$tag->name}} </option>
                            @endforeach
                        </select>
                        <label for="email">Select Course</label>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row justify-content-center couse-container">
                    <!-- Box Start -->
                    @foreach($categoryCourses as $course)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="coach_block course-item course_grid">
                            @if(check_device("desktop"))
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
                            @endif
                            <div class="coach_img">
                                <a href="{{ route('view-courses',$course->slug) }}" class="">
                                    <img src="{{ url('/assets/frontend/images/course/'.$course->slug.'.webp') }}" alt="Image" class="">
                                </a>
                            </div>
                            <div class="coach_caption">
                                <div class="course_tag">
                                    <span class="tag py-1"><i class="fal fa-book"></i> {{ $course->no_of_module }} Modules</span>
                                    <span class="tag py-1"><i class="fal fa-clock"></i> {{ $course->duration }}</span>
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
                                <div class="course_price_box">
                                    <div class="coach_meta">
                                        <div class="text-center">
                                            <a href="#lead-generate-popup" class=" btn btn-small talk-to-expert text-white bg-thm-color-two thm-color-two-shadow btn-rectangle open-popup-link"><i class="fal fa-download"></i> Get Brochure </a>
                                        </div>
                                    </div>

                                    <div class="author">
                                        <form method="post" id="add_course_to_cart_{{ $course->id }}" class="add_course_to_cart" data-id="{{ $course->id }}">
                                            @csrf
                                            <input type="hidden" name="course_fee_id" value="{{ getOneTimePayFee($course->erp_course_id)->FeeID }}" >
                                            <input type="hidden" name="course_id" value="{{ $course->id }}" >
                                            @php    
                                                $props = (array_key_exists($course->id, $cartItems))?"disabled":""
                                            @endphp
                                            <button type="submit" class="{{$props}} add_to_cart_btn_{{ $course->id }} btn btn-small add-to-cart text-white bg-thm-color-two thm-color-two-shadow btn-rectangle" {{$props}}> 
                                                <i class="fal fa-shopping-bag"></i> {{ ($props == "disabled")?"Added to cart":"Add to cart"; }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Box End -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection