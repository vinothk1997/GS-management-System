@extends('layouts.master')
@section('title','add tree')
@section('content')
<div class="container">
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
            <input type="text" name="tree_name" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Number of Tree:</label>
            <input type="text" name="no_of_tree" class="form-control" id="">
        </div>
        <div>
            <input type="text" name="land_id" placeholder="land id want to be loaded" value="">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

    </Form>
</div>

@endsection