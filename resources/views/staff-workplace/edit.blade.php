@extends('layouts.master')
@section('title','edit-woking history')
@section('content')
<div class="container mt-3">
    <p class="h3">Edit Working Histrory</p>
    <a href="{{route('staff.show',$staffWorkplace->staff_id)}}">Back</a>
    <Form action="{{route('staffWorkplace.update',[$staffWorkplace->staff_id,$staffWorkplace->start_date])}}"
        method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Start Date:</label>
            <input type="date" name="startDate" value="{{$staffWorkplace->start_date}}" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>National Identity Card No:</label>
            <input type="date" name="endDate" value="{{$staffWorkplace->end_date}}" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Designation:</label>
            <input type="text" name="designation" onkeypress="return isTextKey(event)"
                value="{{$staffWorkplace->designation}}" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Place ID:</label>
            <input type="text" name="placeId" value="{{$staffWorkplace->place_id}}" id="" class="form-control">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>
@endsection