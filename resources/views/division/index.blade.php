@extends('layouts.master')
@section('title','add-district')
@section('content')
<p class="h3">Districts</p>
<a href="{{route('division.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Division Id</th>
        <th>Name</th>
        <th>District</th>
        <th>Action</th>
    </tr>
    @foreach($divisions as $division)
    <tr>
        <td>{{$division->division_id}}</td>
        <td>{{$division->name}}</th>
        <td>{{$division->district}}</th>
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