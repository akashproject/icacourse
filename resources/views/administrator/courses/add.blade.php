@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	<div class="card">
		<form class="form-horizontal" method="post" action="{{ route('admin-save-course') }}" enctype="multipart/form-data">
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
					<div class="col-md-8" >
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
							<label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="description"  id="description" placeholder="Enter description Here" ></textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="excerpt" class="col-sm-3 text-right control-label col-form-label">Exerpt</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="excerpt" id="excerpt" placeholder="Enter excerpt Here" ></textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="video_title" class="col-sm-3 text-right control-label col-form-label">Video Title</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="video_title" id="video_title" placeholder="Enter Video Title Here" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="video_link" class="col-sm-3 text-right control-label col-form-label">Video Link</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="video_link" id="video_link" placeholder="Enter Video Title Here" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="offer_price" class="col-sm-3 text-right control-label col-form-label">Offer Price</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="offer_price" id="offer_price" placeholder="Enter Course Duration" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="price" class="col-sm-3 text-right control-label col-form-label">Price</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="price" id="price" placeholder="Enter Course Duration" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="no_of_module" class="col-sm-3 text-right control-label col-form-label">No Of Module</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="no_of_module" id="no_of_module" placeholder="Enter No Of Module" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="number_of_enrolled" class="col-sm-3 text-right control-label col-form-label">No Of Enrolled</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="number_of_enrolled" id="number_of_enrolled" placeholder="Enter No Of Module" value="" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="number_of_rating" class="col-sm-3 text-right control-label col-form-label">No Of Rating</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="number_of_rating" id="number_of_rating" placeholder="Enter No Of Module" value="" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="highlights" class="col-sm-3 text-right control-label col-form-label">Course highlights</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="highlights" id="highlights" placeholder="Enter Highlights" ></textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="criteria" class="col-sm-3 text-right control-label col-form-label">Course criteria</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="criteria" id="criteria" placeholder="Enter Course Criteria" ></textarea>
							</div>
						</div>	
						<div class="form-group row mb-2">
							<label for="feature" class="col-sm-3 text-right control-label col-form-label">Course feature</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="feature" id="feature" placeholder="Enter Course feature" ></textarea>
							</div>
						</div>	
						<div class="form-group row">
							<label for="subjects" class="col-sm-3 text-left control-label col-form-label">Subjects</label>
							<div class="col-sm-9">
								<select name="subjects[]" id="subjects" class="select2 form-control custom-select" style="width: 100%; height:100px;" multiple>	
									@foreach (getSubjects() as $value)
									<option value="{{  $value->id }}" > {{  $value->name }} </option>
									@endforeach
								<select>
							</div>
						</div>		
					</div>
					<div class="col-md-4">
						<div class="form-group row mb-2">
							<label for="type_id" class="col-sm-12 text-left control-label col-form-label">Select Course Type</label>
							<div class="col-sm-12">
								<select name="type_id[]" id="type_id" class="select2 form-control custom-select" style="width: 100%; height:100px;" multiple>	
									<option value="">Select Course Type</option>
									@foreach($courseTypes as $value)
									<option value="{{ $value->id }}">{{ $value->name }}</option>
									@endforeach
								<select>
							</div>
						</div>	
						<div class="form-group row mb-2">
							<label for="state" class="col-sm-12 text-left control-label col-form-label">Enable OTP</label>
							<div class="col-sm-12">
								<select name="enable_otp" id="enable_otp" class="select2 form-control custom-select">	
									<option value="">Enable Otp</option>
									<option value="1" selected> Yes</option>
									<option value="0" > No </option>
								<select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="state" class="col-sm-12 text-left control-label col-form-label">Status</label>
							<div class="col-sm-12">
								<select name="status" id="status" class="select2 form-control custom-select">	
									<option value="">Update Status</option>
									<option value="1" selected> Publish</option>
									<option value="0" > Private </option>
								<select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="tags" class="col-md-6 text-left control-label col-form-label">Featured Image</label>
							<div class="col-sm-6 text-center">
								<a href="#imageBox" class="image-profile open-popup-link">
									<img src="https://dummyimage.com/150x150?text=Add%20Image" alt="">
									<input type="hidden" name="featured_image" id="featured_image" value="" >	
								</a>	
								@if(isset($universityCourse->featured_image))
									<a href="javascript:void(0)" class="removeImage" style="color: #c90f0f;font-weight: 600;"> Remove Image </a>	
								@endif
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="tags" class="col-md-6 text-left control-label col-form-label">Banner Image</label>
							<div class="col-sm-6 text-center">
								<a href="#imageBox" class="image-profile open-popup-link">
									<img src="https://dummyimage.com/150x150?text=Add%20Image" alt="">
									<input type="hidden" name="banner_image" id="banner_image" value="" >	
								</a>	
								@if(isset($universityCourse->banner_image))
									<a href="javascript:void(0)" class="removeImage" style="color: #c90f0f;font-weight: 600;"> Remove Image </a>	
								@endif					
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="course_video_image" class="col-md-6 text-left control-label col-form-label">Video Thumbnail</label>
							<div class="col-sm-6 text-center">
								<a href="#imageBox" class="image-profile open-popup-link">
									<img src="https://dummyimage.com/150x150?text=Add%20Image" alt="">
									<input type="hidden" name="course_video_image" id="course_video_image" value="" >	
								</a>	
								@if(isset($universityCourse->course_video_image))
									<a href="javascript:void(0)" class="removeImage" style="color: #c90f0f;font-weight: 600;"> Remove Image </a>
								@endif					
							</div>
						</div>
					</div>

				</div>
				<h4 class="card-title"> Search Engine Options </h4>
				<div class="row">
					<div class="col-md-8" >
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
								<input type="text" class="form-control" name="utm_campaign" id="utm_campaign" placeholder="Enter Utm Campaign Here" value="Google-Organic" >
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="utm_source" class="col-sm-3 text-right control-label col-form-label">Source</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="utm_source" id="utm_source" placeholder="Enter Utm Source Here"  value="SEO">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="robots" class="col-sm-3 text-right control-label col-form-label">Robots Content</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" name="robots" id="robots" placeholder="Enter Center Pincode Here" value="index, follow">
							</div>
						</div>
					</div>
					<div class="col-md-4" >

					</div>
				</div>
			</div>
			<div class="border-top">
				<div class="card-body">
					<button type="submit" class="btn btn-primary">Submit</button>
					<input type="hidden" name="course_id" id="course_id" value="" >
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



