@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	@if($topics)
		<div class="card">
			<div class="card-header d-flex flex-wrap justify-content-between gap-3">
				<div class="card-title mb-0 me-1">
					<h5 class="mb-1"> {{ count($topics) }} Records found</h5>
				</div>
				<div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap mb-3" >
					<div class="dt-buttons btn-group flex-wrap mb-0">
						<a class="btn create-new btn-primary" href="{{ route('admin-add-topic') }} ">
							<span>
								<span class="d-flex align-items-center gap-2">
									<i class="icon-base bx bx-plus icon-sm"></i> 
									<span class="d-none d-sm-inline-block">Add New Record</span>
								</span>
							</span>
						</a> 
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap mb-3" >
					<div class="position-relative">
						<div class="input-group input-group-merge">
							<span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
							<input type="text" class="form-control" placeholder="Search..." aria-label="Search...">
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table id="" class="table table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Duration</th>
								<th>Status</th>
								<th>Created At</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($topics as $value)
							<tr>
								<td>{{ $value->name }}</td>													
								<td>{{ $value->duration }}</td>									
								<td>{{ ($value->status == "1")?'Active':'Deactive' }}</td>									
								<td>{{ $value->created_at->format("d M, Y") }}</td>									
								<td>
									<div class="d-inline-block text-nowrap">
										@can('update')
										<a href="{{ route('admin-show-topic',$value->id) }}" class="btn btn-sm btn-icon">
											<i class="bx bx-edit"></i>
										</a>
										@endcan
										@can('delete')
										<a href="{{ route('admin-delete-topic',$value->id) }}" onclick="return confirm('Are you sure?')"; class="btn btn-sm btn-icon delete-record">
											<i class="bx bx-trash"></i>
										</a>
										@endcan
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	@endif
</div>
@endsection
@section('script')
<!-- ============================================================== -->
<!-- CHARTS -->
@endsection



