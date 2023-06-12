@extends('layouts.master')
@section('title','add-district')
@section('content')
<p class="h3">Division</p>
<a href="{{route('district.index')}}" class="btn-sm btn btn-primary">&#60;Back</a>
<a href="{{route('division.create',$districtId)}}" class="btn-sm btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Division Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach($divisions as $division)
    <tr>
        <td>{{$division->division_id}}</td>
        <td>{{$division->name}}</th>
        <td>
            <a href="{{route('division.show',$division->division_id)}}" class="btn btn-sm btn-success">View</a>
            <a href="{{route('division.edit',$division->division_id)}}" class="btn btn-sm btn-secondary">Edit</a>
            <form class=d-inline action="{{route('division.destroy',$division->division_id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection