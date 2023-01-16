@extends('layouts.master')
@section('title','add-vehicleBrand')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Religion Form</p>
    <a href="{{route('vehicleType.index')}}" method="POST">Back</a>
    <Form action="{{route('vehicleType.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Vehicle Type:</label>
            <input type="text" name="vehicle_type" id="" class="form-control">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection