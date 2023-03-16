@extends('layouts.master')
@section('title','vehicleType')
@section('content')
<p class="h3">VehicleType</p>
<a href="{{route('vehicleType.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>vehicle Type Id</th>
        <th>vehicle Type</th>
        <th>Action</th>
    </tr>
    @foreach($vehicleTypes as $vehicleType)
    <tr>
        <td>{{$vehicleType->vehicle_type_id}}</th>
        <td>{{$vehicleType->vehicle_type}}</th>
        <td>
            <a href="{{route('vehicleType.show',$vehicleType->vehicle_type_id)}}"
                class="btn btn-sm btn-success">View</a>
            <a href="{{route('vehicleType.edit',$vehicleType->vehicle_type_id)}}"
                class="btn btn-sm btn-secondary">Edit</a>
            <form class="d-inline" action="{{route('vehicleType.destroy',$vehicleType->vehicle_type_id)}}"
                method="POST">
                @method("DELETE")
                @csrf
                <button onclick="return deletedata()" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection