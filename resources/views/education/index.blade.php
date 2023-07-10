@extends('layouts.master')
@section('title','add-education')
@section('content')
<p class="h3">Education</p>
<a href="{{route('education.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Education Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach($educations as $education)
    <tr>
        <td>{{$education->education_id}}</td>
        <td>{{$education->name}}</th>
        <td>
            <a href="{{route('education.edit',$education->education_id)}}" class="btn btn-sm btn-secondary">Edit</a>
            <form class=d-inline action="{{route('education.destroy',$education->education_id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return deletedata();" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection