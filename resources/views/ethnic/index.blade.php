@extends('layouts.master')
@section('title','ethnics')
@section('content')
<p class="h3">Ethnic</p>
<a href="{{route('ethnic.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Ethnic Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach($ethnics as $ethnic)
    <tr>
        <td>{{$ethnic->ethnic_id}}</td>
        <td>{{$ethnic->name}}</th>
        <td>
            {{-- <a href="{{route('ethnic.show',$ethnic->ethnic_id)}}" class="btn btn-sm btn-success">View</a> --}}
            <a href="{{route('ethnic.edit',$ethnic->ethnic_id)}}" class="btn btn-sm btn-secondary">Edit</a>
            <form class=d-inline action="{{route('ethnic.destroy',$ethnic->ethnic_id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return deletedata();" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection