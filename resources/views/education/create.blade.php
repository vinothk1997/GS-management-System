@extends('layouts.master')
@section('title','add-education')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Education Form</p>
    <a href="{{route('education.index')}}" method="POST">Back</a>
    <Form action="{{route('education.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Education:</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection