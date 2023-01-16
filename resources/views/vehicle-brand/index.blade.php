@extends('layouts.master')
@section('title','add-district')
@section('content')
<p class="h3">Districts</p>
<a href="" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>District Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <tr>
        <td>district</th>
        <td>Name</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <a href="" class="btn btn-sm btn-secondary">Edit</a>
            <a href="" class="btn btn-sm btn-danger">Delete</a>
        </td>
    </tr>
</table>
@endsection