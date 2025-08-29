<div class="course_slider">
    @foreach(get_courses() as $course)
        <div class="slide-item col-12">
            <div class="coach_block course-item">
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
                                <a href="#lead-generate-popup" class=" btn btn-small talk-to-expert text-white bg-thm-color-two thm-color-two-shadow btn-rectangle open-popup-link"><i class="fal fa-phone"></i> Talk to Expert </a>
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
    @endforeach
</div>