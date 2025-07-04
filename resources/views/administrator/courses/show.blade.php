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
							<label for="name" class="col-sm-3 control-label col-form-label">Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name Here" value="{{ $course->name }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="slug" class="col-sm-3 control-label col-form-label">Slug</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="slug" id="slug" placeholder="Slug Here" value="{{ $course->slug }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="description" class="col-sm-3 control-label col-form-label">Description</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="description"  id="description" placeholder="Enter description Here" >{{ $course->description }}</textarea>
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="excerpt" class="col-sm-3 control-label col-form-label">Exerpt</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="excerpt" id="excerpt" placeholder="Enter excerpt Here" >{{ $course->excerpt }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="course_video_title" class="col-sm-3 control-label col-form-label">Video Title</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="course_video_title" id="course_video_title" placeholder="Enter Video Title Here" value="{{ $course->course_video_title }}">
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="course_video_link" class="col-sm-3 control-label col-form-label">Video Link</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="course_video_link" id="course_video_link" placeholder="Enter Video Title Here" value="{{ $course->course_video_link }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="display_price" class="col-sm-3 control-label col-form-label">Display Price</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="display_price" id="display_price" placeholder="Enter Course Duration" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="price" class="col-sm-3 control-label col-form-label">Price</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="price" id="price" value="{{ $course->price }}" placeholder="Enter Course Duration" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="duration" class="col-sm-3 control-label col-form-label">Course Duration</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="duration" id="duration" placeholder="Enter Course Duration" value="{{ $course->duration }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="number_of_enrolled" class="col-sm-3 control-label col-form-label">No Of Enrolled</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="number_of_enrolled" id="number_of_enrolled" placeholder="Enter No Of Module" value="{{ $course->number_of_enrolled }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="number_of_rating" class="col-sm-3 control-label col-form-label">No Of Rating</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="number_of_rating" id="number_of_rating" placeholder="Enter No Of Module" value="{{ $course->number_of_rating }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="no_of_module" class="col-sm-3 control-label col-form-label">No Of Module</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="no_of_module" id="no_of_module" placeholder="Enter No Of Module" value="{{ $course->no_of_module }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="highlights" class="col-sm-3 control-label col-form-label">Course highlights</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="highlights" id="highlights" placeholder="Enter Highlights" >{{ $course->highlights }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="criteria" class="col-sm-3 control-label col-form-label">Course criteria</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="criteria" id="criteria" placeholder="Enter Course Criteria" >{{ $course->criteria }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="feature" class="col-sm-3 control-label col-form-label">Course feature</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="feature" id="feature" placeholder="Enter Course Criteria" >{{ $course->feature }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="subjects" class="col-sm-3 text-left control-label col-form-label">Subjects</label>
							<div class="col-sm-9">
								<select name="subjects[]" id="subjects" class="select2 form-control custom-select" style="width: 100%; height:100px;" multiple>	
									@foreach (getSubjects() as $value)
									<option value="{{  $value->id }}" {{ (isset($course->subjects)  && in_array($value->id,  $course->subjects))?'selected' : '' }} > {{  $value->name }} </option>
									@endforeach
								</select>
							</div>
						</div>	
						<div class="form-group row mb-2">
							<label for="faqs" class="col-sm-3 text-left control-label col-form-label">Faqs</label>
							<div class="col-sm-9">
								<select name="faqs[]" id="faqs" class="select2 form-control custom-select" style="width: 100%; height:100px;" multiple>	
									@foreach (getAllFaqs() as $faq)
									<option value="{{ $faq->id }}" {{ ($course->faqs != null && in_array($faq->id,  $course->faqs))?'selected' : '' }}> {{  $faq->question }} </option>
									@endforeach
								</select>
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
									<option value="{{ $value->id }}" {{ (isset($course->type_id)  && in_array($value->id,  json_decode($course->type_id)))?'selected' : '' }}> {{ $value->name }}</option>
									@endforeach
								</select>
							</div>
						</div>	
						<div class="mb-3 row">
							<label for="state" class="col-sm-12 control-label col-form-label">Enable OTP</label>
							<div class="col-sm-12">
								<select name="enable_otp" id="enable_otp" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Enable Otp</option>
									<option value="1" {{ ( $course->enable_otp ==  '1' )? 'selected' : '' }}> Yes</option>
									<option value="0" {{ ( $course->enable_otp ==  '0' )? 'selected' : '' }}> No </option>
								</select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="state" class="col-sm-12 text-left control-label col-form-label">Status</label>
							<div class="col-sm-12">
								<select name="status" id="status" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Update Status</option>
									<option value="1" selected> Publish</option>
									<option value="0" > Private </option>
								</select>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="tags" class="col-md-6 text-left control-label col-form-label">Featured Image</label>
							<div class="col-sm-6 text-center">
								<a href="#imageBox" class="image-profile open-popup-link">
									<img src="https://dummyimage.com/150x150?text=Add%20Image" alt="">
									<input type="hidden" name="featured_image" id="featured_image" value="" >	
								</a>	
								@if(isset($course->featured_image))
									<a href="javascript:void(0)" class="removeImage" style="color: #c90f0f;font-weight: 600;"> Remove Image </a>	
								@endif
							</div>
						</div>
					</div>
				</div>
				<h4 class="card-title"> Blog Options </h4>
				<div class="row">
					<div class="col-md-12" >
						<div class="form-group row">
							<label for="title" class="col-sm-2 text-left control-label col-form-label">Select Blogs</label>
							<div class="col-sm-6">
								<select name="blog[]" class="form-control" multiple style="height:300px" >
									@foreach(getAllBlogs() as $key => $value)
									<option value="{{ $value->id }}" {{ (isset($course->blog)  && in_array($value->id,  json_decode($course->blog)))?'selected' : '' }} >{{$key+1}}. {{ $value->title->rendered }} </option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
				<h4 class="card-title"> Search Engine Options </h4>
				<div class="row">
					<div class="col-md-8" >
						<div class="form-group row mb-2">
							<label for="title" class="col-sm-3 control-label col-form-label">Title</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" id="title" placeholder="Title Here" value="{{ $course->title }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="meta_description" class="col-sm-3 control-label col-form-label">Meta Description</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description Here" >{{ $course->meta_description }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="schema" class="col-sm-3 control-label col-form-label">Schema Code</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="schema" id="schema" placeholder="Enter Schema Code" >{{ $course->schema }}</textarea>
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="utm_campaign" class="col-sm-3 control-label col-form-label">Campaign</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="utm_campaign" id="utm_campaign" placeholder="Enter Utm Campaign Here" value="{{ $course->utm_campaign }}">
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="utm_source" class="col-sm-3 control-label col-form-label">Source</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="utm_source" id="utm_source" placeholder="Enter Utm Source Here"  value="{{ $course->utm_source }}">
							</div>
						</div>

						<div class="form-group row mb-2">
							<label for="robots" class="col-sm-3 control-label col-form-label">Robots Content</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" name="robots" id="robots" placeholder="Enter Center Pincode Here" value="{{ $course->robots }}" >
							</div>
						</div>
						<div class="form-group row mb-2">
							<label for="canonical" class="col-sm-3 control-label col-form-label">Cronical Url</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" name="canonical" id="canonical" placeholder="Enter Center Pincode Here" value="{{ $course->canonical }}">
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="border-top">
				<div class="card-body">
					<button type="submit" class="btn btn-primary">Submit</button>
					<input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}" >
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



