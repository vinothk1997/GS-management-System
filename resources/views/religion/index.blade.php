@extends('layouts.master')
@section('title','Religion')
@section('content')
<p class="h3">Religion</p>
<a href="{{route('religion.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Religion Id</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach($religions as $religion)
    <tr>
        <td>{{$religion->religion_id}}</th>
        <td>{{$religion->name}}</th>
        <td>
            <a href="{{route('religion.edit',$religion->religion_id)}}" class="btn btn-sm btn-secondary">Edit</a>
            <form class="d-inline" action="{{route('religion.destroy',$religion->religion_id)}}" method="POST">
                @method("DELETE")
                @csrf
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection