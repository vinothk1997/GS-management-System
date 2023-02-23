@extends('layouts.master')
@section('title','add tree')
@section('content')
<div class="container">
    <Form action="{{route('tree.update')}}" method="POST">
        @csrf
        @method('PUT')
        <p class="h3">Edit Tree Form</p>
        <div class="form-group">
            <label>Type of Tree:</label>
            <select class="form-control" name="tree_type">
                <option @if($tree->tree_type='A')selected @endif>A</option>
                <option @if($tree->tree_type='B')selected @endif>B</option>
                <option @if($tree->tree_type='C')selected @endif>C</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tree Name:</label>
            <input type="text" name="tree_name" class="form-control" id="" value="{{$tree->tree_name}}">
        </div>
        <div class="form-group">
            <label>Number of Tree:</label>
            <input type="text" name="no_of_tree" class="form-control" id="" value="{{$tree->no_of_tree}}">
        </div>
        <div>
            <input type="hidden" name="land_id" placeholder="land id want to be loaded" value="{{$tree->land_id}}">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>

    </Form>
</div>

@endsection