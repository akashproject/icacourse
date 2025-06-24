@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	@if($leads)
		<div class="card">
			<div class="card-header d-flex flex-wrap justify-content-between gap-3">
				<div class="card-title mb-0 me-1">
					<h5 class="mb-1"> {{ count($leads) }} Records found</h5>
				</div>
				<div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
					<div class="position-relative">
						<div class="dt-search mt-0 mt-md-6">
							<label for="dt-search-0">Search:</label>
							<input type="search" class="form-control ms-4" id="dt-search-0" placeholder="" aria-controls="DataTables_Table_0">
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive mb-5">
					<table id="" class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>City</th>
								<th>Institute</th>
								<th>Pincode</th>
								<th>Campaign</th>
								<th>Source</th>
								<th>Url</th>
								<th>OTP Status</th>
								<th>Crm Status</th>
								<th>Whatsapp Status</th>
								<th>Store Area</th>
								<th>Created At</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($leads as $value)
							<tr>
								<td>{{ $value->first_name }} {{ $value->last_name }}</td>													
								<td>{{ $value->lead_email }}</td>													
								<td>{{ $value->mobile }}</td>
								<td>{{ $value->city }}</td>
								<td>{{ $value->institute }}</td>
								<td>{{ $value->pincode }}</td>
								<td>{{ $value->utm_campaign }}</td>
								<td>{{ $value->utm_source }}</td>
								<td>{{ $value->source_url }}</td>
								<td>{{ $value->otp_status }}</td>
								<td>{{ $value->crm_status }}</td>
								<td>{{ $value->whatsapp_status }}</td>
								<td>{{ $value->store_area }}</td>
								<td>{{ $value->created_at }}</td>
							</tr>
							@endforeach							
						</tbody>
					</table>
				</div>
				<div class="pagination">
					{{ $leads->links() }}
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