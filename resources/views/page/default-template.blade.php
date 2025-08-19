@extends('layouts.main')
@section('content')
<section class="section about_inner">
    <div class="container">
        <div class="row">
            <h1 style="font-size:35px!important;">{{ $contentMain->title }}</h1>
            {!! $contentMain->description !!}
        </div>
    </div>
</section>

@endsection