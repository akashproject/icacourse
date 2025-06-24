@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
<div class="card">
		<form class="form-horizontal" method="post" action="{{ url('administrator/upload-placement') }}" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
				<h4 class="card-title"> Add Testimonial </h4>
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
					<div class="col-md-3"></div>
					<div class="col-md-6" >
						<div class="form-group row">
							<label for="placement" class="col-sm-3 text-right control-label col-form-label">Upload CSV</label>
							<div class="col-sm-9">
								<input type="file" class="form-control" name="placement" id="placement" >
							</div>
						</div>	
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>

			<div class="border-top">
				<div class="card-body">
					<button type="submit" class="btn btn-primary">Submit</button>
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

