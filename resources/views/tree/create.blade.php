@extends('layouts.master')
@section('title','add tree')
@section('content')
<div class="container">
    <a href="/lands/show?land_id={{$land_id}}" class="btn btn-sm btn-primary">Back</a>
    <Form action="{{route('tree.store')}}" method="POST">
        @csrf
        <p class="h3">Add Tree Form</p>
        <div class="form-group">
            <label>Type of Tree:</label>
            <select class="form-control" name="tree_type">
                <option>A</option>
                <option>B</option>
                <option>C</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tree Name:</label>
            <input type="text" name="tree_name" onkeypress="return isTextKey(event)" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Number of Tree:</label>
            <input type="text" name="no_of_tree" onkeypress="return isNumberKey(event)" class="form-control" id="">
        </div>
        <div>
            <input type="hidden" name="land_id" placeholder="land id want to be loaded" value="{{$land_id}}">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>

    </Form>
</div>

@endsection