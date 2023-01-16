@extends('layouts.master')
@section('title','add-district')
@section('content')
<p class="h3">Organization</p>
<a href="{{route('organization.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Organization Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Mobile</th>
        <th>Landline No</th>
        <th>Action</th>
    </tr>
    @foreach($organizations as $organization)
    <tr>
        <td>{{$organization->organization_id}}</th>
        <td>{{$organization->name}}</td>
        <td>{{$organization->description}}</td>
        <td>{{$organization->mobile}}</td>
        <td>{{$organization->landline_no}}</td>
        <td>
            <a href="{{route('organization.show',$organization->organization_id)}}"
                class="btn btn-sm btn-success">View</a>
            <a href="{{route('organization.edit',$organization->organization_id)}}"
                class="btn btn-sm btn-secondary">Edit</a>
            <form class="d-inline" action="{{route('organization.destroy',$organization->organization_id)}}"
                method="POST">
                @method("DELETE")
                @csrf
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection