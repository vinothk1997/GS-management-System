@extends('layouts.master')
@section('title','trees')
@section('content')
<p class="h3">Tree Table</p>
<a href="{{route('tree.create')}}" class="btn btn-primary">Add New</a>
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