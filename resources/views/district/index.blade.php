@extends('layouts.master')
@section('title','add-district')
@section('content')
<p class="h3">Districts</p>
<a href="{{route('district.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>District Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach($districts as $district)
    <tr>
        <td>{{$district->district_id}}</td>
        <td>{{$district->name}}</th>
        <td>
            <a href="{{route('district.show',$district->district_id)}}" class="btn btn-sm btn-success">View</a>
            <a href="{{route('district.edit',$district->district_id)}}" class="btn btn-sm btn-secondary">Edit</a>
            <form class=d-inline action="{{route('district.destroy',$district->district_id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return deletedata();" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection