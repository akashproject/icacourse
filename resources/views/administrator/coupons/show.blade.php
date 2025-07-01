@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	<div class="card">
		<form class="form-horizontal" method="post" action="{{ url('administrator/save-coupon') }}" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
				<h4 class="card-title"> General Options </h4>
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				@if(session()->has('message'))
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
				@endif

				<div class="row">
					<div class="col-md-7" >
						<div class="mb-3 row">
							<label for="code" class="col-sm-3 control-label col-form-label">Code</label>
							<div class="col-md-9">
								<input name="code" class="form-control" type="text" id="code" value="{{ $coupon->code }}" placeholder="Enter Coupon Code Here" >
							</div>
						</div>
						<div class="mb-3 row">
							<label for="discount" class="col-sm-3 control-label col-form-label">Discount</label>
							<div class="col-md-9">
								<input name="discount" class="form-control" type="number" id="discount" value="{{ $coupon->discount }}" placeholder="Enter Discount Here" >
							</div>
						</div>
						<div class="mb-3 row">
							<label for="discount" class="col-sm-3 control-label col-form-label">Discount Type</label>
							<div class="col-md-9">
								<select name="discount_type" id="discount_type" class="select2 form-control custom-select">	
									<option value="">Enter Discount Type</option>
									<option value="0" {{ ( $coupon->discount_type ==  '0' )? 'selected' : '' }}>Flat ₹</option>
									<option value="1" {{ ( $coupon->discount_type ==  '1' )? 'selected' : '' }}>Percentage %</option>
								</select>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="message" class="col-sm-3 control-label col-form-label">Message</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="message"  id="message" placeholder="Enter Message Here" value="{{ $coupon->message }}">
							</div>
						</div>
						<div class="mb-3 row">
							<label for="number_of_use" class="col-sm-3 control-label col-form-label">Number of Use</label>
							<div class="col-md-9">
								<input name="number_of_use" class="form-control" type="number" id="number_of_use" value="{{ $coupon->number_of_use }}" placeholder="Enter Number of Use Here" >
							</div>
						</div>
						<div class="mb-3 row">
							<label for="expire_date" class="col-sm-3 control-label col-form-label">Expire Date</label>
							<div class="col-md-9">
								<input name="expire_date" class="form-control" type="text" id="expire_date" value="{{ $coupon->expire_date }}" placeholder="Enter Discount Here" >
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="mb-2 row">
							<label for="state" class="col-sm-3 text-left control-label col-form-label">Status</label>
							<div class="col-sm-9">
								<select name="status" id="status" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Update Status</option>
									<option value="1" {{ ( $coupon->status ==  '1' )? 'selected' : '' }} > Publish</option>
									<option value="0" {{ ( $coupon->status ==  '0' )? 'selected' : '' }}> Private </option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="border-top">
				<div class="card-body">
					<button type="submit" class="btn btn-primary">Submit</button>
					<input type="hidden" name="coupon_id" id="coupon_id" value="{{ $coupon->id }}" >
				</div>
			</div>
		</form>
	</div>
</div>              
@endsection
@section('script')
@endsection



