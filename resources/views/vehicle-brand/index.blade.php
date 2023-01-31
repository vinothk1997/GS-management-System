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
        <td>{{$vehicleBrand->brand}}</th>
        <td>
            <a href="{{route('vehicleBrand.show',$vehicleBrand->brand_id)}}" class="btn btn-sm btn-success">View</a>
            <a href="{{route('vehicleBrand.edit',$vehicleBrand->brand_id)}}" class="btn btn-sm btn-secondary">Edit</a>
            <form class="d-inline" action="{{route('vehicleBrand.destroy',$vehicleBrand->brand_id)}}" method="POST">
                @method("DELETE")
                @csrf
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection