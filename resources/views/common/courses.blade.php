<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center aos-init" data-aos="fade-up" data-aos-delay="">
                <h3 class="title">Explore the Best Accounting Training Programs</h3>
            </div>
        </div>
        <div class="course_slider">
            @foreach(get_courses(1) as $course)
                <div class="slide-item col-12">
                    <div class="coach_block course-item">
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
            @endforeach
        </div>
    </div>
</section>