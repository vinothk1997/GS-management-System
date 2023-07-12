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
            <input type="text" name="name" onkeypress="return isTextKey(event)" id="" class="form-control @error('name') is-invalid @enderror">
        </div>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection