@extends('layouts.master')
@section('title','VehicleBrand')
@section('content')
<p class="h3">Vehicle Brands</p>
<a href="{{route('vehicleBrand.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Vehicle Brand Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach($vehicleBrands as $vehicleBrand)
    <tr>
        <td>{{$vehicleBrand->brand_id}}</th>
        <td>{{$vehicleBrand->name}}</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <a href="" class="btn btn-sm btn-secondary">Edit</a>
            <a href="" class="btn btn-sm btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection