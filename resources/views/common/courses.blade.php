<section class="section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-12 text-center aos-init" data-aos="fade-up" data-aos-delay="">
                <h3 class="title">Explore the Best Accounting Training Programs</h3>
            </div>
        </div>
        <div class="row">
            @foreach(get_courses(1) as $course)
                <div class="col-xl-3 col-lg-4 col-md-6 course_grid masonry-item @if($course->type_id) @foreach(getTypesByCourseId($course->type_id) as $type) {{$type->slug}} @endforeach @endif">
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
                                <a href="{{ route('view-courses',$course->slug) }}" class="btn btn-small thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle"> Know More </a>
                            </div>
                        </div>
                        <!-- <div class="best-selling" >
                            <span > Best Selling </span>
                        </div>
                        <div class="fast-selling" >
                            <span > Fast Selling </span>
                        </div> -->
                        <div class="coach_img">
                            <a href="{{ route('view-courses',$course->slug) }}" class="">
                                <img src="{{ url('/assets/frontend/images/course/'.$course->slug.'.webp') }}" alt="Image" class="">
                            </a>
                        </div>
                        <div class="coach_caption">
                            <div class="coach_meta">
                                <h5><a href="{{ route('view-courses',$course->slug) }}"> {{ $course->name }} </a></h5>
                                <div class="coach_cat thm-color-three-shadow" >
                                    <p href="javascript:void(0)" style="text-transform: capitalize;">Type : Short Term </p>
                                    <p > Course Duration : 5 Month </p>
                                    <p > Delivery Mode : Online </p>
                                </div>
                            </div>

                            <div class="author mt-3">
                                <form method="post" action="#" id="add_course_to_cart_1" class="add_course_to_cart" data-id="1">
                                    <input type="hidden" name="course_fee_id" value="1" >
                                    <input type="hidden" name="course_id" value="1" >
                                    <button type="submit" class=" add_to_cart_btn_1 btn btn-small thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle"> 
                                        <i class="fal fa-shopping-bag mx-3"></i> Add to cart
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