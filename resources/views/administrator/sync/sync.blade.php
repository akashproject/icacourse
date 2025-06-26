@extends('administrator.layouts.admin')
@section('content')

<div class="col-12">
    <div class="card">
        <ul>
        @foreach($status as $value)
            <li> {{ $value }} </li>
        @endforeach
        </ul>
    </div>
</div>
@endsection
@section('script')
@endsection