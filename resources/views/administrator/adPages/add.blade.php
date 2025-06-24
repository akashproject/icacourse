@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	<div class="card">
		<form class="form-horizontal" method="post" action="{{ url('administrator/save-ad-page') }}" enctype="multipart/form-data">
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
								<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name Here" required>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="slug" class="col-sm-3 text-right control-label col-form-label">Slug</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="slug" id="slug" placeholder="Slug Here" required>
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="description" id="description" placeholder="Enter description Here" ></textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="email" id="email" placeholder="Enter Email Here" required>
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="mobile" class="col-sm-3 text-right control-label col-form-label">Mobile</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Here" required>
							</div>
						</div>
					</div>

					<div class="col-md-5">	
						<div class="form-group row mb-2">
							<label for="course_id" class="col-sm-3 text-right control-label col-form-label">Course</label>
							<div class="col-sm-9">
								<select name="course_id[]" id="course_id" class="select2 form-control custom-select" multiple>	
									<option value="">Select Course</option>
									@foreach($courses as $course)
									<option value="{{ $course->id }}" >{{ $course->name }}</option>
									@endforeach
								<select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="institute_id" class="col-sm-3 text-right control-label col-form-label">Institute</label>
							<div class="col-sm-9">
								<select name="institute_id[]" id="institute_id" class="select2 form-control custom-select" >	
									<option value="">Select Institute</option>
									@foreach($institutes as $institute)
									<option value="{{ $institute->id }}" >{{ $institute->name }}</option>
									@endforeach
								<select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="template" class="col-sm-3 text-right control-label col-form-label">Template</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="template" id="template" placeholder="Template Here" required>
							</div>
						</div>								

						<div class="form-group row mb-2">
							<label for="enable_otp" class="col-sm-3 text-right control-label col-form-label">Enable OTP</label>
							<div class="col-sm-9">
								<select name="enable_otp" id="enable_otp" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>	
									<option value="">Enable Otp</option>
									<option value="1" > Yes</option>
									<option value="0" > No </option>
								<select>
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="store_area" class="col-sm-3 text-right control-label col-form-label">Capture to CRM</label>
							<div class="col-sm-9">
								<select name="store_area" id="store_area" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>	
									<option value="">Select One</option>
									<option value="1" > Yes</option>
									<option value="0" > No </option>
								<select>
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="state" class="col-sm-3 text-right control-label col-form-label">Status</label>
							<div class="col-sm-9">
								<select name="status" id="status" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Update Status</option>
									<option value="1" > Publish</option>
									<option value="0" > Private </option>
								<select>
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="tags" class="col-md-4 text-left control-label col-form-label">Banner Image</label>
							<div class="col-sm-8 text-page">
								<a href="#imageBox" class="image-profile open-popup-link">
									<img src="https://dummyimage.com/150x150?text=Add%20Image" alt="" style="width:100%">
									<input type="hidden" name="banner_image" id="banner_image" value="" >	
								</a>			
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
									<option value="{{ $value->id }}" >{{$key+=1}}. {{ $value->question }} </option>
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
							<label for="lead_type" class="col-sm-3 text-right control-label col-form-label">Communication Medium</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="lead_type" id="lead_type" placeholder="Enter Utm Campaign Here" >
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="robots" class="col-sm-3 text-right control-label col-form-label">Robots Content</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" name="robots" id="robots" placeholder="Enter Ad Page Pincode Here" >
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
					<input type="hidden" name="adPage_id" id="adPage_id" value="" >
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