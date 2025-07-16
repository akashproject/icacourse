@extends('layouts.main')
@section('content')

<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="check-icon label-failed text-white"><i class="fal fa-times"></i></div>
                <h3 class="title mb-1" style="font-size:43px;font-weight: 800;">Inconvenience is regretted</h3>
                <h5 class="sub-title"> Your payment has declined. Kindly click to Proceed </h5>
                <p> 
                    <a href="{{ route('website') }}" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle" >Back To Home</a>
                    <a href="{{ route('checkout') }}" class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rectangle" style="margin: 0 17px;">Retry Payment</a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection