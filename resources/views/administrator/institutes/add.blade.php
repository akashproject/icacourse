@extends('administrator.layouts.admin')

@section('content')
<div class="col-12">
	<div class="card">
		<form class="form-horizontal" method="post" action="{{ route('admin-save-institute') }}" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
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
						<div class="form-group row mb-2">
							<label for="name" class="col-sm-3 text-right control-label col-form-label">Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name Here" >
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="slug" class="col-sm-3 text-right control-label col-form-label">Slug</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="slug" id="slug" placeholder="Slug Here" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="excerpt" class="col-sm-3 text-right control-label col-form-label">Excerpt</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="excerpt"  id="mceEditor" placeholder="Enter excerpt Here" ></textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="description"  id="mceEditor" placeholder="Enter description Here" ></textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="highlights" class="col-sm-3 text-right control-label col-form-label">Center highlights</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="highlights" id="mceEditor" placeholder="Enter Highlights" ></textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="courses" class="col-sm-3 text-right control-label col-form-label">Courses</label>
							<div class="col-sm-9">
								<select name="courses[]" id="courses" class="select2 form-control custom-select" style="width: 100%; height:136px;" multiple>	
									<option value="">Select Courses</option>
									@foreach($courses as $course)
									<option value="{{ $course->id }}"  >{{ $course->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="email" class="col-sm-3 text-right control-label col-form-label">Center Email</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="email" id="email" placeholder="Email Address Here" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="mobile" class="col-sm-3 text-right control-label col-form-label">Center Mobile</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Center Mobile No Here" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="whatsapp" class="col-sm-3 text-right control-label col-form-label">Center WhatsApp</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="Enter Center WhatsApp No Here" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="address" class="col-sm-3 text-right control-label col-form-label">Address</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="address" id="address" placeholder="Enter Gmap Location Code" ></textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="gmap_location" class="col-sm-3 text-right control-label col-form-label">Gmap Location</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="gmap_location" id="gmap_location" placeholder="Enter Gmap Location Code" ></textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="lat" class="col-sm-3 text-right control-label col-form-label">Lattitude</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="lat" id="lat" placeholder="Enter Name Here" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="lng" class="col-sm-3 text-right control-label col-form-label">Longitude</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="lng" id="lng" placeholder="Slug Here" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="institute_pincode" class="col-sm-3 text-right control-label col-form-label">Center's Pincode</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" name="institute_pincode" id="institute_pincode" placeholder="Enter Center Pincode Here" value="" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="pincode" class="col-sm-3 text-right control-label col-form-label">Pincode</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="pincode" id="pincode" placeholder="Enter Teretorry Pincode Here" ></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group row mb-2">
							<label for="state" class="col-sm-3 text-right control-label col-form-label">Select State</label>
							<div class="col-sm-9">
								<select name="state_id" id="state_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" onChange="getCitiesByStateId(this);">	
									<option value="">Select State</option>
									@foreach ($states as $value)
									<option value="{{ $value->id }}" > {{ $value->name }} </option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="state" class="col-sm-3 text-right control-label col-form-label">Select City</label>
							<div class="col-sm-9">
								<select name="city_id" id="city_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Select City</option>
								</select>
							</div>
						</div>		
									
						<div class="form-group row mb-2">
							<label for="state" class="col-sm-3 text-right control-label col-form-label">Enable OTP</label>
							<div class="col-sm-9">
								<select name="enable_otp" id="enable_otp" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Enable Otp</option>
									<option value="1" > Yes</option>
									<option value="0" > No </option>
								</select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="state" class="col-sm-3 text-right control-label col-form-label">Status</label>
							<div class="col-sm-9">
								<select name="status" id="status" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Update Status</option>
									<option value="1" > Publish</option>
									<option value="0" > Private </option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<h4 class="card-title"> FAQ Options </h4>
				<div class="row">
					<div class="col-md-7" >
						<div class="form-group row mb-2">
							<label for="title" class="col-sm-3 text-right control-label col-form-label">Select Questions</label>
							<div class="col-sm-9">
								<select class="form-control" multiple style="height:300px" name="faqs[]">
									@foreach(getAllFaqs() as $key => $value)
									<option value="{{ $value->id }}" > {{ $value->question }} </option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
				<h4 class="card-title"> Search Engine Options </h4>
				<div class="row">
					<div class="col-md-7" >
						<div class="form-group row mb-2">
							<label for="title" class="col-sm-3 text-right control-label col-form-label">Title</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" id="title" placeholder="Title Here" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="meta_description" class="col-sm-3 text-right control-label col-form-label">Meta Description</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description Here" ></textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="schema" class="col-sm-3 text-right control-label col-form-label">Schema Code</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="schema" id="schema" placeholder="Enter Schema Code" ></textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="utm_campaign" class="col-sm-3 text-right control-label col-form-label">Campaign</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="utm_campaign" id="utm_campaign" placeholder="Enter Utm Campaign Here" >
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="utm_source" class="col-sm-3 text-right control-label col-form-label">Source</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="utm_source" id="utm_source" placeholder="Enter Utm Source Here" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="robots" class="col-sm-3 text-right control-label col-form-label">Robots Content</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" name="robots" id="robots" placeholder="Enter Center Pincode Here" >
							</div>
						</div>
					</div>
					<div class="col-md-5" >

					</div>
				</div>
			</div>

			<div class="border-top">

				<div class="card-body">

					<button type="submit" class="btn btn-primary">Submit</button>
					<input type="hidden" name="institute_id" id="institute_id" value="" >
				</div>

			</div>

		</form>

	</div>
</div>              

@endsection

@section('script')

<!-- ============================================================== -->

<!-- CHARTS -->

@endsection

