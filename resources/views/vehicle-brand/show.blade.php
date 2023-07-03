@extends('layouts.master')
@section('title','VehicleBrand')
@section('content')
<p class="h3">Vehicle Model</p>
<a href="{{route('vehicleModel.create',$brandId)}}" class="btn btn-primary btn-sm">Add New</a>
<a href="{{route('vehicleBrand.index')}}" class="btn btn-success btn-sm ">Back</a>
<table class="table">
    <tr>
        <th>Model ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Action</th>
    </tr>
    @foreach($vehicleModels as $vehicleModel)
    <tr>
        <td>{{$vehicleModel->model_id}}</td>
        <td>{{$vehicleModel->name}}</td>
        <td>{{$vehicleModel->VehicleType->vehicle_type}}</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <a href="{{route('vehicleModel.edit',$vehicleModel->model_id)}}" class="btn btn-sm btn-secondary">Edit</a>
            <form class="d-inline" action="{{route('vehicleModel.destroy',$vehicleModel->model_id)}}" method="POST">
                @method("DELETE")
                @csrf
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection