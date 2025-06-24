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
								<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name Here" value="{{ $adPage->name }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="slug" class="col-sm-3 text-right control-label col-form-label">Slug</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="slug" id="slug" placeholder="Slug Here" value="{{ $adPage->slug }}" >
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="description" id="description" placeholder="Enter description Here" >{{ $adPage->description }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="email" id="email" placeholder="Enter Email Here" value="{{ $adPage->email }}">
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="mobile" class="col-sm-3 text-right control-label col-form-label">Mobile</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Here" value="{{ $adPage->mobile }}">
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
									<option value="{{ $course->id }}" {{ ($adPage->course_id != null && in_array($course->id,  json_decode($adPage->course_id)))?'selected' : '' }}>{{ $course->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="institute_id" class="col-sm-3 text-right control-label col-form-label">Institute</label>
							<div class="col-sm-9">
								<select name="institute_id" id="institute_id" class="select2 form-control custom-select" >	
									<option value="">Select Institute</option>
									@foreach($institutes as $institute)
									<option value="{{ $institute->id }}" {{ ( $adPage->institute_id ==  $institute->id )? 'selected' : '' }}>{{ $institute->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="template" class="col-sm-3 text-right control-label col-form-label">Template</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="template" id="template" placeholder="Template Here" value="{{ $adPage->template }}">
							</div>
						</div>								

						<div class="form-group row mb-2">
							<label for="enable_otp" class="col-sm-3 text-right control-label col-form-label">Enable OTP</label>
							<div class="col-sm-9">
								<select name="enable_otp" id="enable_otp" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Enable Otp</option>
									<option value="1" {{ ( $adPage->enable_otp ==  '1' )? 'selected' : '' }}> Yes</option>
									<option value="0" {{ ( $adPage->enable_otp ==  '0' )? 'selected' : '' }}> No </option>
								</select>
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="store_area" class="col-sm-3 text-right control-label col-form-label">Capture to CRM</label>
							<div class="col-sm-9">
								<select name="store_area" id="store_area" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>	
									<option value="">Select One</option>
									<option value="1" {{ ( $adPage->store_area ==  '1' )? 'selected' : '' }}> Yes</option>
									<option value="0" {{ ( $adPage->store_area ==  '0' )? 'selected' : '' }}> No </option>
								<select>
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="state" class="col-sm-3 text-right control-label col-form-label">Status</label>
							<div class="col-sm-9">
								<select name="status" id="status" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Update Status</option>
									<option value="1" {{ ( $adPage->status ==  '1' )? 'selected' : '' }} > Publish</option>
									<option value="0" {{ ( $adPage->status ==  '0' )? 'selected' : '' }}> Private </option>
								</select>
							</div>
						</div>

						<div class="mb-3 row">
							<label for="tags" class="col-md-4 text-left control-label col-form-label">Banner Image</label>
							<div class="col-sm-8 text-page">
								<a href="#imageBox" class="image-profile open-popup-link">
									<img src="{{ (isset($adPage->banner_image))?getSizedImage('',$adPage->banner_image):'https://dummyimage.com/250x250?text=Add%20Image' }}" alt="" style="width:100%">
									<input type="hidden" name="banner_image" id="banner_image" value="{{ $adPage->banner_image }}" >	
								</a>	
								@if(isset($adPage->banner_image))
									<a href="javascript:void(0)" class="removeImage" style="color: #c90f0f;font-weight: 600;"> Remove Image </a>	
								@endif					
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
									@foreach(getAllFaqs() as $key => $faq)
									<option value="{{ $faq->id }}" {{ ($adPage->faqs != null && in_array($faq->id,  json_decode($adPage->faqs)))?'selected' : '' }}>{{$key+=1}}. {{ $faq->question }} </option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
				<h4 class="card-title"> Search Engine Options </h4>
				<div class="row">
					<div class="col-md-7" >
						<div class="mb-3 row">
							<label for="title" class="col-sm-3 text-right control-label col-form-label">Title</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" id="title" placeholder="Title Here" value="{{ $adPage->title }}" >
							</div>

						</div>

						<div class="mb-3 row">
							<label for="meta_description" class="col-sm-3 text-right control-label col-form-label">Meta Description</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description Here" >{{ $adPage->meta_description }}</textarea>
							</div>

						</div>

						<div class="mb-3 row">
							<label for="schema" class="col-sm-3 text-right control-label col-form-label">Schema Code</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="schema" id="schema" placeholder="Enter Schema Code" >{{ $adPage->schema }}</textarea>
							</div>

						</div>

						<div class="mb-3 row">
							<label for="utm_campaign" class="col-sm-3 text-right control-label col-form-label">Campaign</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="utm_campaign" id="utm_campaign" placeholder="Enter Utm Campaign Here" value="{{ $adPage->utm_campaign }}">
							</div>
						</div>

						<div class="mb-3 row">
							<label for="lead_type" class="col-sm-3 text-right control-label col-form-label">Communication Medium</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="lead_type" id="lead_type" placeholder="Enter Utm Campaign Here" value="{{ $adPage->lead_type }}">
							</div>

						</div>

						<div class="mb-3 row">
							<label for="utm_source" class="col-sm-3 text-right control-label col-form-label">Source</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="utm_source" id="utm_source" placeholder="Enter Utm Source Here"  value="{{ $adPage->utm_source }}">
							</div>
						</div>

						<div class="mb-3 row">
							<label for="robots" class="col-sm-3 text-right control-label col-form-label">Robots Content</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" name="robots" id="robots" placeholder="Enter Center Pincode Here" value="{{ $adPage->robots }}" >
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
					<input type="hidden" name="adPage_id" id="adPage_id" value="{{ $adPage->id }}" >
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