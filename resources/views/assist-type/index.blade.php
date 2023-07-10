@extends('layouts.master')
@section('title','add-assistType')
@section('content')
<p class="h3">Assist Type</p>
<a href="{{route('assistType.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Assist Type Id</th>
        <th>Type</th>
        <th>Action</th>
    </tr>
    @foreach($assistTypes as $assistType)
    <tr>
        <td>{{$assistType->assist_type_id}}</th>
        <td>{{$assistType->name}}</th>
        <td>
            <a href="{{route('assistType.edit',$assistType->assist_type_id)}}" class="btn btn-sm btn-secondary">Edit</a>
            <form class=d-inline action="{{route('assistType.destroy',$assistType->assist_type_id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return deletedata();" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection