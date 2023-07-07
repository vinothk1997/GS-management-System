@extends('layouts.master')
@section('title','add-occupation')
@section('content')
<p class="h3">Occupation</p>
<a href="{{route('occupation.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Occupation Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach($occupations as $occupation)
    <tr>
        <td>{{$occupation->occupation_id}}</th>
        <td>{{$occupation->name}}</th>
        <td>
            <a href="{{route('occupation.edit',$occupation->occupation_id)}}" class="btn btn-sm btn-secondary">Edit</a>
            <form class="d-inline" action="{{route('occupation.destroy',$occupation->occupation_id)}}" method="POST">
                @method("DELETE")
                @csrf
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection