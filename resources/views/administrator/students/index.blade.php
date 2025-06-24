@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	@if($students)
		<div class="card">
			@if(session()->has('message'))
				<div class="alert alert-success">
					{{ session()->get('message') }}
				</div>
			@endif
			<div class="card-header d-flex flex-wrap justify-content-between gap-3">
				<div class="card-title mb-0 me-1">
					<h5 class="card-header"> {{ count($students) }} Records found</h5>
				</div>
				<div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
					<div class="position-relative">
						<a href="{{ route('admin-upload-students') }}" class="btn btn-secondary add-new btn-primary" tabindex="0">
							<span>
								<i class="bx bx-plus me-0 me-sm-1"></i>
								<span class="d-none d-sm-inline-block">Import Student</span>
							</span>
						</a>
						<a href="{{ route('admin-add-student') }}" class="btn btn-secondary add-new btn-primary" tabindex="0">
							<span>
								<i class="bx bx-plus me-0 me-sm-1"></i>
								<span class="d-none d-sm-inline-block">Add Student</span>
							</span>
						</a>
					</div>
				</div>
			</div>
			
			<div class="table-responsive text-nowrap">
				<table class="table table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody class="table-border-bottom-0">
					@foreach ($students as $value)
					<tr>
						<td>{{ $value->name }}</td>													
						<td>{{ $value->email }}</td>													
						<td>{{ $value->mobile }}</td>
						<td>
						<div class="dropdown">
							<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
							<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="{{ route('admin-certificate',$value->id) }}"
									><i class="bx bx-edit-alt me-1"></i> Certificate</a
								>
								<a class="dropdown-item" href="{{ route('admin-student',$value->id) }}"
									><i class="bx bx-edit-alt me-1"></i> Edit</a
								>
								@can('delete')
								<a class="dropdown-item" href="{{ route('admin-delete-student',$value->id) }}"
									><i class="bx bx-trash me-1"></i> Delete</a
								>
								@endcan
							</div>
						</div>
						</td>
					</tr>
					@endforeach		
				</tbody>
				</table>
			</div>
		</div>
	@endif
</div>                   
@endsection
@section('script')
@endsection