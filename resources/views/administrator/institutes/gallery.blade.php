@extends('administrator.layouts.admin')
@section('content')
<!-- <div class="card add-media" >
    <div class="card-body" >
        <h4 class="card-title"> Upload Image </h4>
        <form method="post" action="{{url('administrator/upload')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
            @csrf
        </form>
    </div>
</div> -->

<div class="col-12">
	<div class="card">
        <div class="card-body">
            <div class="row filter-container" >
                <div class="col-md-6" >
					<div class="form-group row">
						<div class="col-sm-6">
                            <a href="#imageBox" class="btn btn-primary text-white open-popup-link">Add More Images</a>
						</div>
					</div>
				</div>
                <div class="col-md-2" >
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Search </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="search" id="searchMedia" placeholder="Search" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row image-thumbnail-container">
				@foreach ($gallery as $value)        
					<div class="image-thumbnail" data-id="{{$value->image_id}}">
                        <img src="{{ getSizedImage('thumb',$value->image_id) }}" style="width:100%">  
					</div>
				@endforeach
			</div>
        </div>
    </div>
</div>

@endsection
@section('script')
<!-- ============================================================== -->
<!-- CHARTS -->
@endsection