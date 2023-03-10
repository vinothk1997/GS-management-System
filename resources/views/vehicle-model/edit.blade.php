@extends('layouts.master')
@section('title','edit-vehicleType')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Vehicle Type Form</p>
    <Form action="{{route('vehicleModel.update',$vehicleModel->model_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Vehicle Model:</label>
            <input type="text" name="name" value=" {{$vehicleModel->name}}" class="form-control">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection