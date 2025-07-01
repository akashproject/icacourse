@extends('layouts.main')
@section('content')
<section class="section-padding bg-bluish">
    <div class="container">
        @if(count($cartItems) <= 0)
        <div class="row">
            <div class="col-md-12 text-center">
                <i class="fal fa-cart-plus" style="font-size: 100px;"></i>
                <p class="px-3 py-2">No products added to the cart</p>
                <a href="{{ url('/online-accounting-courses') }}" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle" > Return To Courses</a>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-8">
                <div class="bg-white item-list-section p-3">
                    <h5> {{ count($cartItems) }} items in Cart </h5>
                    <form id="proceed_to_checkout" action="">
                        <div class="row mt-5">
                            <div class="col-md-9">
                                <h6 class="mb-0"> Items </h6>
                            </div>
                            <div class="col-md-3 text-center">
                                <h6 class="mb-0">
                                    Price
                                </h6>
                            </div>
                        </div>
                        <hr>
                        @foreach($cartItems as $key => $item)
                        @php 
                            $course = getCourseById($key);
                        @endphp
                        <div class="cart_item_list">
                            <div class="item_part item_image mr-3">
                                <a href="javascript:void(0)" class="remove_form_cart mr-3" onclick="remove_form_cart({{ $course->id }})"> 
                                    <i class="fa fa-trash" style="color:red"></i> 
                                </a> 
                                <img src="https://www.icacourse.in/wp-content/uploads/2022/01/advanced-excel-course-online.webp" alt="Image" style="border: 1px solid #ccc;padding: 2px;">
                            </div>
                            <div class="item_part item_content mr-2">
                                <div class="item_content_description">
                                    <h6 class="mb-0"><a href="{{ route('view-courses', $course->slug) }}"> 
                                        {{ $course->name }}</a> 
                                    </h6>
                                    <div class="course_hover_stat">
                                        <div class="total-rating">
                                            <a href="javascript:void(0)" style="color: #ffbd3f;"> 4.0 </a>
                                            <div class="ratings " style="display: inline;margin: 0 6px;">
                                                <i class="fal fa-star active"></i>
                                                <i class="fal fa-star active"></i>
                                                <i class="fal fa-star active"></i>
                                                <i class="fal fa-star active"></i>
                                                <i class="fal fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item_content_price">
                                    <h6 class="Course_Fees mb-0"> ₹ {{ getFeeById($item)->Down_Payment}} </h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white item-price-list p-3">
                    <h3> Cart totals </h3>
                    <table class="table table-condensed">                       
                        <tbody>
                            <tr>
                                <th> Total Item 
                                </th><td> <span class="Down_Payment"> {{ count($cartItems) }} </span>  </td>
                            </tr>
                            
                            <tr>
                                <th> Total 
                                </th><td>                                                       
                                    <h6 class="Course_Fees mb-0"> {{ totalCartAmount() }} </h6>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('checkout') }}" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle proceed-to-checkout-btn"> Proceed To Checkout <i class="fal fa-chevron-right ml-2"></i></a>
                    <img src="https://www.icacourse.in/wp-content/themes/scriptcrown/images/loader.gif" style="width: 42px;display:none;" class="checkout_loader">
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection