@extends('layouts.main')
@section('content')

<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="check-icon label-success text-white"><i class="fal fa-check"></i></div>
                <h3 class="title mb-1" style="font-size:43px;font-weight: 800;">Thank You. Payment Successful</h3>
                <h5 class="sub-title"> Payment receipt has been sent to your email </h5>
                <p> 
                    We welcome you as an ICAian. Wish you all the best for your Career.    </br> 
                    For further assistance, Please Email - <a href="mailto:crm@icagroup.in">crm@icagroup.in</a> or Call - <a href="tel:1800-345-8000"> 1800-345-8000 </a>  </br>
                    Automatically redirecting after 10 sec... or Click <a href="{{ url('/') }}" > Here</a> to go Home page </a>
                </p>
            </div>
        </div>
    </div>
</section>

@endsection