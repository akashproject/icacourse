<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 aos-init" data-aos="fade-up" data-aos-delay="">
                <h3 class="title">Explore the Best <span class="curve-text"> Accounting Training Programs</span></h3>
            </div>
            <div class="col-md-4 text-right">
                <a href="{{ route('page-view','online-accounting-courses') }}" target="_blank" class="thm-btn bg-thm-color-two thm-color-two-shadow mr-4 mb-4">View All <i class="fal fa-chevron-right ml-2"></i></a>
            </div>
        </div>
        <div class="course_slider">
            @foreach(get_courses(1) as $course)
                <div class="slide-item col-12">
                    <div class="coach_block course-item">
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
            @endforeach
        </div>
    </div>
</section>