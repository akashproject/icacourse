@extends('administrator.layouts.admin')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	@if($order)
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
		<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
			<div class="d-flex flex-column justify-content-center">
				<div class="mb-1">
					<span class="h5">Order #{{ $order->order_id}} </span>
					<span class="badge {{ ($order->status=='success')?'bg-label-success':'bg-label-info'}} me-1 ms-2">{{ $order->status}}</span>
					<span class="badge {{ ($order->erp_status=='1')?'bg-label-success':'bg-label-danger'}}">{{ ($order->erp_status=='1')?'ERP PUSHED SUCCESS':'ERP PUSHED FAILED'}}</span>
				</div>
				<p class="mb-0">{{ date('M d',strtotime($order->created_at)) }}, <span id="orderYear">{{ date('Y',strtotime($order->created_at)) }}</span>, {{ date('h:i',strtotime($order->created_at)) }} </p>
			</div>
			@if($order->erp_status == "0")
			<form class="form-horizontal" method="post" action="{{ route('admin-push-to-erp') }}" enctype="multipart/form-data">
				@csrf
				<div class="d-flex align-content-center flex-wrap gap-2">
					<input type="hidden" value="{{ $order->order_id }}" name="order_id" >
					<button type="submit" class="btn btn-label-danger delete-order ">Push to ERP</button>
				</div>
			</form>
			@else
			<div class="d-flex align-content-center flex-wrap gap-2">
				<button class="btn btn-label-success">ERP Pushed Success</button>
			</div>
			@endif
		</div>
		<div class="row">
			<div class="col-12 col-lg-8"> 
				<div class="card mb-6" >
					<div class="card-datatable table-responsive">
						<div class="dt-container dt-bootstrap5 dt-empty-footer">
							<div class="row card-header border-bottom mx-0 px-3">
								<div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto px-3">
									<h5 class="card-title mb-0">Order details</h5>
								</div>
							</div>
							<div class="justify-content-between dt-layout-table">
								<table class="datatables-order-details table dataTable dtr-column mb-0">
									<thead>
										<tr>
											<th>Courses</th>
											<th>Amount</th>
											<th>Discount</th>
										</tr>
									</thead>
									<tbody>
										@foreach($orderItems as $value)
										<tr>
											<td>{{ getCourseById($value->course_id)->name }}</td>		
											<td>₹{{ $value->amount }}</td>		
											<td>₹{{ $value->discount }}</td>	
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="d-flex justify-content-end align-items-center m-6 mb-2">
							<div class="order-calculations">
								<div class="d-flex justify-content-start mb-2">
									<span class="w-px-100 text-heading">Subtotal:</span>
									<h6 class="mb-0">₹2093</h6>
								</div>
								<div class="d-flex justify-content-start mb-2">
									<span class="w-px-100 text-heading">Discount:</span>
									<h6 class="mb-0">₹{{ $order->discount }}</h6>
								</div>
								<div class="d-flex justify-content-start">
									<h6 class="w-px-100 mb-0">Total:</h6>
									<h6 class="mb-0">₹{{ $order->amount }}</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="card mb-6">
					<div class="card-header">
					<h5 class="card-title m-0">Customer details</h5>
					</div>
					<div class="card-body">
					<div class="d-flex justify-content-start align-items-center mb-6">
						<div class="avatar avatar-sm me-3">
							<span class="avatar-initial rounded-circle bg-label-dark">ST</span>
						</div>
						<div class="d-flex flex-column">
						<a href="app-user-view-account.html" class="text-body text-nowrap">
							<h6 class="mb-0">{{ $studentData->first_name }} {{ $studentData->last_name }}</h6>
						</a>
						<span>Customer ID: #{{ $studentData->id }}</span>
						</div>
					</div>
					<div class="d-flex justify-content-between">
						<h6 class="mb-1">Contact info</h6>
					</div>
					<p class=" mb-1">Email: {{ $studentData->email }}</p>
					<p class=" mb-0">Mobile: {{ $studentData->mobile }}</p>
					</div>
				</div>
				<div class="card mb-6">
					<div class="card-header d-flex justify-content-between pb-2">
						<h5 class="card-title m-0">Billing address</h5>
					</div>
					<div class="card-body">
						<p class="mb-6">{{ $studentData->address }} {{ $studentData->city }} ,{{ $studentData->state }}, India</p>
						<h5 class="mb-1">Payment Mode</h5>
						<p class="mb-6">{{ $order->payment_mode }}</p>
					</div>
				</div>
			</div>
		</div>
	@endif
</div>
@endsection
@section('script')
<!-- ============================================================== -->
@endsection



