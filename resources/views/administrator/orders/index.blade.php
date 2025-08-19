@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	@if($orders)
		<div class="card mb-6">
			<div class="card-widget-separator-wrapper">
				<div class="card-body card-widget-separator">
					<div class="row gy-4 gy-sm-1">
						<div class="col-sm-6 col-lg-3">
							<div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0">
								<div>
									<h4 class="mb-0">{{ $success }}</h4>
									<p class="mb-0">Payment Success</p>
								</div>
								<a href="{{ route('admin-orders-filter','success') }}" class="avatar w-px-40 h-px-40 p-2 me-lg-6">
									<span class="avatar-initial bg-label-secondary rounded">
									<i class="icon-base bx bx-wallet icon-lg text-heading"></i>
									</span>
								</a>
							</div>
							<hr class="d-none d-sm-block d-lg-none">
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="d-flex justify-content-between align-items-start border-end pb-4 pb-sm-0 card-widget-3">
								<div>
									<h4 class="mb-0">{{ $admissions }}</h4>
									<p class="mb-0">Total Admission</p>
								</div>
								<a href="{{ route('admin-orders-filter','admissions') }}" class="avatar w-px-40 h-px-40 p-2 me-sm-6">
									<span class="avatar-initial bg-label-secondary rounded">
										<i class="icon-base bx bx-wallet icon-lg text-heading"></i>
									</span>
								</a>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-4 pb-sm-0">
							<div>
								<h4 class="mb-0">{{ $pending }}</h4>
								<p class="mb-0">Pending Payment</p>
							</div>
							<a href="{{ route('admin-orders-filter','pending') }}" class="avatar w-px-40 h-px-40 me-sm-6">
								<span class="avatar-initial bg-label-secondary rounded">
								<i class="icon-base bx bx-wallet icon-lg text-heading"></i>
								</span>
							</a>
							</div>
							<hr class="d-none d-sm-block d-lg-none me-6">
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="d-flex justify-content-between align-items-start">
							<div>
								<h4 class="mb-0">{{ $erpStatusFailed }}</h4>
								<p class="mb-0">ERP Pushed Failed</p>
							</div>
							<a href="{{ route('admin-orders-filter','erp-failed') }}" class="avatar w-px-40 h-px-40 p-2">
								<span class="avatar-initial bg-label-secondary rounded">
								<i class="icon-base bx bx-error-alt icon-lg text-heading"></i>
								</span>
							</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header d-flex flex-wrap justify-content-between gap-3">
				<div class="card-title mb-0 me-1">
					<h5 class="mb-1"> {{ count($orders) }} Records found</h5>
				</div>
			</div>
			<div class="card-body">
				<div class="row ms-3 my-0 justify-content-between">
					<div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto px-3 mt-0">
						<div class="dt-buttons btn-group flex-wrap gap-2 px-3 mt-0 mb-md-0 mb-6">
							<div class="btn-group mx-auto">
								<a class="btn buttons-collection btn-label-primary" href="{{ route('admin-export-csv') }}" >
								<span>
									<span class="d-flex align-items-center gap-2">
										<i class="icon-base bx bx-export icon-sm"></i>
										<span class="d-none d-sm-inline-block">Export CSV</span>
									</span>
								</span>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="table-responsive">
					<table id="zero_config" class="table">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Name</th>
								<th>Total Amount</th>
								<th>Payment Status</th>								
								<th>Coupon</th>
								<th>Student Code</th>
								<th>Money Receipt</th>
								<th>Payment Id</th>
								<th>ERP Status</th>
								<th>Created At</th>
							</tr>
						</thead>

						<tbody>
							@foreach($orders as $value)
							<tr>
								<td><a href="{{ route('admin-order-detail',$value->id) }}"><span>#{{ $value->order_id }}</span></a></td>									
								<td>
									<div class="d-flex justify-content-start align-items-center order-name text-nowrap">
										<div class="avatar-wrapper">
											<div class="avatar avatar-sm me-3">
												<span class="avatar-initial rounded-circle bg-label-dark">FS</span>
											</div>
										</div>
										<div class="d-flex flex-column">
											<h6 class="m-0">
												<a href="pages-profile-user.html" class="text-heading">
													{{ getStudentById($value->profile_id)->first_name}} {{ getStudentById($value->profile_id)->last_name}}</a>
											</h6>
											<small>{{ getStudentById($value->profile_id)->mobile}}</small>
										</div>
									</div>
								</td>		
								<td>{{ number_format($value->amount) }}</td>		
								<td>{{ $value->status }}</td>								
								<td>{{ $value->coupon }}</td>									
								<td>{{ $value->student_code }}</td>									
								<td>{{ $value->money_receipt }}</td>									
								<td>{{ $value->payment_id }}</td>									
								<td>{{ $value->erp_status }}</td>									
								<td>{{ $value->created_at->format("d M, Y") }}</td>									
								
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



