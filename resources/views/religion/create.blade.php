@extends('layouts.master')
@section('title','add-Religion')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Religion Form</p>
    <a href="{{route('religion.index')}}" method="POST">Back</a>
    <Form action="{{route('religion.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Religion:</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection