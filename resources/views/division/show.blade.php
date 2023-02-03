@extends('layouts.master')
@section('title','add-assistType')
@section('content')
<p class="h3">GN-Division Table</p>
<a href="{{route('gn.create',$divisionId)}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>GN Id</th>
        <th>GN</th>
        <th>Code</th>
        <th>Action</th>
    </tr>
    @foreach($gns as $gn)
    <tr>
        <td>{{$gn->gn_id}}</th>
        <td>{{$gn->name}}</th>
        <td>{{$gn->code}}</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <a href="{{route('gn.edit',$gn->gn_id)}}" class="btn btn-sm btn-secondary">Edit</a>
            <form class=d-inline action="{{route('gn.destroy',$gn->gn_id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection