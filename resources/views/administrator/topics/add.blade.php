@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	<div class="card">
		<form class="form-horizontal" method="post" action="{{ route('admin-save-topic') }}" enctype="multipart/form-data">
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
				<div class="row mb-5">
					<div class="col-md-7" >
						<div class="mb-3 row">
							<label for="name" class="col-sm-3 control-label col-form-label">Name</label>
							<div class="col-md-9">
								<input name="name" class="form-control" type="text" value="" id="name" placeholder="Enter Page Name Here" >
							</div>
						</div>
						<div class="mb-3 row">
							<label for="duration" class="col-sm-3 control-label col-form-label">Duration</label>
							<div class="col-md-9">
								<input name="duration" class="form-control" type="text" value="" id="name" placeholder="Enter Duration Here" >
							</div>
						</div>
						<div class="form-group row">
							<label for="subject_id" class="col-sm-3 text-left control-label col-form-label">Subjects</label>
							<div class="col-sm-9">
								<select name="subject_id" id="subject_id" class="select2 form-control custom-select">	
									<option value="" > Select Subject </option>
									@foreach (getSubjects() as $value)
									<option value="{{  $value->id }}" > {{  $value->name }} </option>
									@endforeach
								<select>
							</div>
						</div>
					</div>

					<div class="col-md-5">	
						<div class="mb-2 row">
							<label for="state" class="col-sm-3 text-left control-label col-form-label">Status</label>
							<div class="col-sm-9">
								<select name="status" id="status" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Update Status</option>
									<option value="1" selected> Publish</option>
									<option value="0" > Private </option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="border-top">
				<div class="card-body">
					<button type="submit" class="btn btn-primary">Submit</button>
					<input type="hidden" name="topic_id" id="topic_id" value="" >
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



