@extends('layouts.master')
@section('title','lands')
@section('content')
<p class="h3">Lands Table</p>
<a href="{{route('land.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Land Id</th>
        <th>Land Type</th>
        <th>Land GN Id</th>
        <th>Address</th>
        <th>Area</th>
        <th>Registration No</th>
        <th>Action</th>
    </tr>
    @foreach($lands as $land)
    <tr>
        <td>{{$land->land_id}}</th>
        <td>{{$land->land_type}}</th>
        <td>{{$land->land_gn_id}}</th>
        <td>{{$land->address}}</th>
        <td>{{$land->area}}</th>
        <td>{{$land->reg_no}}</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <form class=d-inline action="{{route('land.edit')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="land_id" value="{{$land->land_id}}">
                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
            </form>
            <form class=d-inline action="{{route('land.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="land_id" value="{{$land->land_id}}">
                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection