@extends('layouts.master')
@section('title','edit-vehicleType')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Vehicle Type Form</p>
    <a href="/vehicleBrands/{{$vehicleModel->VehicleBrand->brand_id}}" class="btn btn-success btn-sm" method="POST">Back</a>
    <Form action="{{route('vehicleModel.update',$vehicleModel->model_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Vehicle Model:</label>
            <input type="text" name="name" onkeypress="return isTextKey(event)" value=" {{$vehicleModel->name}}"
            class="form-control @error('brand') is-invalid @enderror">
        </div>
        @error('brand')
        <div class="text-danger">{{ $message }}</div>
         @enderror
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection