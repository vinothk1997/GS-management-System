@extends('layouts.master')
@section('title','trees')
@section('content')
<p class="h3">Tree Table</p>

@if($land->member_id)
<form class="d-inline" action="{{ route('familyMember.show') }}">
    <input type="hidden" name="memberId" value="{{ $land->member_id  }}">
    <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
</form>
@elseif($land->family_id)
<form class="d-inline" action="{{ route('familyHead.showOtherDeatails') }}">
    <input type="hidden" name="familyId" value="{{ $land->family_id  }}">
    <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
</form>
@endif
<a href="{{route('tree.create',$land_id)}}" class="btn btn-primary btn-sm">Add New</a>
<table class="table my-3">
    <tr>
        <td><b>Land Type</b></td>
        <td>{{ $land->land_type }}</td>
        <td><b>Land GN</b></td>
        <td>{{ $land->GN->name }}</td>

    </tr>
    <tr>
        <td><b>Area</b></td>
        <td>{{ $land->area }}</td>
        <td><b>Address</b></td>
        <td>{{ $land->address }}</td>

    </tr>
</table>
<hr>
<h3>Tree List</h3>
<table class="table">
    <tr>
        <th>Tree Name</th>
        <th>Tree Type</th>
        <th>Number of Tree</th>
        <th>Action</th>
    </tr>
    @foreach($trees as $tree)
    <tr>
        <td>{{$tree->tree_name}}</th>
        <td>{{$tree->tree_type}}</th>
        <td>{{$tree->no_of_tree}}</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <form class=d-inline action="{{route('tree.edit')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="land_id" value="{{$tree->land_id}}">
                <input type="hidden" name="tree_name" value="{{$tree->tree_name}}">
                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
            </form>
            <form class=d-inline action="{{route('tree.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="land_id" value="{{$tree->land_id}}">
                <input type="hidden" name="tree_name" value="{{$tree->tree_name}}">
                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection