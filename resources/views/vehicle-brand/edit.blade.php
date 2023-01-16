@extends('layouts.master')
@section('title','edit-vehicleBrand')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Vehicle Brand Form</p>
    <Form action="{{route('vehicleType.update',$vehicleType->vehicle_type_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Vehicle Brand:</label>
            <input type="text" name="vehicle_type" id="" value="{{$vehicleType->vehicle_type}}" class="form-control">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection