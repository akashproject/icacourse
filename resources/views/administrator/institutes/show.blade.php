@extends('administrator.layouts.admin')

@section('content')
<div class="col-12">
	<div class="card">
		<form class="form-horizontal" method="post" action="{{ url('administrator/save-institute') }}" enctype="multipart/form-data">
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
				<div class="row mb-2">
					<div class="col-md-7" >
						<div class="form-group row mb-2">
							<label for="name" class="col-sm-3 text-right control-label col-form-label">Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="name" id="name" placeholder="Name Here"  value="{{ $institute->name }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="slug" class="col-sm-3 text-right control-label col-form-label">Slug</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="slug" id="slug" placeholder="Slug Here"  value="{{ $institute->slug }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="excerpt" class="col-sm-3 text-right control-label col-form-label">Excerpt</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="excerpt"  id="excerpt" placeholder="Enter excerpt Here" >{{ $institute->excerpt }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="description" id="description" placeholder="Enter description Here" >{{ $institute->description }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="highlights" class="col-sm-3 text-right control-label col-form-label">Course highlights</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="highlights" id="highlights" placeholder="Enter Highlights" >{{ $institute->highlights }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="courses" class="col-sm-3 text-right control-label col-form-label">Courses</label>
							<div class="col-sm-9">
								<select name="courses[]" id="courses" class="select2 form-control custom-select" style="width: 100%; height:136px;" multiple>	
									<option value="">Select Courses</option>
									@foreach(get_courses() as $course)
									<option value="{{ $course->id }}" {{ (in_array($course->id,  json_decode($institute->courses)))?'selected' : '' }} >{{ $course->name }}</option>
									@endforeach
								<select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="email" class="col-sm-3 text-right control-label col-form-label">Institute Email</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="email" id="email" placeholder="Email Address Here" value="{{ $institute->email }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="mobile" class="col-sm-3 text-right control-label col-form-label">Institute Mobile</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Institute Mobile No Here" value="{{ $institute->mobile }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="whatsapp" class="col-sm-3 text-right control-label col-form-label">Institute WhatsApp</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="Enter Institute WhatsApp No Here" value="{{ $institute->whatsapp }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="address" class="col-sm-3 text-right control-label col-form-label">Address</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="address" id="address" placeholder="Enter Address Here" >{{ $institute->address }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="gmap_location" class="col-sm-3 text-right control-label col-form-label">Gmap Location</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="gmap_location" id="gmap_location" placeholder="Enter Gmap Location Code" >{{ $institute->gmap_location }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="review_widget" class="col-sm-3 text-right control-label col-form-label">Review Widget</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="review_widget" id="review_widget" placeholder="Enter Gmap Location Code" >{{ $institute->review_widget }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="lat" class="col-sm-3 text-right control-label col-form-label">Lattitude</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="lat" id="lat" placeholder="Enter Lattitude Here" value="{{ $institute->lat }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="lng" class="col-sm-3 text-right control-label col-form-label">Longitude</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="lng" id="lng" placeholder="Enter Longitude Here"  value="{{ $institute->lng }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="institute_pincode" class="col-sm-3 text-right control-label col-form-label">Institute's Pincode</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" name="institute_pincode" id="institute_pincode" placeholder="Enter Institute Pincode Here" value="{{ $institute->institute_pincode }}" >
							</div>
						</div>
						
					</div>
					<div class="col-md-5">
						<div class="form-group row mb-2">
							<label for="state" class="col-sm-3 text-right control-label col-form-label">Select State</label>
							<div class="col-sm-9">
								<select name="state_id" id="state_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" onChange="getCitiesByStateId(this);" >	
									<option value="">Select State</option>
									@foreach (getStates() as $value)
									<option value="{{ $value->id }}" {{ ( $institute->state_id ==  $value->id )? 'selected' : '' }} > {{ $value->name }} </option>
									@endforeach
								<select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="state" class="col-sm-3 text-right control-label col-form-label">Select City</label>
							<div class="col-sm-9">
								<select name="city_id" id="city_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Select City</option>
									@foreach ($cities as $value)
									<option value="{{ $value->id }}" {{ ( $institute->city_id ==  $value->id )? 'selected' : '' }} > {{ $value->name }} </option>
									@endforeach
								<select>
							</div>
						</div>	
										
						<div class="form-group row mb-2">
							<label for="state" class="col-sm-3 text-right control-label col-form-label">Enable OTP</label>
							<div class="col-sm-9">
								<select name="enable_otp" id="enable_otp" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Enable Otp</option>
									<option value="1" {{ ( $institute->enable_otp ==  '1' )? 'selected' : '' }}> Yes</option>
									<option value="0" {{ ( $institute->enable_otp ==  '0' )? 'selected' : '' }}> No </option>
								<select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="state" class="col-sm-3 text-right control-label col-form-label">Status</label>
							<div class="col-sm-9">
								<select name="status" id="status" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Update Status</option>
									<option value="1" {{ ( $institute->status ==  '1' )? 'selected' : '' }} > Publish</option>
									<option value="0" {{ ( $institute->status ==  '0' )? 'selected' : '' }}> Private </option>
								<select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="tags" class="col-md-4 text-left control-label col-form-label">Featured Image</label>
							<div class="col-sm-8 text-institute">
								<a href="#imageBox" class="image-profile open-popup-link">
									<img src="{{ (isset($institute->featured_image))?getSizedImage('',$institute->featured_image):'https://dummyimage.com/250x250?text=Add%20Image' }}" alt="" style="width:100%">
									<input type="hidden" name="featured_image" id="featured_image" value="{{ $institute->featured_image }}" >	
								</a>	
								@if(isset($institute->featured_image))
									<a href="javascript:void(0)" class="removeImage" style="color: #c90f0f;font-weight: 600;"> Remove Image </a>	
								@endif					
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="tags" class="col-md-4 text-left control-label col-form-label">Banner Image</label>
							<div class="col-sm-8 text-institute">
								<a href="#imageBox" class="image-profile open-popup-link">
									<img src="{{ (isset($institute->banner_image))?getSizedImage('',$institute->banner_image):'https://dummyimage.com/250x250?text=Add%20Image' }}" alt="" style="width:100%">
									<input type="hidden" name="banner_image" id="banner_image" value="{{ $institute->banner_image }}" >	
								</a>	
								@if(isset($institute->banner_image))
									<a href="javascript:void(0)" class="removeImage" style="color: #c90f0f;font-weight: 600;"> Remove Image </a>	
								@endif					
							</div>
						</div>
					</div>

				</div>
				<h4 class="card-title"> FAQ Options </h4>
				<div class="row mb-2">
					<div class="col-md-7" >
						<div class="form-group row mb-2">
							<label for="title" class="col-sm-6 text-left control-label col-form-label">Select Questions</label>
							<div class="col-sm-12">
								<select name="faqs[]" class="form-control" multiple style="height:300px" >
									@foreach(getAllFaqs() as $key => $faq)
									<option value="{{ $faq->id }}" {{ (in_array($faq->id,  json_decode($institute->faqs)))?'selected' : '' }} >{{$key+1}}. {{ $faq->question }} </option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
				<h4 class="card-title"> Search Engine Options </h4>
				<div class="row mb-2">
					<div class="col-md-7" >
						<div class="form-group row mb-2">
							<label for="title" class="col-sm-3 text-right control-label col-form-label">Title</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" id="title" placeholder="Title Here" value="{{ $institute->title }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="meta_description" class="col-sm-3 text-right control-label col-form-label">Meta Description</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description Here" >{{ $institute->meta_description }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="schema" class="col-sm-3 text-right control-label col-form-label">Schema Code</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="schema" id="schema" placeholder="Enter Schema Code" >{{ $institute->schema }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="utm_campaign" class="col-sm-3 text-right control-label col-form-label">Campaign</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="utm_campaign" id="utm_campaign" placeholder="Enter Utm Campaign Here" value="{{ $institute->utm_campaign }}">
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="utm_source" class="col-sm-3 text-right control-label col-form-label">Source</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="utm_source" id="utm_source" placeholder="Enter Utm Source Here"  value="{{ $institute->utm_source }}">
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="robots" class="col-sm-3 text-right control-label col-form-label">Robots Content</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" name="robots" id="robots" placeholder="Enter Robots Content Here" value="{{ $institute->robots }}" >
							</div>
						</div>
					</div>
					
				</div>
			</div>

			<div class="border-top">
				<div class="card-body">
					<button type="submit" class="btn btn-primary">Submit</button>
					<input type="hidden" name="institute_id" id="institute_id" value="{{ $institute->id }}" >
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

