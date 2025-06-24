@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	<div class="card">
		<form class="form-horizontal" method="post" action="{{ url('administrator/save-topic') }}" enctype="multipart/form-data">
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
							<label for="name" class="col-sm-3 control-label col-form-label">Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="name" id="name" placeholder="Name Here"  value="{{ $topic->name }}" >
							</div>
						</div>
						<div class="mb-3 row">
							<label for="duration" class="col-sm-3 control-label col-form-label">Duration</label>
							<div class="col-md-9">
								<input name="duration" class="form-control" type="text" value="{{ $topic->duration }}" id="name" placeholder="Enter Duration Here" >
							</div>
						</div>
					</div>

					<div class="col-md-5">
						
						<div class="mb-3 row">
							<label for="state" class="col-sm-3 control-label col-form-label">Status</label>
							<div class="col-sm-9">
								<select name="status" id="status" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Update Status</option>
									<option value="1" {{ ( $topic->status ==  '1' )? 'selected' : '' }} > Publish</option>
									<option value="0" {{ ( $topic->status ==  '0' )? 'selected' : '' }}> Private </option>
								</select>
							</div>
						</div>
					</div>
				</div>

			</div>



			<div class="border-top">

				<div class="card-body">

					<button type="submit" class="btn btn-primary">Submit</button>

					<input type="hidden" name="topic_id" id="topic_id" value="{{ $topic->id }}" >

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



