@extends('layouts.master')
@section('title','add-vote')
@section('content')
<div>
    <div class="bg-white">
        <img  src="{{asset('dist/img/banner.png')}}"/>
    </div>
    <div class="bg-white row mt-3">
        <div class="col-6 border">
            <h3>Vision</h3>
            <p>To be excellent government institution that helps the life style of community in a way benificial to the society</p>
        </div>
        <div class="col-6 border">
            <h3>Mission</h3>
            <p>To provide effective service in line with government policies,uplift the life styles of the society through a 
                planed,efficent,development process consisting of proper co ordinationtion resources and using modern techniques 
                with participation of people </p>
        </div>
    </div>
    <div id="mt-3">
        <img  width="100%" src="{{asset('dist/img/download.jfif')}}"/>
    </div>
</div>

@endsection